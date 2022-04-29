<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Managers\Author\Resource;

use App\Managers\Author\Requests\DeleteAuthorRequest;
use App\Models\Author;
use Illuminate\Support\Facades\DB;
use TheSeer\Tokenizer\Exception;

/**
 * Description of AuthorViewResource
 *
 * @author anupamojha
 */
class DeleteAuthorResource extends \App\Components\AbstractResource {
    const SUCCESS_MESSAE = "Record Deleted Successfully.";
    /**
     * 
     * @var type Request
     */
    private $request;
    /**
     * 
     * @var type Author Model
     */
    private $resource;
    
    public function __construct(DeleteAuthorRequest $request, Author $author) {
        $this->request = $request;
        $this->resource = $author;
    }
    
    public function perform() {
        if($this->request->validated()) {
            DB::beginTransaction();
            try{
                $this->resource->delete();
                DB::commit();
                return $this->sendResponse(new ViewAuthorResource($this->resource),self::SUCCESS_MESSAE);
               
            } catch (Exception $ex) {
                DB::rollBack();
                throw $ex;
            }
        }
    }
}
