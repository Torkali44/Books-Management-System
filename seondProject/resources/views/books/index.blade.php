@extends('layout.master')
@section('title', 'Book List')
@section('content')
    <h2>All Books</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>Author</th>
                <th>Student</th>
                <th>description</th>
                <th>price</th>
                <th>Action</th>
                <th>image</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->author ? $book->author->first_name . ' ' . $book->author->last_name : 'No Author' }}</td> 
                    <td>{{ $book->student ? $book->student->name : 'No Student' }}</td> 
                    <td>{{ $book->description }}</td>
                    <td>{{ $book->price }}</td>

                    <td>
                        @if ($book->image)
                             <img src="{{ asset('images/'. $book->image) }}" alt="image" class="book-image">

                        @else     
                        <p style="color: red;">image Not Found</p>
                        @endif
                    </td>

                    <td class="button-container">
                        <a href="/books/show/{{ $book->id}}" class="btnshow">Show</a>
                        <form action="/books/delete/{{ $book->id}}" method="POST">
                         <a href="/books/update/{{ $book->id}}" class="btnedit">Edit</a>
                          <form action="/books/delete/{{ $book->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btndelete">Delete</button>
                      </form>
                    </td>


                </tr>
               
            @endforeach
           
        </tbody>
    </table>
    <a href="{{ url('/') }}" class="btn">Back Home</a>

@endsection
