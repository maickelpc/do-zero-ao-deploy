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

    public function mudaBloqueio(Request $request, $idusuario){

        $usuario = User::findOrFail($idusuario);

        $usuario->bloqueado = !$usuario->bloqueado;
        $usuario->save();

        return redirect()->route('usuarios.ver', $usuario->id);
        
    }


    public function ver(Request $request, $idusuario){
        
        $usuario = User::findOrFail($idusuario);

        return view('usuarios.ver')
            ->with('usuario', $usuario);


    }

    public function listar(Request $request){
        
        $usuariosQuery = User::where('created_at', '!=', null);

        if ($request->has('busca') && $request->get('busca') != ''){
            $usuariosQuery = $usuariosQuery->where(function($query) use($request){

                return $query->where('nome', 'ilike', "%{$request->get('busca') }%")
                ->orWhere('sobrenome', 'ilike', "%{$request->get('busca') }%")
                ->orWhere('email', 'ilike', "%{$request->get('busca') }%");
            });
        }
            
        
        if ( 
            $request->has('bloqueado') && 
            $request->get('bloqueado') != '' && 
            $request->get('bloqueado') != 'TODOS'){

                if($request->get('bloqueado') == 'BLOQUEADOS')
                    $usuariosQuery = $usuariosQuery->where('bloqueado', true);

                if($request->get('bloqueado') == 'DESBLOQUEADOS')
                    $usuariosQuery = $usuariosQuery->where('bloqueado', false);

        }

        
        $itensPorPagina = env('ITENS_POR_PAGINA', 20);
        $usuarios = $usuariosQuery->paginate( $itensPorPagina );

        return view('usuarios.listagem')
            ->with('usuarios', $usuarios);

        // ITENS_POR_PAGINA


    }


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
