<x-layout title="Nova Série">

    <form action="{{route('series.store')}}" method="post">
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" name="nome" id="nome" class="form-control" autofocus
                       value="{{old('nome')}}">
            </div>

            <div class="col-2">
                <label for="seasonsQty" class="form-label">Nº de temporadas:</label>
                <input type="text" name="seasonsQty" id="seasonsQty" class="form-control"
                       value="{{old('seasonsQty')}}">
            </div>

            <div class="col-2">
                <label for="episodesQty" class="form-label">Nº de episódios:</label>
                <input type="text" name="episodesQty" id="episodesQty" class="form-control"
                       value="{{old('episodesQty')}}">
            </div>
        </div>
        <button class="btn btn-primary">Adicionar</button>
    </form>

</x-layout>
