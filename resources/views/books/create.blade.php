@extends('layout.master')
@section('title', 'Create Book')
@section('content')
<div class="container">
<header>
    <h1>Create Book</h1>

    
</header>
<div class="form-box">
<form action="{{ route('books.store') }}" method="POST" class="form">
    @csrf
    <label for="title">Name :</label>
    <input type="text" name="Name" required />

    <label for="title">Description :</label>
    <textarea name="Description"></textarea>

    <label for="title">Price :</label>
    <input type="number" name="Price" required min="0" />

    <input type="submit" value="Create Book" class="btn btn-secondary" />
</form>
</div>
</div>
@endsection
 
@section('scripts')
    <script>
        console.log('Create Book Page Loaded');
    </script>
@endsection