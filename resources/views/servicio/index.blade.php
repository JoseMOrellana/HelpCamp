@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row">



@foreach ($servicio as $service)


<div class="col-md-4 p-5">
<div class="card" style="width: 18rem;">
        <img class="card-img-top" src="img/{{$service->imagen}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$service->name}}</h5>
          <p class="card-text">{{$service->descripcion}}</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Disponibilidad:  {{$service->fechai}}</li>
          <li class="list-group-item">Culminacion:  {{$service->fechac}}</li>
          <li class="list-group-item">Precio:  {{$service->precio}}$</li>
        </ul>
        <div class="card-body text-center">
          <a href="servicio/{{$service->slug}}" class="btn btn-success">Ver mas</a>
        </div>
      </div>
    </div>




@endforeach
    </div>

</div>

@endsection

