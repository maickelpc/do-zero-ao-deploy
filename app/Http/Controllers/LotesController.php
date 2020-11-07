<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lote;

class LotesController extends Controller
{
    

    public function edit($id){

        $lote = Lote::findOrFail($id);

        return view('lotes.leilao')->with('lote', $lote);

    }


}
