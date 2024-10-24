<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController
{

    public function register(Request $request)
    {
        
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'suffix' => 'nullable|string|max:10',
            'age' => 'required|integer',
            'birthday' => 'required|date',
            'address' => 'required|string|max:255',
        ]);

    
        User::create($validatedData);

        return redirect()->back()->with('success', 'User registered successfully!');
    }
    protected function Authdata(String $Email, String $Password)
    {
        return $this->authResponse($Email, $Password, ['message' => 'Authentication successful', 'user' => $this->getUser($Email)]);
    }

    protected function RoleType(String $Email, String $Password)
    {
        return $this->authResponse($Email, $Password, ['role' => $this->getUser($Email)->role]);
    }

    private function getUser($Email)
    {
        return User::where('email', $Email)->first();
    }

    private function authResponse($Email, $Password, $successResponse)
    {
        $user = $this->getUser($Email);
        return $user && Hash::check($Password, $user->password) ? 
            response()->json($successResponse, 200) : 
            response()->json(['error' => 'Invalid credentials'], 401);
    }
}
