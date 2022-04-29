<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Managers\Book;

use App\Managers\Book\Requests\CreateBookRequest;
use App\Managers\Book\Requests\DeleteBookRequest;
use App\Managers\Book\Requests\UpdateBookRequest;
use App\Managers\Book\Resource\BookCollections;
use App\Managers\Book\Resource\ViewBookResource;

use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use TheSeer\Tokenizer\Exception;
/**
 * Description of BookManager
 *
 * @author brindachanchad
 */
class BookManager implements BookManagerInterface {
    
    public static function getBook($id) {
        return Book::findOrFail($id);
    }
    
    public function all($request) {
        return (new \App\Components\SearchQueryBuilder(new Search\BookSearch($request)))->search();
        return (new Search\BookSearch($request))->search();
        // return new BookCollections(book::paginate());
    }
    
    public function store(CreateBookRequest $request) {
        return (new Resource\CreateBookResource($request))->perform();
    }
    
    public function update(UpdateBookRequest $request,$id) {
        $book = self::getBook($id);
        return (new Resource\UpdateBookResource($request, $book))->perform();
    }
    
    public function delete(DeleteBookRequest $request,$id) {
        $book = self::getBook($id);
        return (new Resource\DeleteBookResource($request, $book))->perform();
    }            
}
