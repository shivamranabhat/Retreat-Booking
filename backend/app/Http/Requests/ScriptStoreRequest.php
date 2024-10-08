<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScriptStoreRequest extends FormRequest
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
            'title'=>'nullable',
            'position'=>'required',
            'code'=>'required',
            'page_id'=>'required'
        ];
        return $rules;
    }
    public function messages()
    {
        return [
            'title.required'=>'Title is required',
            'position.required'=>'Script position is required',
            'code.required'=>'Script is required',
            'page_id.required'=>'Page is required',
        ];
    }
}
