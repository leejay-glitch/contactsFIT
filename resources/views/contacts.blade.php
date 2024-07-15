@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Contacts</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .action-buttons button, .group-contacts-button button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px; /* Rounded corners */
            transition: background-color 0.3s ease; /* Smooth transition for hover effect */
        }
        .action-buttons button:hover, .group-contacts-button button:hover {
            background-color: #0056b3;
        }
        .input-group-append button {
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
            background-color: #007bff;
            color: white;
            border: none;
        }   
    </style>
</head>
<body>
    <h1>Contacts List</h1>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
    
    <form action="{{ route('contacts.search') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search contacts..." name="search">
            <div class="input-group-append">
                <button type="submit">
                    <i class="fas fa-search"></i> 
                </button>
            </div>
        </div>
    </form>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Location</th>
                <th>Instagram</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $index => $contact)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->location }}</td>
                    <td><a href="{{ $contact->instagram }}" target="_blank">{{ $contact->instagram }}</a></td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('contacts.edit', $contact->id) }}">
                                <button type="button">Edit</button>
                            </a>
                            <form action="{{ route('contacts.destroy', ['id' => $contact->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this contact?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- contacts.index.blade.php -->
<form action="{{ route('contacts.export') }}">
    <button type="submit">Export Contacts</button>
</form>
<!-- contacts.import.blade.php -->
<form action="{{ route('contacts.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <button type="submit">Import Contacts</button>
</form>


    <p class="group-contacts-button">
        <a href="{{ route('groups.index') }}">
            <button type="button">Group Contacts</button>
        </a>
    </p>
</body>
</html>
@endsection
