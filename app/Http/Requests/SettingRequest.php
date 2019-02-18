<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;    // site tamamlanınca kaldırılacak
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'homeTitle' => 'required|min:4|max:255',
            'postInCategoryPaginateCount' => 'required|integer|min:1',
            'postInHomePaginateCount' => 'required|integer|min:1',
            'postInTagPaginateCount' => 'required|integer|min:1',
            'commentInPostCount' => 'required|integer|min:1',
            'commentDefaultStatus' => 'required|integer|min:0|max:1',
            'commentabilityStatus' => 'required|integer|min:0|max:1',
        ];
    }
}
