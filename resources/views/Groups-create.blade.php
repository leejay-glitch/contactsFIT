@extends('layouts.app')

@section('title', 'Create Group')

@section('content')
    <div class="container">
        <h1>Create Group</h1>

        <form method="POST" action="{{ route('groups.store') }}">
            @csrf

            <label for="group_name">Group Name:</label>
            <input type="text" name="group_name" id="group_name" required>

            <label for="description">Description:</label>
            <textarea name="description" id="description"></textarea>

            <label for="contacts">Select Contacts:</label>
            <select name="contacts[]" id="contacts" multiple>
                @foreach($contacts as $contact)
                    <option value="{{ $contact->id }}">{{ $contact->name }} ({{ $contact->email }})</option>
                @endforeach
            </select>

            <button type="submit">Create Group</button>
        </form>
    </div>
@endsection
