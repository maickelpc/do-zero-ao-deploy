<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CriarLoteRequest;
use App\Lote;
use Auth;

class MeusLotesController extends Controller
{
    public function meusLotes(Request $request){


        return view('lotes.meus-lotes');
    }

    public function novoLote(Request $request){

        return view('lotes.novo-lote');
    }

    public function criarLote(CriarLoteRequest $request){

        $dados = $request->all();
        $dados['proprietario_id'] = Auth::user()->id;
        $dados['categoria_id'] = 1;
        $lote = Lote::create($dados);

        return response()->json($lote, 201);
    }


    public function meusLotesApi(Request $request){
        
        $query = Lote::where('proprietario_id', Auth::user()->id);

        if($request->has('texto'))
            $query = $query->where('titulo', 'ilike', "%{$request->get('texto')}%");

        $dados = $query->paginate(4);
        return response()->json($dados, 200);
    }


}
