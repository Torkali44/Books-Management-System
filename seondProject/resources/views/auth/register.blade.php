@extends('layout.master')

@section('content')
<div class="container">
    <h2> Create New Acount </h2>
    <form action="{{ route('register') }}" method="POST">
        @csrf

        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>

        <label>Email :</label>
        <input type="email" name="email" value="{{ old('email') }}" required>

        <label>Password :</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
    <x-error-messages class="text-danger" style="color: red"/>

</div>
@endsection
