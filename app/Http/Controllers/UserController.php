<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user-management', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:t_users,email',
            'password' => 'required|string|min:6|confirmed',
            'role'     => 'required|in:admin,customer', // Sesuaikan dengan role yang Anda miliki
        ]);

        User::create($request->all());

        return redirect()->route('user-management.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:t_users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'role'     => 'required|in:admin,customer',
        ]);

        $data = $request->all();
        if (empty($data['password'])) {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('user-management.index')->with('success', 'User berhasil diubah.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        // Pastikan Anda tidak menghapus user yang sedang login
        if ($user->id == Auth::id()) {
            return redirect()->route('user-management.index')->with('error', 'Anda tidak dapat menghapus diri sendiri.');
        }
        $user->delete();

        return redirect()->route('user-management.index')->with('success', 'User berhasil dihapus.');
    }
}
