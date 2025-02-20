<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    
    public function index()
{
    $authors = Author::with('books')->get(); // تحميل الكتب مع المؤلفين
    return view('author.index', compact('authors'));
}

    public function create()
    {
        
        $books= Book::all();
        return view('author.create' ,compact('books'));

    }
    public function show($id)
    {
        $author = Author::with('books')->findOrFail($id);
        return view('author.show', compact('author'));
    }
    

    

    
    
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'first_name' => ['required', 'string', 'max:255', 'alpha'],
    //         'last_name' => ['required', 'string', 'max:255', 'alpha'],
    //         'book_id' => ['null', 'integer', 'exists:books,id'], 
    //     ]);
    
    //     $data = [
    //         'first_name' => $request->first_name,
    //         'last_name' => $request->last_name,
    //         'book_id' => $request->book_id,
    //     ];
    
    //     Author::create($data); 
    
    //     return redirect()->route('author.index');
    // }
    
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'first_name' => ['required', 'string', 'max:255', 'alpha'],
    //         'last_name' => ['required', 'string', 'max:255', 'alpha'],
    //         'book_id' => ['nullable', 'integer', 'exists:books,id'], 
    //     ]);
    
    //     $author = Author::create([
    //         'first_name' => $request->first_name,
    //         'last_name' => $request->last_name,
    //     ]);
    
    //     if ($request->book_id) {
    //         $book = Book::find($request->book_id);
    //         $book->author_id = $author->id;
    //         $book->save();
    //     }
    
    //     return redirect()->route('author.index')->with('success', 'Author added successfully');
    // }
    public function store(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'book_id' => 'nullable|exists:books,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $imageName = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = "author_" . time() . '.' . $image->extension();
        $image->move(public_path('images/authors'), $imageName);
    }

    $author = Author::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'book_id' => $request->book_id,
        'image' => $imageName,
    ]);

    return redirect()->route('author.index')->with('success', 'Author added successfully');
}

    /**
     * Display the specified resource.
     */
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $author = Author::find($id);
        
        if (!$author) {
            return redirect()->route('author.index')->with('error', 'Author not found');
        }
    
        $books = Book::all(); // جلب جميع الكتب لإظهارها في القائمة المنسدلة
        return view('author.edit', compact('author', 'books'));
    }
    

    /**
     * Update the specified resource in storage.
     */
//     public function update(Request $request, $id)
// {
//     $request->validate([
//         'first_name' => 'required|string|max:255',
//         'last_name' => 'required|string|max:255',
//         'book_id' => 'nullable|exists:books,id',
//     ]);

//     $author = Author::find($id);
//     if (!$author) {
//         return redirect()->route('author.index')->with('error', 'Author not found');
//     }

//     $author->first_name = $request->first_name;
//     $author->last_name = $request->last_name;

//     if ($request->book_id) {
//         $author->book_id = $request->book_id;
//     }

//     $author->save();

//     return redirect()->route('author.index')->with('success', 'Author updated successfully');
// }
public function update(Request $request, $id)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'book_id' => 'nullable|exists:books,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $author = Author::find($id);
    if (!$author) {
        return redirect()->route('author.index')->with('error', 'Author not found');
    }

    if ($request->hasFile('image')) {
        if ($author->image && file_exists(public_path('images/authors/' . $author->image))) {
            unlink(public_path('images/authors/' . $author->image));
        }

        $image = $request->file('image');
        $imageName = "author_" . time() . '.' . $image->extension();
        $image->move(public_path('images/authors'), $imageName);
        $author->image = $imageName;
    }

    $author->first_name = $request->first_name;
    $author->last_name = $request->last_name;
    $author->book_id = $request->book_id;
    $author->save();

    return redirect()->route('author.index')->with('success', 'Author updated successfully');
}


public function execute(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|max:255|regex:/^[^\d]+$/',
        'last_name' => 'required|string|max:255|regex:/^[^\d]+$/',
        'book_id' => 'required|exists:books,id',
    ]);

    $author = Author::find($request->id);
    if (!$author) {
        return redirect()->route('author.index')->with('error', 'Author not found');
    }

    $author->first_name = $request->first_name;
    $author->last_name = $request->last_name;
    $author->book_id = $request->book_id;
    $author->save();

    return redirect()->route('author.index')->with('success', 'Author updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $author = Author::find($id);
        if ($author) {
            $author->delete();
            return redirect()->back()->with('success', 'Author deleted successfully');
        }
    
        return redirect()->back()->with('error', 'Author not found');
    }
    
}
