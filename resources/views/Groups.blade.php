@extends('layouts.app')

@section('title', 'Groups')

@section('content')
<div class="container">
    <h1>Groups</h1>
 <p>
        <a href="{{ url('/groups/create') }}">
            <button type="button">Create Group</button>
        </a>
    </p>
    
    <p>
        <a href="{{ route('groups.assign-form') }}">
            <button type="button">Group Contacts</button>
        </a>
    </p>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Group Name</th>
                <th>Description</th>
                <th>Contacts</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($groups as $group)
                <tr>
                    <td>{{ $group->name }}</td>
                    <td>{{ $group->description }}</td>
                    <td>
                        <ul>
                            @foreach($group->contacts as $contact)
                                <li>{{ $contact->name }} ({{ $contact->email }})
                                    <!-- Remove from Group Form -->
                                    <form method="POST" action="{{ route('contacts.remove-from-group', ['contact' => $contact->id, 'group' => $group->id]) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Remove</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="{{ route('contacts.edit', $group->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form method="POST" action="{{ route('groups.destroy', $group->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
