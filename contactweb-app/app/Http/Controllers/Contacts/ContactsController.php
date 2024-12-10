<?php

namespace App\Http\Controllers\Contacts;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contacts::all();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'contact' => 'required|max:9',
            'email' => 'required|email|unique:contacts,email',
        ]);

        Contacts::create($request->all());
        return redirect()->route('contacts.index');
    }

    public function show($id)
    {
        $contact = Contacts::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    public function edit($id)
    {
        $contact = Contacts::findOrFail($id);
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'contact' => 'required|max:9',
            'email' => 'required|email|unique:contacts,email,' . $id,
        ]);

        $contact = Contacts::findOrFail($id);
        $contact->update($request->all());
        return redirect()->route('contacts.index');
    }

    public function destroy($id)
    {
        $contact = Contacts::findOrFail($id);
        $contact->delete();  // Soft delete
        return redirect()->route('contacts.index');
    }
}
