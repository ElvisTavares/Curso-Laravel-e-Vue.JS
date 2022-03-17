<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {

        $erro = '';
        if( $request->get('erro') == 1){
            $erro = 'Usuário ou senha não existe';
        }

        if( $request->get('erro') == 2){
            $erro = 'Nescessario ter login para acessar';
        }

        return view('site.login', ['titulo' => 'login', 'erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'usuario.email' => 'O campo usuario (e-amil) é obrigatório',
            'senha.required' => 'O campo senha é obrigatorio'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

//        echo "Usuario: $email | Senha: $password";
//        echo "<br>";

        $user = new User();

        $usuario = $user->where('email', $email)
            ->where('password', $password)
            ->get()
            ->first();

//        echo "<pre>";
//        print_r($existe);
//        echo "</pre>";
//        dd($usuario);

        if(isset($usuario->name)){
            session_start();
            $_SESSION['email'] = $usuario->email;
            $_SESSION['nome'] = $usuario->name;
            return redirect()->route('app.home');
        }else{
            return redirect()->route('site.login', ['erro' => 1]);
        }

    }

    public function sair()
    {
        echo 'sair';
    }
}
