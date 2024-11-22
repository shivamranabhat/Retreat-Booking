<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Navbar extends Component
{
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success','Logout successfully');
    }
    public function render()
    {
        $categories = Category::select('name','slug')->oldest()->get();
        return view('livewire.navbar',compact('categories'));
    }
}
