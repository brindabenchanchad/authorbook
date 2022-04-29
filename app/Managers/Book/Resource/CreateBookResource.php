<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Managers\Book\Resource;

use App\Components\AbstractResource;
use App\Managers\Book\Requests\CreateBookRequest;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use TheSeer\Tokenizer\Exception;

/**
 * Description of UserViewResource
 *
 * @author brindachanchad
 */
class CreateBookResource extends AbstractResource {
   const SUCCESS_MESSAGE = "Book Created Successfully.";
    /**
     * 
     * @var type Request
     */
    private $request;
    
    
    public function __construct(CreateBookRequest $request) {
        $this->request = $request;
    }
    
    public function perform() {
        if($this->request->validated()) {
            DB::beginTransaction();
            try{
                $book = Book::create($this->saveAttributes());
                // Create User in KeyCloak
                DB::commit();
                return $this->sendResponse(new ViewBookResource($book),self::SUCCESS_MESSAGE);
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
