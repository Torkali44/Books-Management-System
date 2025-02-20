<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $student = Student::all(); 
        return view('student.create', compact('student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|max:255|unique:students,email',
        'phone' => 'required|numeric|min:0',
        // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // $imageName = null;
    // if ($request->hasFile('image')) {
    //     $image = $request->file('image');
    //     $imageName = "author_" . time() . '.' . $image->extension();
    //     $image->move(public_path('images/authors'), $imageName);
    // }

    $student = Student::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        // 'image' => $imageName,
    ]);

    return redirect()->route('student.index')->with('success', 'Author added successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        if ($student) {
            $student->delete();
            return redirect()->back()->with('success', 'Student deleted successfully');
        }
    
        return redirect()->back()->with('error', 'Student not found');
    }
}
