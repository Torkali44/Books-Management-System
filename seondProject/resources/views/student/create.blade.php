@extends('layout.master')
@section('title', 'Create Student')
@section('content')
<div class="container">
<header>
    <h2>Create student</h2>

    
</header>
<div class="form-box">
<form action="{{ route('student.store') }}" method="POST" class="form" enctype="multipart/form-data">
    @csrf
    <label for="title">name :</label>
    <input type="text" name="name"  value="{{old('name')}}" />
    @error('name')
     <span class="text-danger error">{{ $message }}</span>
    @enderror

    <label for="author">email :</label>
    <input type="text" name="email"  value="{{old('email')}}" />
    @error('email')
    <span class="text-danger error">{{ $message }}</span>
    @enderror

    <label for="title">Phone :</label>
    <input type="number" name="phone"  min="0" value="{{old('phone')}}" />
    @error('phone')
    <span class="text-danger error">{{ $message }}</span>
    @enderror 

    {{-- <label for="image">Upload image :</label>
    <input type="file" name="image" accept="image/*" value="{{old('image')}}"/>
    @error('image')
    <span class="text-danger error">{{ $message }}</span>
     @enderror  --}}

    <input type="submit" value="Create student" class="btn btn-secondary" />
</form>
</div>
</div>
@endsection
 
