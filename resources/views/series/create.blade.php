<x-layout title="Nova Série">

    <form action="{{route('series.store')}}" method="post">
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <label for="name" class="form-label">Nome:</label>
                <input type="text" name="name" id="name" class="form-control" autofocus
                       value="{{old('name')}}">
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
