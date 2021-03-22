<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy(column: 'nome')->get();
        $mensagem = $request->session()->get(key: 'mensagem');
        $request->session()->remove("mensagem");
        return view("Series.index", compact("series", "mensagem"));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nome' => 'required|min:2'
        ]);
        $serie = Serie::create($request->all());
        $request->session()->flash(
            'mensagem',
            "Série criada com sucesso: {$serie->nome}"
        );

        return redirect('/series');
    }

    public function destroy (Request $request)
    {
        Serie::destroy($request->id);
        $request->session()
        ->flash(
            'mensagem',
            "Série removida com sucesso"
            );
    
        return redirect(to: '/series');
    
    }
}
