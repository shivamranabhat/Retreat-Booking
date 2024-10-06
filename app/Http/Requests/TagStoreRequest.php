<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagStoreRequest extends FormRequest
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
            'tag_name'=>'required',
            'title'=>'required',
            'meta_description'=>'required',
            'meta_keywords'=>'required',
            'canonical_tag'=>'required',
            'page_id'=>'required|unique:tags,page_id'
        ];
        return $rules;
    }
    public function messages()
    {
        return [
            'tag_name.required'=>'Tag name is required',
            'title.required'=>'Title is required',
            'meta_description'=>'Meta description is required',
            'meta_keywords'=>'Meta Keyword is required',
            'page_id.required'=>'Page is required',
            'page_id.unique'=>'Tags for this page already exists',
        ];
    }
}
