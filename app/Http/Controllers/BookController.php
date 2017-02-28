<?php

namespace App\Http\Controllers;
  
use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
  
  
class BookController extends Controller {
  
    public function index() {
  
        $books  = Book::all();
  
        return $books;
  
    }
  
    public function getBook($id){
  
        $book  = Book::find($id);
  
        return response()->json($book);
    }
  
    public function createBook(Request $request){
        // dd($request->all());
        $book = Book::create($request->all());
  
        return response()->json($book);
  
    }
  
    public function deleteBook($id){
        $book  = Book::find($id);
        $book->delete();
 
        return response()->json('deleted');
    }
  
    public function updateBook(Request $request, $id){
        $book  = Book::find($id);
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->isbn = $request->input('isbn');
        $book->save();
  
        return response()->json($book);
    }
}
