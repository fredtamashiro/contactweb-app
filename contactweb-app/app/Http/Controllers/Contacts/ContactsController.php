<?php

namespace App\Http\Controllers\Contacts;

use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
    public function create()
    {
        $dados = ['name'=>'','contact'=>'','email'=>''];
        return view('contacts.create',compact('dados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'contact' => 'required|max:9',
            'email' => [
                'required',
                'email',
                Rule::unique('contacts', 'email'),
            ],
        ], [
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O e-mail informado não é válido.',
            'email.unique' => 'O e-mail já está cadastrado.',
        ]);

        // Converte o e-mail para letras minúsculas
        $validatedData = $request->all();
        $validatedData['email'] = strtolower($request->email);

        Contacts::create($validatedData);
        return redirect()
        ->route('dashboard')
        ->with('contacts.msg', 'Contato:  "' . $request->name . '" cadastrado!');
    }

    public function show($id)
    {
        $contact = Contacts::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    public function edit($id)
    {
        $dados = Contacts::findOrFail($id);
        // dd($dados);
        return view('contacts.edit', compact('dados'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'contact' => 'required|max:9',
            'email' => [
                'required',
                'email',
                Rule::unique('contacts', 'email'),
            ],
        ], [
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'O e-mail informado não é válido.',
            'email.unique' => 'O e-mail já está cadastrado.',
        ]);

        // Converte o e-mail para letras minúsculas
        $validatedData = $request->all();
        $validatedData['email'] = strtolower($request->email);

        $contact = Contacts::findOrFail($id);
        $contact->update($validatedData);
        return redirect()->route('dashboard');
    }

    public function destroy($id)
    {
        $contact = Contacts::findOrFail($id);
        $contact->delete();  // Soft delete
        //
        return redirect()
        ->route('dashboard')
        ->with('delete.msg', 'Contato:  "' . $contact->name . '" apagado!');
    }
}
