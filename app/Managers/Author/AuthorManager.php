<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Managers\Author;

use App\Managers\Author\Requests\CreateAuthorRequest;
use App\Managers\Author\Requests\DeleteAuthorRequest;
use App\Managers\Author\Requests\UpdateAuthorRequest;
use App\Managers\Author\Resource\AuthorCollections;
use App\Managers\Author\Resource\ViewAuthorResource;

use App\Models\Author;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use TheSeer\Tokenizer\Exception;
/**
 * Description of AuthorManager
 *
 * @author anupamojha
 */
class AuthorManager implements AuthorManagerInterface {
    
    public static function getAuthor($id) {
        return Author::findOrFail($id);
    }
    
    public function all($request) {
        return (new \App\Components\SearchQueryBuilder(new Search\AuthorSearch($request)))->search();
        return (new Search\AuthorSearch($request))->search();
        // return new AuthorCollections(author::paginate());
    }
    
    public function store(CreateAuthorRequest $request) {
        return (new Resource\CreateAuthorResource($request))->perform();
    }
    
    public function update(UpdateAuthorRequest $request,$id) {
        $author = self::getAuthor($id);
        return (new Resource\UpdateAuthorResource($request, $author))->perform();
    }
    
    public function delete(DeleteAuthorRequest $request,$id) {
        $author = self::getAuthor($id);
        return (new Resource\DeleteAuthorResource($request, $author))->perform();
    }            
}
