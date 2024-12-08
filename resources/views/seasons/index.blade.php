<x-layout title="Temporadas de {{$series->name}}">
    @if($series->cover_path)
        <div class="d-flex justify-content-center mb-2">
            <img src="{{asset('storage/' . $series->cover_path)}}"
                 alt="{{$series->name}}"
                 class="img-fluid"
                 style="height: 300px">
        </div>
    @endif
    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{route('episodes.index', $season->id)}}">
                    Temporada: {{$season->number}}
                </a>
                <span class="badge bg-secondary">
                    {{$season->numberOfWatchedEpisodes()}} / {{$season->episodes->count()}}
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>
