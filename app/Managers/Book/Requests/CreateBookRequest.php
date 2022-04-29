<?php

namespace App\Managers\Book\Requests;

class CreateBookRequest extends \App\Components\FormRequest
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
            'book_name' => 'required|max:255',
            'author_id' => 'required',
        ];
    }
    
    public function attributes(): array {
        return [
            'book_name' => "Book Name",
            'author_id' => "Author Id"
        ];
    }
    
    protected function prepareForValidation()
    {
        $this->merge([
            'deleted' => 1,
        ]);
    }
            
}
