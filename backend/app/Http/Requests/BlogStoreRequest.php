<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogStoreRequest extends FormRequest
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
            'title'=>'required|unique:blogs,title',
            'subtitle'=>'required',
            'author'=>'required',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,webp',
            'main_img_alt'=>'required',
            'description' => 'required',
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
            'title.required'=>'Title is required',
            'subtitle.required'=>'Subtitle is required',
            'title.unique'=>'Article with this title already exists',
            'author.required'=>'Author is required',
            'main_img_alt.required'=>'Main Image Alt is required',
            'description.required'=>'Description is required',
        ];
    }
}
