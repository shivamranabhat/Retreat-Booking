<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleryStoreRequest extends FormRequest
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
        $rules = [
            'image.*'=> 'nullable|image|mimes:jpeg,png,jpg',
        ];
        if($this->isMethod('POST'))
        {
            $rules['image.*'] = 'required|image|mimes:jpeg,png,jpg';
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'image.*.required'=>'Image is required | jpeg,png,jpg',
        ];
    }
}
