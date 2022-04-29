<?php

namespace App\Managers\Author\Requests;

use App\Components\FormRequest;
use App\Models\Author;

class UpdateAuthorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //$user = User::find($this->id);
        //print_r($user); die;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'author_name' => 'required|max:255',
            'author_email' => 'required|max:255',
        ];
    }
    
    public function attributes(): array {
        return [
            'author_name' => "Author Name",
            'author_email' => "Author Email"
        ];
    }
}
