@extends('../layout');

@section('title')
    @isset($movie)
    Modifier un film
    @endisset
    @empty($movie)
    Ajouter un film
    @endempty
@endsection

@section('content')
    <a href="{{route('movieslisting')}}">Retour à la liste des films</a>

    <br>

@foreach($errors->all() as $key => $error)
    {{ $key }} {{ $error }} <br/>
@endforeach

   {!! Form::open(['route' => 'adminvalid']) !!}
   {!! Form::token() !!}
   <!-- ajout du crscf -->
   {{ csrf_field() }}
   <!-- fin crsf -->

   @isset($movie)
   {!! Form::hidden('id', $movie->id) !!}
   @endisset

   {!! Form::label('title', 'Entrer le titre ', ['class' => 'awesome']) !!}
   {!! Form::text('title', isset($movie) ? $movie->title : '') !!}
    @if($errors->any())
        @if($errors->has('title'))
            @foreach($errors->get('title') as $key => $error)
                <span class="text-danger {{ $key }}"> {{ $error }} </span><br/>
            @endforeach
        @endif
    @endif
<br>

   {!! Form::label('author', 'Auteur (Prénom Nom) ') !!}
   {!! Form::text('author', isset($movie) ? $movie->author['firstname'] . ' ' . $movie->author['lastname'] : '') !!}
    <br>
    @if($errors->any())
        @if($errors->has('author'))
            @foreach($errors->get('author') as $key => $error)
                <span class="text-danger {{$key}}"> {{ $error }} </span><br/>
            @endforeach
        @endif
    @endif

   {!! Form::label('year', 'Année de parution ') !!}
   {!! Form::text('year', isset($movie) ? $movie->year : '') !!}
    <br>

   {!! Form::label('desc', 'Description ') !!}
   {!! Form::textarea('desc',  isset($movie) ? $movie->desc : '') !!}
    <br>

	<strong><u>Informations sur la salle</u></strong><br />
	@foreach($rooms->getFillable() as $value)
		{!! Form::label('room['.$value.']', $value) !!}
		{!! Form::text('room['.$value.']', isset($movie->room) ? $movie->room[$value] : '') !!}
		<br />
	@endforeach

   {!! Form::submit('Envoyer') !!}
   {!! Form::close() !!}
@endsection

