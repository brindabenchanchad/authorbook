<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Managers\Book\Resource;

use App\Components\AbstractResource;
use App\Managers\Book\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use TheSeer\Tokenizer\Exception;

/**
 * Description of BookViewResource
 *
 * @author brindachanchad
 */
class UpdateBookResource extends AbstractResource {
    const SUCCESS_MESSAGE = "Book Updated Successfully.";
    /**
     * 
     * @var type Request
     */
    private $request;
    
    /**
     * 
     * @param UpdateBookRequest $request
     */
    private $resource;
    
    public function __construct(UpdateBookRequest $request, Book $book) {
        $this->request = $request;
        $this->resource = $book;
    }
    
    public function perform() {
        if($this->request->validated()) {
            DB::beginTransaction();
            try{
                $this->resource->update($this->saveAttributes());
                // Update Book in KeyCloak
                DB::commit();
                return $this->sendResponse(new ViewBookResource($this->resource),self::SUCCESS_MESSAGE);
            } catch (Exception $ex) {
                DB::rollBack();
                return $this->sendError($ex->getMessage(),$this->request->all());
            }
        }
    }
    
    protected function saveAttributes() {
        return [
            'book_name'    => $this->request->book_name,
            'author_id'   => $this->request->author_id,
        ];
    }
}
