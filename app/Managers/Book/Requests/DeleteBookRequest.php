<?php

namespace App\Managers\Book\Requests;

class DeleteBookRequest extends \App\Components\FormRequest
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
            'id' => 'exists:book,id,id,'.$this->id
        ];
    }
    
    public function all($keys = null) 
    {
       $data = parent::all($keys);
       $data['id'] = $this->route('id');
       return $data;
    }
}
