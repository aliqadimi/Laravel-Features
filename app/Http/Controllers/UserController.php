<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
		$data = User::all();
        dd($data);
		// return view('users.index')->with('data', $data);
	}

	public function show($id){
		$data = User::findOrFail($id);
        dd($data);
		// return view('users.show')->with('data', $data);
	}
}
