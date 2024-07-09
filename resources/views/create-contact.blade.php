@extends('layouts.app')
@section('title', 'Home')

@section('content')
<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
</div>
<!DOCTYPE html>
<html>
<head>
    <title>Create Contact</title>
</head>
<body>
    <h1>Create a New Contact</h1>
    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>
        <br>
        <label for="instagram">Instagram:</label>
        <input type="url" id="instagram" name="instagram">
        <br>
        <button type="submit">Save Contact</button>
    </form>
</body>
</html>
@endsection