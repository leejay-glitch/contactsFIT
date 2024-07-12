<!-- <div class="group-details">
    <h2>{{ $group->name }}</h2>
    <p>{{ $group->description }}</p>

<h3>Contacts in this group:</h3>
    <ul>
        @foreach ($group->contacts as $contact)
            <li>
                {{ $contact->name }} ({{ $contact->email }})

             

                <!-- Remove from Group Form -->
                <form method="POST" action="{{ route('contacts.remove-from-group', ['contact' => $contact->id, 'group' => $group->id]) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Remove from {{ $group->name }}</button>
                </form>
            </li>
        @endforeach
    </ul> -->