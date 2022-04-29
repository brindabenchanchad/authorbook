<?php

namespace App\Managers\Author\Requests;


class DeleteAuthorRequest extends \App\Components\FormRequest
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
            'id' => 'exists:author,id,id,'.$this->id
        ];
    }
    
    public function all($keys = null) 
    {
       $data = parent::all($keys);
       $data['id'] = $this->route('id');
       return $data;
    }
}
