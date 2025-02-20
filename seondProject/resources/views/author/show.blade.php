@extends('layout.master')

@section('title', 'Author Details')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded">
        <div class="card-header text-center bg-primary text-white">
            <h2>{{ $author->first_name }} {{ $author->last_name }}</h2>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-center mb-4">
                @if ($author->image)
                    <img src="{{ asset('images/' . $author->image) }}" alt="Author Image" class="img-fluid rounded-circle" style="max-width: 150px;">
                @else
                    <p>No image available</p>
                @endif
            </div>
            
            <div class="mb-3">
                <p><strong>Author Name:</strong> {{ $author->first_name }} {{ $author->last_name }}</p>
                    <p><strong>Books:</strong> 
                        @if ($author->books->isNotEmpty())
                            @foreach ($author->books as $book)
                                {{ $book->name }}{{ !$loop->last ? ', ' : '' }}
                            @endforeach
                        @else
                            No books available
                        @endif
                    </p>
                </div>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('author.index') }}" class="btn btn-secondary btn-lg">Back</a>
        </div>
    </div>
</div>
@endsection

@section('styles')
@endsection
