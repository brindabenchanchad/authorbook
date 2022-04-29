<?php
namespace App\Components;

interface SearchQueryBuilderInterface{
    public function execute($data);
    public function query();
    public function defaultSort():string;
    public function filters():array;
    public function allowedSorts():array;
}