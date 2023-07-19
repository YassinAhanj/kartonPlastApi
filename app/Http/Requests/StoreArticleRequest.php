<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            'title' => ['required' , 'max:60' ,  'string'] ,
            'firstImage' => ['required'  , 'file'],
            'secoundImage' => ['required'  , 'file'],
            'firstDescription' => ['required' , 'max:2000' , 'string'],
            'secoundDescription' => ['required' , 'max:2000' , 'string'],
        ];
    }
}
