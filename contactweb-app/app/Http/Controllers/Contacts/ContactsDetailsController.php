<?php

namespace App\Http\Controllers\Contacts;

use App\Models\Contacts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactsDetailsController extends Controller
{
    public function index($id)
    {
        $dados = Contacts::where('id',$id)->first()->toArray();
        return view('contacts/details', compact('dados'));
    }
}
