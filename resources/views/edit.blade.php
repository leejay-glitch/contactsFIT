@extends('layouts.app')

@section('title', 'Edit Contact')

@section('content')
<div class="container">
    <h1>Edit Contact</h1>
    <form method="POST" action="{{ route('contacts.update', ['id' => $contact->id]) }}">
        @csrf
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $contact->name) }}" required>
        @error('name')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email', $contact->email) }}" required>
        @error('email')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <label for="location">Location:</label>
        <input type="text" id="location" name="location" value="{{ old('location', $contact->location) }}" required>
        @error('location')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <label for="instagram">Instagram:</label>
        <input type="url" id="instagram" name="instagram" value="{{ old('instagram', $contact->instagram) }}">
        @error('instagram')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <button type="submit">Update Contact</button>
    </form>
</div>
@endsection
