<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Inquiry;
use Livewire\WithFileUploads;

class ProfileSection extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $user;
    public $password;
    public $profile_photo_url;
    public $inquiries;

    public function mount()
    {

        $this->user = auth()->user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->profile_photo_url = $this->user->profile_photo_url;
        $this->inquiries = Inquiry::where('email',$this->user->email)->latest()->get();
    }

    public function updateProfile()
    {
        $formFields = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|min:6',
        ]);
    
        $this->user->name = $formFields['name'];
        $this->user->email = $formFields['email'];
    
        // Update password if provided
        if (!empty($formFields['password'])) {
            $this->user->password = bcrypt($formFields['password']);
        }
    
        $this->user->save();
        $this->password = '';
    
        session()->flash('success', 'Profile updated successfully');
    }

    public function updatedProfilePhotoUrl($value)
    {
        $this->setProfileImage();
    }

    public function setProfileImage()
    {
        if ($this->profile_photo_url) {
            $fileName = $this->profile_photo_url->getClientOriginalName();
            $filePath = $this->profile_photo_url->storeAs('profile', $fileName, 'public');
            $this->profile_photo_url = 'profile/' . $fileName;
            $this->user->update(['profile_photo_url' => $this->profile_photo_url]);
        }
        $this->dispatch('image-updated');
    }

    public function deleteProfileImage()
    {
        if (!empty($this->user->profile_photo_url)) {
            $image_path = public_path('storage/' . $this->user->profile_photo_url);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $this->user->update(['profile_photo_url' => '']);
        }
        $this->dispatch('image-deleted');
    }

    public function render()
    {
        return view('livewire.profile-section');
    }
}
