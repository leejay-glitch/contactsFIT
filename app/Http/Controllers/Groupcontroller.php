<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Group;
use App\Models\Contact;

class Groupcontroller extends Controller
{
    // app/Http/Controllers/GroupController.php

    public function index()
    {
        $groups = Group::with('contacts')->get();
        return view('groups', compact('groups'));
    }

public function create()
    {
        $contacts = Contact::all();
        return view('groups-create', compact('contacts'));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'group_name' => 'required|max:255',
        'description' => 'nullable|string',
        'contacts' => 'required|array',
        'contacts.*' => 'exists:contacts,id',
    ]);

    // Check if the group already exists by name
    $group = Group::where('name', $validatedData['group_name'])->first();

    if (!$group) {
        // If the group does not exist, create a new one
        $group = Group::create([
            'name' => $validatedData['group_name'],
            'description' => $validatedData['description'],
        ]);
    }

    // Sync the contacts to the group (whether existing or new)
    $group->contacts()->syncWithoutDetaching($validatedData['contacts']);

    // Redirect back to groups.index with a success message
    return redirect()->route('groups.index')->with('success', 'Contacts added to group successfully.');
}


    public function edit($id)
    {
        $group = Group::findOrFail($id);
        return view('groups.edit', compact('group'));
    }

    public function update(Request $request, Group $group)
    {
        $group->update($request->all());
        return redirect()->route('groups.index');
    }

    public function destroy($id)
{
    $group = Group::findOrFail($id);
    $group->delete();

    return redirect()->route('groups.index')->with('success', 'Group deleted successfully.');
}

public function assignContactsForm()
{
    $groups = Group::all();
    $contacts = Contact::all();
    return view('assigngroup', compact('groups', 'contacts'));
}

public function assignContacts(Request $request)
{
    $validatedData = $request->validate([
        'group_id' => 'required|exists:groups,id',
        'contacts' => 'required|array',
        'contacts.*' => 'exists:contacts,id',
    ]);

    $group = Group::findOrFail($validatedData['group_id']);
    $group->contacts()->syncWithoutDetaching($validatedData['contacts']);

    return redirect()->route('groups.index')->with('success', 'Contacts assigned to group successfully.');
}
}
