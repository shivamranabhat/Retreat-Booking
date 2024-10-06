<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpenGraphStoreRequest extends FormRequest
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
            'description'=>'required',
            'image'=>'required',
            'url'=>'required',
            'type'=>'required',
            'site_name'=>'required',
            'page_id'=>'required|unique:open_graphs,page_id'
        ];
        return $rules;
    }
    public function messages()
    {
        return [
            'tag_name.required'=>'Tag Name is required',
            'title.required'=>'Title is required',
            'description.required'=>'Description is required',
            'image.required'=>'Image url is required',
            'url.required'=>'Page url is required',
            'site_name.required'=>'Site name is required',
            'type.required'=>'Og type is required',
            'page_id.required'=>'Page is required',
            'page_id.unique'=>'Open graph for this page already exists'
        ];
    }
}