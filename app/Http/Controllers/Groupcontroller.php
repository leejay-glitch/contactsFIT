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
    // $groups = Group::with('contacts')->get();
    $contacts = Contact::all();
    $wiseGroup = Group::find(7); // Replace 1 with the ID of the Wise Group
    $notWiseGroup = Group::find(8); // Replace 2 with the ID of the Not Wise Group
    return view('groups', compact('contacts', 'wiseGroup', 'notWiseGroup'));

    // return view('Groups', compact('groups','contacts'));
}

public function create()
{
    return view('groups-create');
}

public function store(Request $request)
{
    $groups = Group::create($request->all());
    return redirect()->route('groups.index');
}

public function edit(Group $group)
{
    return view('groups.edit', compact('group'));
}

public function update(Request $request, Group $group)
{
    $group->update($request->all());
    return redirect()->route('groups.index');
}

public function destroy(Group $group)
{
    $group->delete();
    return redirect()->route('groups.index');
}

public function createWiseAndNotWiseGroups()
{
    $wiseGroup = Group::create([
        'name' => 'Wise People',
        'description' => 'A group for wise and intelligent individuals'
    ]);

    $notWiseGroup = Group::create([
        'name' => 'Not Wise People',
        'description' => 'A group for, well, not so wise individuals'
    ]);

    return redirect()->route('groups.index');
}
}
