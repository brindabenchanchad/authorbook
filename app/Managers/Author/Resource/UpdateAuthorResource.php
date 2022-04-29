<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Managers\Author\Resource;

use App\Components\AbstractResource;
use App\Managers\Author\Requests\UpdateAuthorRequest;
use App\Models\Author;
use Illuminate\Support\Facades\DB;
use TheSeer\Tokenizer\Exception;

/**
 * Description of AuthorViewResource
 *
 * @author anupamojha
 */
class UpdateAuthorResource extends AbstractResource {
    const SUCCESS_MESSAGE = "Author Updated Successfully.";
    /**
     * 
     * @var type Request
     */
    private $request;
    
    /**
     * 
     * @param UpdateAuthorRequest $request
     */
    private $resource;
    
    public function __construct(UpdateAuthorRequest $request, Author $author) {
        $this->request = $request;
        $this->resource = $author;
    }
    
    public function perform() {
        if($this->request->validated()) {
            DB::beginTransaction();
            try{
                $this->resource->update($this->saveAttributes());
                // Update Author in KeyCloak
                DB::commit();
                return $this->sendResponse(new ViewAuthorResource($this->resource),self::SUCCESS_MESSAGE);
            } catch (Exception $ex) {
                DB::rollBack();
                return $this->sendError($ex->getMessage(),$this->request->all());
            }
        }
    }
    
    protected function saveAttributes() {
        return [
            'author_name'    => $this->request->author_name,
            'author_email'   => $this->request->author_email,
        ];
    }
}
