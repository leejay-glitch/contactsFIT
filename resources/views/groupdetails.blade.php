<!-- groupdetails.blade.php -->

<h1>{{ $group->name }}</h1>
<h2>{{ $group->description }}</h2>

<h3>Contacts in {{ $group->name }}</h3>
<ul>
    @foreach ($group->contacts as $contact)
        <li>{{ $contact->name }} ({{ $contact->email }})</li>
    @endforeach
</ul>

<h3>Manage Contacts in {{ $group->name }}</h3>
@foreach ($group->contacts as $contact)
    @if ($isWiseGroup)
        <!-- Assign to Wise Group Form -->
        <form method="POST" action="{{ route('contacts.assign-to-wise-group', $contact) }}">
            @csrf
            <button type="submit">Assign to Wise Group</button>
        </form>

        <!-- Remove from Wise Group Form -->
        <form method="POST" action="{{ route('contacts.remove-from-wise-group', $contact) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Remove from Wise Group</button>
        </form>
    @else
        <!-- Assign to Not Wise Group Form -->
        <form method="POST" action="{{ route('contacts.assign-to-not-wise-group', $contact) }}">
            @csrf
            <button type="submit">Assign to Not Wise Group</button>
        </form>

        <!-- Remove from Not Wise Group Form -->
        <form method="POST" action="{{ route('contacts.remove-from-not-wise-group', $contact) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Remove from Not Wise Group</button>
        </form>
    @endif
@endforeach