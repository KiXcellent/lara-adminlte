<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserProfileController extends Controller
{
    /**
     * Show user's profile
     */
    public function index()
    {
        return view('users.show', [
            'user' => auth()->user()
        ]);
    }

    /**
     * Edit user's profile
     */
    public function edit()
    {
        $user = auth()->user();
        return view('users.edit', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->whereKeyNot(1)->get()
        ]);
    }

}
