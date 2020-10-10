<?php

namespace App\Http\Controllers;

use App\Mail\EnviarCodigoConfirmacao;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Mail;
use Str;
use Carbon\Carbon;

class UsuarioController extends Controller
{
    public function registrar(){
        return view('auth.register');
    }


    public function efetivarRegistro(Request $request){

        $validar = $request->validate([
            'nome' => 'required|max:100',
            'sobrenome' => 'required|max:100',
            'telefone' => 'required|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|max:20|same:password_confirmation'
        ]);

        $user = User::create($request->all());

        $this->enviarEmailConfirmacao($user->id);
        
        Auth::login($user);
    
        return redirect()->route('welcome');

    }

    


    public function enviarEmailConfirmacao(Request $request,$id = null){


        $usuario = User::find($id ?? Auth::user()->id);

        // Logica para criar um codigo
        $usuario->codigo_confirmacao = strtoupper( Str::random(6) );
        $usuario->save();

        // enviar email
        $retorno = Mail::send( new  EnviarCodigoConfirmacao($usuario));
        
        $request->session()->flash('success', 'Email de confirmação enviado com sucesso!');

        return redirect()->route('welcome');

    }

    public function confirmarEmail(Request $request, $codigo = null, $idusuario = null){
        
        $usuario;
        $codigoConfirmacao;
        if($codigo != null){
            $codigoConfirmacao = $codigo;
            $usuario = User::find($idusuario);
        }else{
            $usuario = Auth::user();
            $codigoConfirmacao = $request->get('codigo');
        }

        
        if($usuario->data_confirmacao != null || $usuario->codigo_confirmacao == $codigoConfirmacao){
            
            if($usuario->data_confirmacao == null){
                $usuario->data_confirmacao = Carbon::now();
                $usuario->save();
                
            }
            if(Auth::guest())
                Auth::login($usuario);
            return view('auth.tela_confirmacao')->with('usuario', $usuario)->with('confirmado', true);
        }

        return view('auth.tela_confirmacao')->with('usuario', $usuario)->with('confirmado', false);


    }

}
