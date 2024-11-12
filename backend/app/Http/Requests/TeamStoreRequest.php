<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules =  [
            'name'=>'required|unique:teams,name',
            'role'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp',
            'alt'=>'required'
        ];
        return $rules;
    }
     /**
     * Custom message for validation
     *
     * @return array
     */
    public function message()
    {
        return [
            'name.required'=>'Name is required',
            'name.unique'=>'Member with this name already exists',
            'role.required'=>'Role is required',
        ];
    }
}
