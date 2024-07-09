<div>
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
</div>
<!-- resources/views/remove-from-group.blade.php -->

@extends('layouts.app')

@section('title', 'Remove Contact from Group')

@section('content')
<div class="container">
    <h1>Remove Contact from Group</h1>
    <form method="POST" action="{{ route('contacts.remove-from-group') }}">
        @csrf

        <input type="hidden" name="contact_id" value="{{ $contact->id }}">

        <label for="group_id">Select Group:</label>
        <select name="group_id" id="group_id">
            @foreach($groups as $group)
                <option value="{{ $group->id }}">{{ $group->name }}</option>
            @endforeach
        </select>

        <button type="submit">Remove from Group</button>
    </form>
</div>
@endsection
