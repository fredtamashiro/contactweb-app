<?php

namespace App\Http\Controllers;

use App\Models\Contacts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index()
    {
        $contacts = Contacts::all();
        return view('welcome', compact('contacts'));
    }
}
