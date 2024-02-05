<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function loginForm()
    {
        return view("auth.login");
    }
    public function login(Request $request)
    {   
        $formFields=$request->validate([
            'login'=>"required",
            'password'=>"required",
        ]);

        $credentials = [
            "login" => $formFields['login'],
            'password' => $formFields['password'],
        ];
    
        if (Auth::attempt($credentials)) {
            return redirect()->route('product.index')->with('message', 'You logged in successfully');
        } else {
            return redirect()->back()->withErrors(['login' => 'Invalid login credentials']);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function logout()
    {
        Auth::logout(); 
        return redirect()->route('user.loginForm')->with('message', 'You have been logged out successfully');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
