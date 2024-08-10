<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect('/');
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
                'message' => 'Login success!'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Login failed!'
            ], 401);
        }
    }
    public function register(Request $request)
    {
        // Define validation rules
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'required',
                'string',
                'min:8', // Minimum length of 8 characters
                'regex:/[a-z]/', // Must contain at least one lowercase letter
                'regex:/[A-Z]/', // Must contain at least one uppercase letter
                'regex:/[0-9]/', // Must contain at least one digit
            ],
        ];

        // Define custom error messages
        $messages = [
            'password.min' => 'Password must be at least 8 characters long.',
            'password.regex' => 'Password must contain at least one number, uppercase, and lowercase letter.',
            'email.unique' => 'The email address is already registered.',
            'required' => ':attribute is required.'
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash the password
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Register Success! please login'
        ], 200);
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
