@extends('layouts.app')

@section('content')
	<div class="container" style="padding-top: 100px">
		<h2 class="text-center">Mis reservaciones</h2>

		<?php $misReservaciones = DB::table('pdfs')->where('user_id',Auth::user()->id)->get(); ?>

		@foreach($misReservaciones as $reservacion)
			<a href="./ServicioPDF/{{$reservacion->ruta}}" class="text-center">{{ $reservacion->ruta }}</a><br>
		@endforeach
	</div>
@endsection