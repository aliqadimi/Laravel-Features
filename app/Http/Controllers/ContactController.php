<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        // To see the result of the following code, use database seeder  and in the database
        // one filed in call table is must be same one filed of contacts table
        // $Contact = Contact::whereHas('call')->get();
        $Contact = Contact::whereHas('call', function ($query) {
            $query->where('std_number', 'like', '207');
        })->get();
        dd($Contact);

    }
}
