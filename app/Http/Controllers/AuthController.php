<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        $user = User::where('username', $username)
            ->where('deleted_at', NULL)
            ->first();

        // check if username is valid
        if(!$user){
            return redirect()
                    ->back()
                    ->withInput()
                    ->with('loginError', 'Usuário ou senha incorretos!');
        }

        // check if password is correct
        if(!password_verify($password, $user->password)){
            return redirect()
                    ->back()
                    ->withInput()
                    ->with('loginError', 'Usuário ou senha incorretos!');
        }

        //update last login
        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        //login user
        session([
            'user' => [
                'id' => $user->id,
                'username' => $user->username
            ]
        ]);

        return redirect()->to('/');
    }

    public function logout()
    {
        //logout from the application
        session()->forget('user');
        return redirect()->to('/login');
    }
}
