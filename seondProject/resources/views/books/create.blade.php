@extends('layout.master')
@section('title', 'Create Book')
@section('content')
<div class="container">
<header>
    <h2>Create Book</h2>

    
</header>
<div class="form-box">
<form action="{{ route('books.store') }}" method="POST" class="form" enctype="multipart/form-data">
    @csrf
    <label for="title">name :</label>
    <input type="text" name="name"  value="{{old('name')}}" />
    @error('name')
     <span class="text-danger error">{{ $message }}</span>
    @enderror

    <label for="author">Author :</label>
    <select name="author_id">
       @foreach ($author as $auth)
           <option value="{{$auth->id}}">{{$auth->first_name}}</option>
       @endforeach
    </select>
    @error('author_id')
    <span class="text-danger error">{{ $message }}</span>
    @enderror

    <label for="student">Students :</label>
    <select name="student_id">
       @foreach ($students as $student)
           <option value="{{$student->id}}">{{$student->name}}</option>
       @endforeach
    </select>
    @error('student_id')
    <span class="text-danger error">{{ $message }}</span>
    @enderror

    <label for="title">description :</label>
    <textarea name="description">{{old('description')}} </textarea>
    @error('description')
    <span class="text-danger error">{{ $message }}</span>
    @enderror

    <label for="title">price :</label>
    <input type="number" name="price"  min="0" value="{{old('price')}}" />
    @error('price')
    <span class="text-danger error">{{ $message }}</span>
    @enderror 

    <label for="image">Upload image :</label>
    <input type="file" name="image" accept="image/*" value="{{old('image')}}"/>
    @error('image')
    <span class="text-danger error">{{ $message }}</span>
     @enderror 

    <input type="submit" value="Create Book" class="btn btn-secondary" />
</form>
</div>
</div>
@endsection
 
