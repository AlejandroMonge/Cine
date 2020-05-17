@extends('layouts.tema')

@section('content')
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.rating-box h1{
	margin:0 0 30px;
	font-size: 40px;
}
.rating-box .ratings .fa{
  font-size: 40px;
  color:#FF9800;
  float: left;
  cursor: pointer;
}

</style>



<div class="container">
    {{-- {!! Form::open([route('pelicula.store')]) !!} --}}
    <div class="row">
        <div class="col-sm-5">

            <img src="{{$pelicula->imagen_url}}" alt="" width="392" height="580">
        </div>
        <div class="col-sm-6">
            <div class="card">
                <h1>{{ $pelicula->nombre_pelicula}}</h1>
                <p>{{$pelicula->informacion_basica}}</p>
                <p class="my-4">
                    {{$pelicula->sinopsis}}
                </p>
                <div class="row">
                    <div class="col-sm-5">
                        <h3 class="rating-num"> {{$pelicula->puntaje}} <i style='font-size:24px' class="fas fa-star"></i></h3>
                    </div>
                    <div class="col-sm-5">
                        <i style='font-size:24px' class='fas fa-child'></i> {{$pelicula->cantidad_votos}} total
                    </div>
                </div>
            </div>
            <div class="card my-4">
                <iframe width="500" height="280" src="{{$pelicula->url_trailer}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="rating-box">
             @isset($comentarios)
                {{-- <h3>Comentarios: {{count($comentarios)}}</h3> --}}
                @foreach ($comentarios as $comentario)
                    <h4>{{$comentario->puntaje}}</h4>
                    <p>{{$comentario->comentario}}</p>
                    {{-- <p>by {{ \App\User::where('id', $comentario->id_usuario)->name }}</p> --}}
                    <p> {{$comentario->created_at}} </p>
                @endforeach
            @endisset

            <h3>Opinar</h3>
              <div class="ratings">
                 <span class="fa fa-star-o"></span>
                 <span class="fa fa-star-o"></span>
                 <span class="fa fa-star-o"></span>
                 <span class="fa fa-star-o"></span>
                 <span class="fa fa-star-o"></span>
                </div>
              <input type="number" id="rating-value">
        </div>
        {!! Form::textarea("reseña", null, ['rows' => '5', 'class' => 'form-control', 'placeholder' => '¿Que te parecio la pelicula?']) !!}
    </div>
    <button type="submit" class="btn btn-warning">Enviar comentario</button>
    {{-- {!! Form::close() !!} --}}
</div>
@endsection
