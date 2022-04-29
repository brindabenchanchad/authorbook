<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Managers\Book\Search;

use App\Managers\Book\Resource\BookCollections;
use App\Models\Book;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
/**
 * Description of UserSearch
 *
 * @author brindachanchad
 */
class BookSearch implements \App\Components\SearchQueryBuilderInterface {
    
    protected $request;
    public function __construct($request) {
        $this->request = $request;
    }
    
    public function execute($data) {
        return new BookCollections($data);
    }
    
    public function query() {
        // return $query = Book::class;
        return $query = Book::query()->with('author');
    }
    
    public function defaultSort():string {
        return 'book_name';
    }
    
    public function allowedSorts():array{
        return ['book_name','author_id'];
    }
//    
    public function filters():array {
        return ['book_name','author_id'];
    }
}
