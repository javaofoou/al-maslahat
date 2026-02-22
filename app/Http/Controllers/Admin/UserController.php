<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Show all users
    public function dashboard()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    // Delete a user
    public function destroy(User $user)
    {
        if ($user->id !== auth()->id()) { // prevent deleting self
            $user->delete();
            return redirect()->route('admin.users.dashboard')->with('success', 'User removed successfully!');
        }
        return redirect()->back()->with('error', 'Cannot remove yourself!');
    }
}
