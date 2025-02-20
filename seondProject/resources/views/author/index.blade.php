@extends('layout.master')
@section('title', 'Book List')
@section('content')
    <h2>All Author</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>first_name</th>
                <th>last_name</th>
                <th>Book name</th>
                <th>Image</th>
                <th>Action</th>

                

            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
                <tr>
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->first_name }}</td>
                    <td>{{ $author->last_name }}</td>
                    {{-- <td>{{ count($author->book) > 0 ? $author->book['name'] : 'No Book Assigned' }}</td> --}}
                 <td>
    @if ($author->books->isNotEmpty())
        @foreach ($author->books as $book)
            {{ $book->name }}{{ !$loop->last ? ', ' : '' }}
        @endforeach
    @else
        No Books Assigned
    @endif
</td>

                    <td>
                        @if ($author->image)
                            <img src="{{ asset('images/authors/' . $author->image) }}" alt="Author Image" width="50">
                        @else
                            No Image
                        @endif
                    </td>
                    <td class="button-container">
                        
                        
                        <a href="{{ route('author.show', $author->id) }}" class="btnshow">Show</a>
                        <a href="{{ route('author.edit', ['id' => $author->id]) }}" class="btnedit">Edit</a>
                        <form action="{{ route('author.destroy', $author->id) }}" method="POST">
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
