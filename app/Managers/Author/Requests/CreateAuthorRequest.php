<?php

namespace App\Managers\Author\Requests;

class CreateAuthorRequest extends \App\Components\FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'author_name' => 'required|max:255',
            'author_email' => 'required|unique:author|max:255',
        ];
    }
    
    public function attributes(): array {
        return [
            'author_name' => "Author Name",
            'author_email' => "Author Email"
        ];
    }
    
    protected function prepareForValidation()
    {
        $this->merge([
            'deleted' => 1,
        ]);
    }
            
}
