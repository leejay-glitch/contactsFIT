<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Group;
use App\Exports\ContactsExport;
use Maatwebsite\Excel\Facades\Excel;

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

    public function search(Request $request)
    {
    $search = $request->input('search');
    $contacts = Contact::where('name', 'like', "%$search%")
                       ->orWhere('email', 'like', "%$search%")
                       ->get();
    
    return view('contacts', compact('contacts'));
    }


    public function export()
    {
        return Excel::download(new ContactsExport, 'contacts.xlsx');
    }

         public function removeFromGroup($contactId, $groupId)
    {
        $contact = Contact::findOrFail($contactId);
        $contact->groups()->detach($groupId);

        return redirect()->route('groups.index')->with('success', 'Contact removed from group successfully.');
    }
    
}
