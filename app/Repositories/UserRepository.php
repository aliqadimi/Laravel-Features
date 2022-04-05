<?php namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
	public function getAll(){
		return User::all();
	}

	public function getUser($id){
		return User::findOrFail($id);
	}

	// more

}
