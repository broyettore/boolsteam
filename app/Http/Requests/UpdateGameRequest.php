<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "title" => "required|max:60",
            "url" => "required|url",
            "price" => "required|numeric|decimal:2",
            "languages" => "required",
            "developer" => "required",
            "release" => "required",
            "pegi" => "required",
            'editor_id' => 'nullable|exists:editors,id'
            "genres" => "nullable|exists:genres,id",
            "description_id" => "nullable|exists:description,id"
        ];
    }
}
