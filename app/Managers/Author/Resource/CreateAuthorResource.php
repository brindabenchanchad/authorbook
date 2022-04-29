<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Managers\Author\Resource;

use App\Components\AbstractResource;
use App\Managers\Author\Requests\CreateAuthorRequest;
use App\Models\Author;
use Illuminate\Support\Facades\DB;
use TheSeer\Tokenizer\Exception;

/**
 * Description of UserViewResource
 *
 * @author anupamojha
 */
class CreateAuthorResource extends AbstractResource {
   const SUCCESS_MESSAGE = "Author Created Successfully.";
    /**
     * 
     * @var type Request
     */
    private $request;
    
    
    public function __construct(CreateAuthorRequest $request) {
        $this->request = $request;
    }
    
    public function perform() {
        if($this->request->validated()) {
            DB::beginTransaction();
            try{
                $author = Author::create($this->saveAttributes());
                // Create User in KeyCloak
                DB::commit();
                return $this->sendResponse(new ViewAuthorResource($author),self::SUCCESS_MESSAGE);
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
