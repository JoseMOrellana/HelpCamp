@extends('layouts.app')

@section('Title','Mas Informacion')
@section('content')



<div class="container">
    <div class="row">

<div class="col-md-2">

    </div>
    <div class="col-md-8">
        <div class="card mb-3" style="max-width: 900px;">
            <div class="row no-gutters">
              <div class="col-md-6">
                <img src="../img/{{$servicio->imagen}}" class="card-img" alt="...">
              </div>
              <div class="col-md-6">
                <div class="card-body">
                  <h5 class="card-title">{{$servicio->name}}</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Disponibilidad:  {{$servicio->fechai}}</li>
                    <li class="list-group-item">Culminacion:  {{$servicio->fechac}}</li>
                    <li class="list-group-item">Precio:  {{$servicio->precio}}$</li>
                    <li class="list-group-item"></li>
                  </ul>
                  <div class="row text-center">
                    <input type="button" value="Reservar" class="btn btn-success btn-block">
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
    <div class="col-md-2"></div>





    </div>
</div>

@endsection
