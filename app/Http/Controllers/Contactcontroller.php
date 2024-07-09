<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Group;

class ContactController extends Controller
{
    public function create()
    {
        return view('create-contact');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'location' => 'required|max:255',
            'instagram' => 'nullable|url'
        ]);

        Contact::create($validatedData);

        return redirect()->route('contacts.index')->with('success', 'Contact saved successfully!');
    }

    public function index()
    {
        $contacts = Contact::all();
        return view('contacts', compact('contacts'));
    }

    public function edit($id)
    {
    
        $contact = Contact::find($id);
        // dd($contact->getAttributes());
        return view('edit', compact('contact'));
    }
  
    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
    
        if ($contact) {
            $contact->name = $request->input('name');
            $contact->email = $request->input('email');
            $contact->location = $request->input('location');
            $contact->instagram = $request->input('instagram');
    
            $contact->save();
    
            return redirect()->route('contacts.index')->with('success', 'Contact updated successfully!');
        } else {
            return redirect()->route('contacts.index')->with('error', 'Contact not found!');
        }
    }

    public function destroy($id)
    {
        $contact = contact::find($id);
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }

    // public function assignToWiseGroup(Contact $contact)
    // {
    //     $wiseGroup = Group::where('name', 'Wise People')->firstOrFail();
    //     $contact->groups()->syncWithoutDetaching($wiseGroup);

    //     return redirect()->route('groups.index')->with('success', 'Contact assigned to Wise People group successfully.');
    // }

    // public function assignToNotWiseGroup(Contact $contact)
    // {
    //     $notWiseGroup = Group::where('name', 'Not Wise People')->firstOrFail();
    //     $contact->groups()->syncWithoutDetaching($notWiseGroup);

    //     return redirect()->route('groups.index')->with('success', 'Contact assigned to Not Wise People group successfully.');
    // }

    public function removeFromWiseGroup(Contact $contact)
    {
        $wiseGroup = Group::where('name', 'Wise People')->firstOrFail();
        $contact->groups()->detach($wiseGroup);

        return redirect()->route('groups.index')->with('success', 'Contact removed from Wise People group successfully.');
    }

    public function removeFromNotWiseGroup(Contact $contact)
    {
        $notWiseGroup = Group::where('name', 'Not Wise People')->firstOrFail();
        $contact->groups()->detach($notWiseGroup);

        return redirect()->route('groups.index')->with('success', 'Contact removed from Not Wise People group successfully.');
    }

    public function assignToGroupForm()
    {
        $contacts = Contact::all();
        $groups = Group::all();

        return view('assigngroup', compact('contacts', 'groups'));
    }

    public function AssignToGroup(Request $request)
{   
    dd('Assign to group method called');
    \Log::info('Received request', $request->all());

    try {
        $validatedData = $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'group_id' => 'required|exists:groups,id',
        ]);

        $contact = Contact::findOrFail($validatedData['contact_id']);
        $group = Group::findOrFail($validatedData['group_id']);

        dump($contact, $group);

        $contact->groups()->syncWithoutDetaching([$group->id]);

        \Log::info('Contact assigned to group successfully.');

        return redirect()->route('groups.index')->with('success', 'Contact assigned to group successfully.');
    } catch (\Exception $e) {
        \Log::error('Error assigning contact to group:', [$e->getMessage(), $e->getTrace()]);
        return redirect()->back()->with('error', 'Error assigning contact to group.');
    }
}

    
}
