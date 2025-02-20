@extends('layout.master')
@section('title', 'Edit Author')
@section('content')
<div class="container">
<header>
    <h2>Update Author</h2>
</header>
<div class="form-box">
    <form action="{{ route('author.update', $author->id) }}" method="POST" enctype="multipart/form-data" class="form">
        @csrf
        @method('PUT')
    
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="{{ old('first_name', $author->first_name) }}">
        @error('first_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="{{ old('last_name', $author->last_name) }}">
        @error('last_name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    
        <label>Book:</label>
        <select name="book_id">
            @foreach ($books as $book)
                <option value="{{ $book->id }}" {{ $book->id == $author->book_id ? 'selected' : '' }}>
                    {{ $book->name }}
                </option>
            @endforeach
        </select>
    
        <label for="image">Upload New Image:</label>
        <input type="file" name="image">
        @error('image')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    
        @if ($author->image)
            <div>
                <img src="{{ asset('images/authors/' . $author->image) }}" alt="Author Image" width="100">
            </div>
        @endif
    
        <input type="submit" value="Update Author" class="btn btn-secondary">
    </form>
    
    
</div>
</div>
@endsection
