@extends('layout.master')
@section('title', 'Create Book')
@section('content')
<div class="container">
<header>
    <h2>Update Book</h2>

    
</header>
<div class="form-box">
    <form action="{{ route('books.execute') }}" method="POST" enctype="multipart/form-data" class="form">
        @csrf
        <input type="hidden" name="id" value="{{ $book->id }}" />
    
        <label for="title">Name :</label>
        <input type="text" name="name" value="{{ $book->name }}" />
        @error('name')
            <span class="text-danger error">{{ $message }}</span>
        @enderror
    
        <label for="author">Author :</label>
        <input type="text" name="author_id" value="{{ $book->author_id }}" />
        @error('author_id')
            <span class="text-danger error">{{ $message }}</span>
        @enderror
    
        {{-- <label for="student">Student :</label>
        <input type="text" name="student_id" value="{{ $student->student_id }}" />
        @error('student_id')
            <span class="text-danger error">{{ $message }}</span>
        @enderror --}}

        <label for="description">Description :</label>
        <textarea name="description">{{ $book->description }}</textarea>
        @error('description')
            <span class="text-danger error">{{ $message }}</span>
        @enderror 
    
        <label for="price">Price :</label>
        <input type="number" name="price" min="0" value="{{ $book->price }}" />
        @error('price')
            <span class="text-danger error">{{ $message }}</span>
        @enderror
    
        <label for="image">Current Image :</label>
        @if($book->image)
            <img src="{{ asset('images/' . $book->image) }}" alt="Current Image" width="100" height="100">
        @endif
    
        <label for="image">Upload New Image :</label>
        <input type="file" name="image" accept="image/*">
        @error('image')
            <span class="text-danger error">{{ $message }}</span>
        @enderror
    
        <input type="submit" value="Update Book" class="btn btn-secondary" />
    </form>
    
</div>
</div>
@endsection
 
