<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Author;
use App\Models\Student;
use Illuminate\Http\Request;
class BookController extends Controller
{
  
    public function create()
    {
        $author = Author::all(); 
        $students = Student::all(); 

        return view('books.create', compact('author', 'students'));
    }
    public function show($id)
    {
        $book = Book::find($id);
        return view('books.show', compact('book'));
    }
 
    public function store(Request $request)
{
    $request->validate([
       'name' => ['required', 'string', 'max:255', 'regex:/^[^\d]+$/', 'alpha'],
       'author_id' => ['required', 'exists:authors,id'],
       'student_id' => ['required', 'exists:students,id'],
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|required',
    ], [
        'name.regex' => 'The name must not contain numbers.',
        'Author.regex' => 'The author name must not contain numbers.',
    ]);

    $imagename = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image');
        $extension = $imagePath->extension(); 
        $imagename = "library_" . time() . '.' . $extension;
        $imagePath->move(public_path('images'), $imagename); 
    }
    $name = $request->name;
    $author_id = $request->Author;
    $student_id = $request->student_id;
    $description = $request->description;
    $price = $request->price;
    $image= $imagename;
    $data = [
        'name' => $request->name,
        'author_id' => $request->author_id, 
        'student_id' => $request->student_id, 
        'description' => $request->description,
        'price' => $request->price,
        'image' => $imagename, 
    ];

    Book::create($data);

    return redirect()->route('books.index');
}


    
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function update($id)
    {
        $book = Book::find($id);
        return view('books.update' , compact('book'));
    }
    // public function execute(Request $request)
    // {
    //     $name=$request->name;
    //     $Author=$request->Author;
    //     $description=$request->description;
    //     $price=$request->price;
    //     $image=$request->image;

    //     $id = $request->id;
    //     $book = Book::find($id);
    //     $data = [
    //         'name' => $name,
    //         'Author' => $Author,
    //         'description' => $description,
    //         'price' => $price,
    //         'image' => $image,

    //     ];
    //     $book->update($data);
    //     $books = Book::get();
    //     return redirect()->route('books.index');
    // }
  
    public function execute(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $book = Book::find($request->id);
        if (!$book) {
            return redirect()->route('books.index')->with('error', 'Book not found');
        }
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image');
            $extension = $imagePath->extension(); 
            $imagename = "library_" . time() . '.' . $extension;
            $imagePath->move(public_path('images'), $imagename);
            $book->image = $imagename;
        }
    
        $book->name = $request->name;
        $book->author_id = $request->author_id;
        $book->description = $request->description;
        $book->price = $request->price;
        $book->save();
    
        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }
    

    public function destroy($id)
    {
        $book = Book::find($id);
        if($book){
            $book->delete();
            
            return redirect()->back() ;
        }
    }
}