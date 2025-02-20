@extends('layout.master')
@section('title', 'Create Book')
@section('content')
<div class="container">
<header>
    <h2>Create Author</h2>

    
</header>
<div class="form-box">

<form action="{{ route('author.store') }}" method="POST" enctype="multipart/form-data" class="form">
    @csrf

    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" value="{{ old('first_name') }}">
    @error('first_name')
        <span class="text-danger">{{ $message }}</span>
    @enderror

    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" value="{{ old('last_name') }}">
    @error('last_name')
        <span class="text-danger">{{ $message }}</span>
    @enderror

    <label >Book:</label>
    <select name="book_id">
        @foreach ($books as $book)
            <option value="{{ $book->id }}">{{ $book->name }}</option>
        @endforeach
    </select>

    <label for="image">Upload Image:</label>
    <input type="file" name="image">
    @error('image')
        <span class="text-danger">{{ $message }}</span>
    @enderror

    <input type="submit" value="Create Author" class="btn btn-secondary">
</form>

</div>
</div>
@endsection
 
