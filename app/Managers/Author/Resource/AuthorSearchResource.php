<?php
namespace App\Managers\Author\Resource;

use App\Components\SearchQueryBuilderInterface;
use App\Models\Author;

class AuthorSearchResource implements SearchQueryBuilderInterface{
    
     public static $modelClass = Author::class;

     public function modelName()
     {
         return self::$modelClass;
     }
     public function showQueryFlag(){
          $showQueryFlag = ['showQuery'=>false,'exactQuery'=>false,'filterQuery'=>false,'sortQuery'=>false,'joinFilterQuery'=>true];
          return  $showQueryFlag;
     }

     public function filterName(){
        $filterNameArr =['id','author_name','author_email'];
        return $filterNameArr;
     }
     public function sortsName(){
        $SortsNameArr =['id','author_name','author_email'];
        return $SortsNameArr;
     }
     public function filterExactName(){
        $filterExactName ='author_name';
        return  $filterExactName;
     }
     public function perPage(){
        $perPage ='2';
        return  $perPage;
     }
     public function joinTblName(){
        $joinName ='book';
        return  $joinName;
     } 
     public function joinFrom(){
          $joinFromName ='book.author_id';
          return $joinFromName;
     }
     public function joinTo(){
          $joinToName = 'author.id';
          return $joinToName;
     }
}