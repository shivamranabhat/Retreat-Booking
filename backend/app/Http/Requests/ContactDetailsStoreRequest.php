<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactDetailsStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'phone' =>'required',
            'email' =>'required',
            'location'=>'required',
            'x_link'=>'nullable',
            'youtube_link'=>'nullable',
            'insta_link'=>'required',
            'facebook_link'=>'required',
            'whatsapp_link'=>'required',
            'address'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'phone.required' =>'Mobile number is required',
            'email.required'=>'Email is required',
            'location.required'=>'Location is required',
            'insta_link.required'=>'Instagram link is required',
            'facebook_link.required'=>'Facebook link is required',
            'whatsapp_link.required'=>'Whatsapp link is required',
            'address.required'=>'Map address is required',
        ];
    }
}
