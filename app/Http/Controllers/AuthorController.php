<?php

namespace App\Http\Controllers;

use App\Managers\Author\Requests\CreateAuthorRequest;
use App\Managers\Author\Requests\DeleteAuthorRequest;
use App\Managers\Author\Requests\UpdateAuthorRequest;
use App\Managers\Author\AuthorManagerInterface;
use Laravel\Lumen\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $manager;
    
    public function __construct(AuthorManagerInterface $authorManager)
    {
        $this->manager = $authorManager;
        /**
         * add Middleware to check record base access.
         */
//         $this->middleware('auth');
//         $this->middleware('subscribed', ['except' => [
//            'indec',
//            'barAction',
//        ]]);
    }
    
    public function Index(Request $request) {
        Log::info('Showing the author list: ');
        return $this->manager->all($request);
    }
    
    /**
     * Store a Author and 
     */
    public function store(CreateAuthorRequest $request) {
        Log::info('Storing the new author:');
        return $this->manager->store($request);
    }
    
    /**
     * Store a Author and 
     */
    public function view($id) {
        Log::info('Showing the Author:'.$id);
        print_r($this);
    }
            
    /**
     * Store a Author and 
     */
    public function update(UpdateAuthorRequest $request, $id) {
        Log::info('Updating the author:'.$id);
        return $this->manager->update($request,$id);
    }
    
    /**
     * Store a Author and 
     */
    public function delete(DeleteAuthorRequest $request, $id) {
        return $this->manager->delete($request,$id);
    }
    //
}
