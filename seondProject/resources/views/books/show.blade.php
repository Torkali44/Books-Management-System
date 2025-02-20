@extends('layout.master')

@section('title', 'Book Details')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded">
        <div class="card-header text-center bg-primary text-white">
            <h2>{{ $book->name }}</h2>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-center mb-4">
                @if ($book->image)
                    <img src="{{ asset('images/' . $book->image) }}" alt="Book Image" class="img-fluid rounded-circle" style="max-width: 150px;">
                @else
                    <p>No image available</p>
                @endif
            </div>
            <div class="mb-3">
                <p><strong>Book Name:</strong> {{ $book->name ?? 'No name available' }}</p>
                <p><strong>Author Name:</strong> {{ $book->author->name ?? 'No name available' }}</p>
                <p><strong>Description:</strong> {{ $book->description ?? 'No description available' }}</p>
                <p><strong>Price:</strong> ${{ number_format($book->price, 2) ?? 'No price available' }}</p>
                <p><strong>Student:</strong> {{ $book->student ? $book->student->name : 'No student available' }}</p>
            </div>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('books.index') }}" class="btn btn-secondary btn-lg">Back</a>
        </div>
    </div>
</div>
@endsection

@section('styles')
@endsection
