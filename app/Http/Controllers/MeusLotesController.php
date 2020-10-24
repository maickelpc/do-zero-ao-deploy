<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeusLotesController extends Controller
{
    public function meusLotes(Request $request){


        return view('lotes.meus-lotes');
    }

    public function novoLote(Request $request){

        return view('lotes.novo-lote');

    }
}
