@extends('layout.master')
@section('title', 'Book List')
@section('content')
    <h1>All Books</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->Name }}</td>
                    <td>{{ $book->Description }}</td>
                    <td>{{ $book->Price }}</td>
                </tr>
               
            @endforeach
           
        </tbody>
    </table>
    <a href="{{ url('/') }}" class="btn">Back Home</a>

@endsection
