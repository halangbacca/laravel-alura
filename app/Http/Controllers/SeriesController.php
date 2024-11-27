<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        // Eloquent
        // $series = Serie::query()->orderBy('nome')->get();

        $series = DB::select('SELECT * FROM series ORDER BY nome');
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('series.index')->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $nome = $request->input('nome');

        // Eloquent
        // $serie = new Serie();
        // $serie->nome = $nome;
        // $serie->save();
        // return to_route('series.index');

        // Mass Assignment
        // Serie::create(request()->all());
        // Serie::create(request()->only(['nome']));
        // Serie::create(request()->except(['_token']));
        // return to_route('series.index');

        // Query Builder
        if (DB::insert('INSERT INTO series (nome) VALUES (?)', [$nome])) {
            $request->session()->flash('mensagem.sucesso', "Série {$nome} inserida com sucesso");
            return to_route('series.index');
        } else {
            return "Erro ao criar série $nome";
        }
    }

    public function destroy(Request $request)
    {
        // Serie::destroy($request->id);
        // return to_route('series.index');

        // $serie = Serie::find($request->id);
        $serie = DB::select('SELECT * FROM series WHERE id = (?)', bindings: [$request->id]);

        DB::delete("DELETE FROM series WHERE id = (?)", [$request->id]);

        $request->session()->flash('mensagem.sucesso', "Série {$serie[0]->nome} removida com sucesso");

        return to_route('series.index');
    }

    public function edit(Request $request, Serie $serie)
    {
        $series = DB::select('SELECT * FROM series WHERE id = (?)', bindings: [$request->id]);

        // $serie = Serie::find($request->id);
        // dd($serie->seasons());

        return view('series.edit')->with("series", $series);
    }

    public function update(SeriesFormRequest $request)
    {
        $nome = $request->nome;
        $id = $request->id;

        DB::update('UPDATE series SET nome = ? WHERE id = ?', [$nome, $id]);

        $request->session()->flash('mensagem.sucesso', "Série {$nome} atualizada com sucesso");

        return to_route('series.index');
    }
}
