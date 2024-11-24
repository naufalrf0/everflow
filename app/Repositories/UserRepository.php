<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function getAllUsers()
    {
        return User::all();
    }

    public function createUser(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        return User::create($data);
    }

    public function updateUser(User $user, array $data)
    {
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $user->update($data);
        return $user;
    }

    public function deleteUser(User $user)
    {
        return $user->delete();
    }
}
