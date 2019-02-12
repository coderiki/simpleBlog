<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PostRequest extends FormRequest
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
            "title" => "required|min:5|max:200",
            "content" => "required|min:100|max:3000|",
            "category_id" => "required|integer|min:1",
            "user_id" => "required|integer|min:1",
            "status" => "required|integer|min:0|max:1",
            "publication_time" => "required|date",
            "image" => "required|image|mimes:jpeg,jpg,png|max:1024", // max 1mb
            "tag" => "max:1000"
        ];
    }
}
