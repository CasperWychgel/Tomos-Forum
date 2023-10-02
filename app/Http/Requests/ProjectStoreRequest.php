<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
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
            'name' => ['required','string','max:50','unique:projects'],
            'description' => ['required','string','max:250'],
            'short_description' => ['required','string','max:250'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}
