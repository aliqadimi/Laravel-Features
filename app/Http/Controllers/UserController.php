<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //old
    // public function index(){
	// 	$data = User::all();
    //     dd($data);
	// 	// return view('users.index')->with('data', $data);
	// }

	// public function show($id){
	// 	$data = User::findOrFail($id);
    //     dd($data);
	// 	// return view('users.show')->with('data', $data);
	// }

    //new
    private $repository;

	public function __construct(UserRepositoryInterface $repository)
	{
	   $this->repository = $repository;
	}

	public function index(){
		$data = $this->repository->getAll();
        dd($data);
		// return view('users.index')->with('data', $data);
	}

	public function show($id){
		$data = $this->repository->getUser($id);
        dd($data);
		// return view('users.show')->with('data', $data);
	}
}
