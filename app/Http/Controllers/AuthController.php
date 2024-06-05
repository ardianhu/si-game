<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect('/game');
        }
        return view('auth.login');
    }
    public function showRegisterForm()
    {
        return view('auth.register');
    }
    public function login(Request $request)
    {
        $email      = $request->input('email');
        $password   = $request->input('password');

        if (auth()->attempt(['email' => $email, 'password' => $password])) {
            return response()->json([
                'success' => true,
                'message' => 'Login Berhasil!'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Login Gagal!'
            ], 401);
        }
    }
    public function register(Request $request)
    {
        // Validate the user's input
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users', // Unique email validation
        //     'password' => 'required', // Adjust validation rules as needed
        // ]);
        // dd($request->all());

        // Create a new user with the provided data
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash the password
        ]);

        // $password = $request->input('password');

        // dd($password);
        // You can also manually log in the user here if desired

        // Return a JSON response
        return response()->json([
            'success' => true,
            'message' => 'Register Berhasil!'
        ], 200);
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
