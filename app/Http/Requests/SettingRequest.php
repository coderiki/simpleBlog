<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'homeTitle' => 'required|min:5|max:255',
            'postInCategoryPaginateCount' => 'required|integer|min:1',
            'postInHomePaginateCount' => 'required|integer|min:1',
            'PostInTagPaginateCount' => 'required|integer|min:1',
            'commentInPostCount' => 'required|integer|min:1',
            'commentDefaultStatus' => 'required|integer|min:0|max:1',
            'postDefaultImage' => 'image|mimes:jpeg,jpg,png|max:1024', // max 1mb,
        ];
    }
}
