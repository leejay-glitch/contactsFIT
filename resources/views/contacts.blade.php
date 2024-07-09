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
    </style>
</head>
<body>
    <h1>Contacts List</h1>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Location</th>
                <th>Instagram</th>
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
                            <form action="{{ route('contacts.destroy', ['id' => $contact->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this contact?');">
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
           
    </ul>
    <p>
        <a href="{{ route('groups.index') }}">
            <button type="button">group contacts</button>
        </a>
    </p>
</body>
</html>
@endsection