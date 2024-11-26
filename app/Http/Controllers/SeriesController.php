<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use DB;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {

        // Eloquent
        // $series = Serie::query()->orderBy('nome')->get();

        $series = DB::select('SELECT nome FROM series ORDER BY nome');
        return view('series.index')->with('series', $series);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $nome = $request->input('nome');

        // Eloquent
        // $serie = new Serie();
        // $serie->nome = $nome;
        // $serie->save();
        // return redirect('/series');

        // Query Builder
        if (DB::insert('INSERT INTO series (nome) VALUES (?)', [$nome])) {
            return redirect('/series');
        } else {
            return "Erro ao criar série $nome";
        }
    }
}
