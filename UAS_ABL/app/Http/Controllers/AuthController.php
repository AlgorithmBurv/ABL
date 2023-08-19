<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
   
    public function login(Request $request)  {
    //login : membuat api token bagi user yang sudah memiliki akun
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
           
    
        ]);
        
        $user = User::where('email', $request->email)->first();
    
        // dd($user);
    
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        return $user->createToken('user login')->plainTextToken;
       }
       public function logout(Request $request)  {
        //logout ; keluar dari dari akun dan menghapus token
        $request->user()->tokens()->delete();
       }
       public function me(Request $request)  {
        //me : untuk mengetahui user yang sedang login
            return response()->json(Auth::user());
       }
   
}
