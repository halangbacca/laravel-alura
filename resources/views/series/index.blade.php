<x-layout title="Séries" :mensagem-sucesso="$mensagemSucesso">

    @auth
        <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>
    @endauth

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">

                @if($serie->cover_path)
                    <div class="d-flex justify-content-center mb-2">
                        <img src="{{asset('storage/' . $serie->cover_path)}}"
                             alt="{{$serie->name}}"
                             class="img-thumbnail"
                             style="width: 100px">
                    </div>
                @endif

                @auth
                    <a href="{{ route("seasons.index", $serie->id) }}">@endauth
                        {{$serie->name}}
                        @auth </a>
                @endauth

                @auth
                    <span class="d-flex">
                        <a href="{{ route('series.edit', $serie->id) }}"
                           class="btn btn-primary btn-sm d-flex justify-content-center align-items-center"
                           style="width: 40px; height: 40px;">E</a>
                        <form action="{{ route('series.destroy', $serie->id) }}" method="post" class="ms-2">
                        @csrf
                            @method('DELETE')
                        <button class="btn btn-danger btn-sm d-flex justify-content-center align-items-center"
                                style="width: 40px; height: 40px;">X</button>
                    </form>
                </span>
                @endauth

            </li>
        @endforeach
    </ul>
</x-layout>
