@extends('layouts.app')

@section('content')

    <div class="container-fluid main-img"></div>

    <div class="container mt-5" style="position: relative;">
        <h3>Las mejores experiencias, solo en HelpCamp...</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta laudantium explicabo vel illo ullam sed, aliquid excepturi quo ea rerum...</p>

        <a class="btn btn-success mb-4" style="position: absolute; top:0; right: 0;" href="./servicio">Ver más servicios</a>
    </div>

    <div class="container">
        <div class="row">
            <?php 
                $servicios = App\Servicio::all()->take(4);
             ?>
            <div class="col mr-2">
                <img src="./img/{{$servicios[0]->imagen}}" alt="" style="width: 100%; height: 160px">
                <h4 class="text-center">{{ $servicios[0]->name}}</h4>
                <span>${{ $servicios[0]->precio}}</span><br>
                <span>{{ $servicios[0]->fechai . '---' . $servicios[0]->fechac }}</span>
            </div>
            <div class="col mr-2">
                <img src="./img/{{$servicios[1]->imagen}}" alt="" style="width: 100%; height: 160px">
                <h4 class="text-center">{{ $servicios[1]->name}}</h4>
                <span>${{ $servicios[1]->precio}}</span><br>
                <span>{{ $servicios[1]->fechai . '---' . $servicios[1]->fechac }}</span>
            </div>        
            <div class="col mr-2">
                <img src="./img/{{$servicios[2]->imagen}}" alt="" style="width: 100%; height: 160px">
                <h4 class="text-center">{{ $servicios[2]->name}}</h4>
                <span>${{ $servicios[2]->precio}}</span><br>
                <span>{{ $servicios[2]->fechai . '---' . $servicios[2]->fechac }}</span>
            </div>         
            <div class="col mr-2">
                <img src="./img/{{$servicios[3]->imagen}}" alt="" style="width: 100%; height: 160px">
                <h4 class="text-center">{{ $servicios[3]->name}}</h4>
                <span>${{ $servicios[3]->precio}}</span><br>
                <span>{{ $servicios[3]->fechai . '---' . $servicios[3]->fechac }}</span>
            </div>         
        </div>
    </div>

@endsection