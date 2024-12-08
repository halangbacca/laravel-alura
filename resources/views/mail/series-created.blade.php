@component('mail::message')

# A série {{$nomeSerie }} foi criada com sucesso!

A série possui {{$temporadas}} temporadas e {{$episodios}} episodios.

Acesse aqui:

@component('mail::button', ['url' => route('seasons.index', $idSerie)])
    Acessar
@endcomponent

@endcomponent
