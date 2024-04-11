<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{   
    public function index()
    {
        if (Gate::allows('viewAny', User::class)) {
            $users = User::where('id', '!=', Auth::id())->get();
            return view('users.index', compact('users'));
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
