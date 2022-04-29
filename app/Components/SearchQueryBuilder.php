<?php
namespace App\Components;

use App\Components\SearchQueryBuilderInterface;
use Spatie\QueryBuilder\QueryBuilder;
use function request;

class SearchQueryBuilder {

    protected $searchModel;
    protected $query;
    public function __construct(SearchQueryBuilderInterface $searchModel){
        $this->searchModel = $searchModel;
    }
    
    protected function buildQuery() {
        $this->query = QueryBuilder::for($this->searchModel->query());
        $this->buildSorting();
        $this->buildFilters();
    }
    
    protected function buildSorting() {
        if(method_exists($this->searchModel,'defaultSort')) {
            $this->query->defaultSort($this->searchModel->defaultSort());
        }
        if(method_exists($this->searchModel,'allowedSorts')) {
            $this->query->allowedSorts($this->searchModel->allowedSorts());
        }
        return;
    }
    
    protected function buildFilters() {
        if(!empty($this->searchModel->filters())) {
            $this->query->allowedFilters($this->searchModel->filters());
        }
        return;
    }
    
    protected function paginate() {
        if(($perpage = request()->per_page)) {
            return $this->query->paginate($perpage);
	} else {
            return $this->query->paginate();
        }
    }

    public function search()
    { 
        $this->buildQuery();
        $data = $this->paginate();
        return $this->searchModel->execute($data);
    }
}