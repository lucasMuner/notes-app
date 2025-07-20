<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        $request->validate(
            [
                'username' => ['required','email'],
                'password' => ['required','min:6','max:16']
            ],
            [
                'username.required' => 'O email é obrigatório!',
                'username.email' => 'Email inválido!',
                'password.required' => 'A senha é obrigatória!',
                'password.min' => 'A senha não pode ter menos de :min caractéres!',
                'password.max' => 'A senha não pode ter mais de :max caractéres!'
            ]
        );

        $username = $request->input('username');
        $password = $request->input('password');

        try {
            DB::connection()->getPdo();
            echo "Connection OK!";
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function logout()
    {
        echo 'Logout';
    }
}
