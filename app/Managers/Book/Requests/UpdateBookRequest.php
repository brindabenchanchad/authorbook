<?php

namespace App\Managers\Book\Requests;

use App\Components\FormRequest;
use App\Models\Book;

class UpdateBookRequest extends FormRequest
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
}
