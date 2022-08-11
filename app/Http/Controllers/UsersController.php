<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{
    // registro
    public function create() {
        return view('registro.registro');
    }
    public function store(Request $request) {

        $emailVerificado = User::where('email', $request->email)->get();
        if(isset($emailVerificado)){
            return redirect('/registro')->with('danger', 'email já existe');
        }else{
        $senha = \Hash::make($request->senha);
        $user = new User;
        $user->name = $request->nome;
        $user->email = $request->email;
        $user->password = $senha;
        $user->save();

        return redirect('/');
        }
    }
    // login
    public function login(){
        return view('login.login');
    }
    public function auth(Request $request){
        $credenciais = $request->only('email', 'password');

        $this->validate($request, [
            'email' => 'required',
            'senha' => 'required'
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->senha])){
            $id = auth::user()->id;
            $usuario = User::findOrFail($id);
            return redirect('/');
        }else{
            return redirect('/login')->with('danger', 'E-mail ou senha invalida');
        }
    }
    // logout
    public function logout(Request $request)
    {
        auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
