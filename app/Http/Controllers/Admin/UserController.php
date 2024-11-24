<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->listUsers();
        return view('admin.user-management', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:t_users',
            'password' => 'required|confirmed|min:6',
            'role' => 'required|in:admin,user',
        ]);

        $this->userService->storeUser($request->all());

        return redirect()->route('user-management.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:t_users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:6',
            'role' => 'required|in:admin,customer',
        ]);

        $this->userService->updateUser($user, $request->all());

        return redirect()->route('user-management.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        $this->userService->deleteUser($user);

        return redirect()->route('user-management.index')->with('success', 'User berhasil dihapus.');
    }
}
