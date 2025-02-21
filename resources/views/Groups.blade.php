@extends('layouts.app')

@section('title', 'Groups')

@section('content')
<style>
    .btn-action {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 6px 11px; /* Smaller padding */
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 28px; /* Smaller font size */
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 8px; /* Rounded corners */
        transition: background-color 0.3s ease; /* Smooth transition for hover effect */
    }
    .btn-action:hover {
        background-color: #0056b3;
    }
    .btn-sm {
        padding: 5px 8px; /* Even smaller padding */
        font-size: 13px; /* Even smaller font size */
    }
    .input-group-append button{
            display: flex;
            align-items: center;
            background-color: #007bff;
            color: white;
            border: none;
    } 
</style>

<div class="container">
    <h1>Groups</h1>
    <form action="{{ route('groups.search') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search groups..." name="search">
            <div class="input-group-append">
                <button type="submit">
                    <i class="fas fa-search"></i> <!-- Font Awesome search icon -->
                </button>
            </div>
        </div>
    </form>

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
                                        <button type="submit" class="btn-action btn-sm">Remove</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <!-- <a href="{{ route('contacts.edit', $group->id) }}" class="btn-action btn-sm">Edit</a> -->
                            <form method="POST" action="{{ route('groups.destroy', $group->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>

    <div class="mt-3">
        <a href="{{ url('/groups/create') }}">
            <button type="button" class="btn-action btn-sm">Create Group</button>
        </a>
        <a href="{{ route('groups.assign-form') }}">
            <button type="button" class="btn-action btn-sm">Group Contacts</button>
        </a>
    </div>
</div>
<!-- contacts.index.blade.php -->
<form action="{{ route('groups.export') }}">
    <button type="submit" class="btn btn-primary">Export groups</button>
</form>
<!-- contacts.import.blade.php -->
<form action="{{ route('groups.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <button type="submit" class="btn btn-primary">Import Groups</button>
</form>
@endsection
