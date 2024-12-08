<?php

namespace App\Http\Controllers;

use App\Contracts\SeriesRepositoryInterface;
use App\Events\SeriesCreated;
use App\Http\Middleware\Authenticator;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepositoryInterface $repository)
    {
        $this->middleware(Authenticator::class)->except('index');
    }

    public function index(Request $request)
    {
        $series = Series::all();
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
        $cover = $request->file('cover');
        if ($cover) {
            $coverPath = $cover->store('series_cover', 'public');
            $request->coverPath = $coverPath;
        }

        $series = $this->repository->add($request);
        $seriesCreatedEvent = new SeriesCreated(
            $series->name, $request->seasonsQty, $request->episodesQty, $series->id);

        event($seriesCreatedEvent);

        $request->session()->flash('mensagem.sucesso', "Série {$series->name} criada com sucesso");
        return to_route('series.index');
    }

    public function destroy(Request $request)
    {
        $series = Series::find($request->id);
        Series::destroy($request->id);
        $request->session()->flash('mensagem.sucesso', "Série {$series->name} removida com sucesso");
        return to_route('series.index');
    }

    public function edit(Request $request)
    {
        $series = Series::find($request->id);
        return view('series.edit')->with("series", $series);
    }

    public function update(SeriesFormRequest $request)
    {
        $serie = Series::find($request->id);
        $serie->nome = $request->name;
        $serie->save();
        $request->session()->flash('mensagem.sucesso', "Série {$serie->name} atualizada com sucesso");
        return to_route('series.index');
    }
}
