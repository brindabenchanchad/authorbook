<?php
namespace App\Managers\Book\Resource;

use App\Components\SearchQueryBuilderInterface;
use App\Models\Book;

class BookSearchResource implements SearchQueryBuilderInterface{
    
     public static $modelClass = Book::class;

     public function modelName()
     {
         return self::$modelClass;
     }
     public function showQueryFlag(){
          $showQueryFlag = ['showQuery'=>false,'exactQuery'=>false,'filterQuery'=>false,'sortQuery'=>false,'joinFilterQuery'=>true];
          return  $showQueryFlag;
     }

     public function filterName(){
        $filterNameArr =['id','book_name','author_id'];
        return $filterNameArr;
     }
     public function sortsName(){
        $SortsNameArr =['id','book_name','author_id'];
        return $SortsNameArr;
     }
     public function filterExactName(){
        $filterExactName ='book_name';
        return  $filterExactName;
     }
     public function perPage(){
        $perPage ='2';
        return  $perPage;
     }
     public function joinTblName(){
        $joinName ='author';
        return  $joinName;
     } 
     public function joinFrom(){
          $joinFromName ='author.id';
          return $joinFromName;
     }
     public function joinTo(){
          $joinToName = 'book.author_id';
          return $joinToName;
     }
}