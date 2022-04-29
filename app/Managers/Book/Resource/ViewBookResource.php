<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Managers\Book\Resource;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Description of BookViewResource
 *
 * @author brindachanchad
 */
class ViewBookResource extends JsonResource {
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'book_name' => $this->book_name,
            'author_id' => $this->author_id,
            'author' => $this->author,
             ];
    }
}


