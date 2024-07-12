@extends('layouts.app')

@section('title', 'Assign Contacts to Group')

@section('content')
<div class="container">
    <h1>Assign Contacts to Group</h1>

    @if (count($groups) === 0)
        <p>No groups found. Please <a href="{{ route('groups.create') }}">create a group</a> first.</p>
    @else
        <form method="POST" action="{{ route('groups.assign') }}">
            @csrf
            <div class="form-group">
                <label for="group_id">Select Group:</label>
                <select id="group_id" name="group_id" class="form-control">
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="contacts">Select Contacts:</label>
                <select id="contacts" name="contacts[]" class="form-control" multiple>
                    @foreach ($contacts as $contact)
                        <option value="{{ $contact->id }}">{{ $contact->name }} ({{ $contact->email }})</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" >Assign Contacts</button>
        </form>
    @endif
</div>
@endsection
