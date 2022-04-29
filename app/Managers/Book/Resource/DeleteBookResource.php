<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Managers\Book\Resource;

use App\Managers\Book\Requests\DeleteBookRequest;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use TheSeer\Tokenizer\Exception;

/**
 * Description of BookViewResource
 *
 * @author brindachanchad
 */
class DeleteBookResource extends \App\Components\AbstractResource {
    const SUCCESS_MESSAE = "Record Deleted Successfully.";
    /**
     * 
     * @var type Request
     */
    private $request;
    /**
     * 
     * @var type Book Model
     */
    private $resource;
    
    public function __construct(DeleteBookRequest $request, Book $book) {
        $this->request = $request;
        $this->resource = $book;
    }
    
    public function perform() {
        if($this->request->validated()) {
            DB::beginTransaction();
            try{
                $this->resource->delete();
                DB::commit();
                return $this->sendResponse(new ViewBookResource($this->resource),self::SUCCESS_MESSAE);
               
            } catch (Exception $ex) {
                DB::rollBack();
                throw $ex;
            }
        }
    }
}
