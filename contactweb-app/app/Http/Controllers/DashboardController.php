<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $contacts = Contacts::all();
        $mensagemSucesso = session('contacts.msg');
        $mensagemDelete = session('delete.msg');
        return view('dashboard', compact('contacts','mensagemSucesso','mensagemDelete'));
    }

}
