<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
       //register : membuat akun bagi user
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

     
        $hashedPassword = bcrypt($validatedData['password']);

      
        $user = new User([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $hashedPassword,
        ]);

        $user->save();

        
        return response()->json(['message' => 'User berhasil dibuat'], 201);
    }
}
