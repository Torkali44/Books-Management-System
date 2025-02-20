@extends('layout.master')
@section('title', 'student List')
@section('content')
    <h2>All Students</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>Email</th>
                <th>Phone</th>               
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email}}</td> 
                    <td>{{ $student->phone }}</td>
                    {{-- <td>
                        @if ($student->image)
                             <img src="{{ asset('images/'. $student->image) }}" alt="image" class="student-image">

                        @else     
                        <p style="color: red;">image Not Found</p>
                        @endif
                    </td> --}}

                    <td class="button-container">
                        <a href="/student/show/{{ $student->id}}" class="btnshow">Show</a>
                        <form action="/student/delete/{{ $student->id}}" method="POST">
                       <a href="/student/update/{{ $student->id}}" class="btnedit">Edit</a>
                      <form action="/student/delete/{{ $student->id}}" method="POST">
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
