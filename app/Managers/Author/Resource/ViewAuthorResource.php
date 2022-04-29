<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Managers\Author\Resource;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Description of AuthorViewResource
 *
 * @author anupamojha
 */
class ViewAuthorResource extends JsonResource {
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'author_name' => $this->author_name,
            'author_email' => $this->author_email,
            'Published Book' => $this->books,
             ];
    }
}


