<x-layout title="Editar Série {{$series[0]->nome}}">
    <x-series.form :action="route('series.update', $series[0]->id)" :nome="$series[0]->nome" :update="true" />
</x-layout>