<?php

namespace App\Http\Requests;

use test\Mockery\ArgumentObjectTypeHint;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CategoryRequest extends FormRequest
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
            'title' => 'required|min:5|max:200',
            'explanation' => "required|min:5|max:255",
            'queue' => "required|integer|min:1",
            'parent_id' => "required|integer|min:0",
        ];
    }

}
