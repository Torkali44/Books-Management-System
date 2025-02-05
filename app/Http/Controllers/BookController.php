<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
  
    public function create()
    {
        return view('books.create');
    }
    public function store(Request $request)
    {
        $Name=$request->Name;
        $Description=$request->Description;
        $Price=$request->Price;

        $data = [
            'Name' => $Name,
            'Description' => $Description,
            'Price' => $Price,

        ];
        Book::create($data);
        return redirect()->route('books.index');    }
    
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }
}