<?php

namespace App\Http\Controllers;

use App\Managers\Book\Requests\CreateBookRequest;
use App\Managers\Book\Requests\DeleteBookRequest;
use App\Managers\Book\Requests\UpdateBookRequest;
use App\Managers\Book\BookManagerInterface;
use Laravel\Lumen\Http\Request;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $manager;
    
    public function __construct(BookManagerInterface $bookManager)
    {
        $this->manager = $bookManager;
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
        Log::info('Showing the book list: ');
        return $this->manager->all($request);
    }
    
    /**
     * Store a Book and 
     */
    public function store(CreateBookRequest $request) {
        Log::info('Storing the new book:');
        return $this->manager->store($request);
    }
    
    /**
     * Store a Book and 
     */
    public function view($id) {
        Log::info('Showing the Book:'.$id);
        print_r($this);
    }
            
    /**
     * Store a Book and 
     */
    public function update(UpdateBookRequest $request, $id) {
        Log::info('Updating the book:'.$id);
        return $this->manager->update($request,$id);
    }
    
    /**
     * Store a Book and 
     */
    public function delete(DeleteBookRequest $request, $id) {
        return $this->manager->delete($request,$id);
    }
    //
}
