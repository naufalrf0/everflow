<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Models\User;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function listUsers()
    {
        return $this->userRepository->getAllUsers();
    }

    public function storeUser(array $data)
    {
        return $this->userRepository->createUser($data);
    }

    public function updateUser(User $user, array $data)
    {
        return $this->userRepository->updateUser($user, $data);
    }

    public function deleteUser(User $user)
    {
        return $this->userRepository->deleteUser($user);
    }
}
