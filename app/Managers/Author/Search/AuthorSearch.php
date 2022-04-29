<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Managers\Author\Search;

use App\Managers\Author\Resource\AuthorCollections;
use App\Models\Author;
use App\Models\Book;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
/**
 * Description of UserSearch
 *
 * @author brindachanchad
 */
class AuthorSearch implements \App\Components\SearchQueryBuilderInterface {
    
    protected $request;
    public function __construct($request) {
        $this->request = $request;
    }
    
    public function execute($data) {
        return new AuthorCollections($data);
    }
    
    public function query() {
        // return $query = Author::class;
        return $query = Author::query()->with('books');
        
    }
    
    public function defaultSort():string {
        return 'author_name';
    }
    
    public function allowedSorts():array{
        return ['author_email','author_name'];
    }
//    
    public function filters():array {
        return ['author_name','author_email'];
    }
}