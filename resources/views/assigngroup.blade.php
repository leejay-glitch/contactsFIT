<div>
    <!-- Happiness is not something readymade. It comes from your own actions. - Dalai Lama -->
</div>
@extends('layouts.app')

@section('title', 'Assign Contact to Group')

@section('content')
    <div class="container">
        <h1>Assign Contact to Group</h1>

        <form method="POST" action="{{ route('assign-to-group') }}">
            @csrf
            

            <label for="contact_id">Select Contact:</label>
            <select name="contact_id" id="contact_id">
                @foreach($contacts as $contact)
                    <option value="{{ $contact->id }}">{{ $contact->name }} ({{ $contact->email }})</option>
                @endforeach
            </select>

            <label for="group_id">Select Group:</label>
            <select name="group_id" id="group_id">
                @foreach($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
            </select>

            <button type="submit">Assign to Group</button>
            <!-- <p>
        <a href="{{ route('assign-to-group') }}">
            <button type="button" method="POST">group contacts</button>
        </a>
    </p> -->
        </form>
    </div>
@endsection
