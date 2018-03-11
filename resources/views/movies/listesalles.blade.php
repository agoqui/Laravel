@extends('../layout')

{{-- liste des films --}}

@section('title')
	@if (isset($name))
		@include('header', ['name' => $name])
	@endif
@endsection

@section('header')
	Liste des salles
@endsection

@section('footer')
	@if (isset($count))
		@include('footer', ['foot' => 'nez', 'count' => $count])
	@endif		
@endsection

@section('content')

	<table id="movies" border="2" style="margin : auto;">
		@each('Movies.salle', $rooms, 'room', 'Movies.noSalle')
	</table>
@endsection