@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="ml-1">Usted eligió la pelicula {{$movie->title}}</h3>

        <div class="detalle mt-4">
            @if($movie->genre)
                <h5 class="card-header">Género</h5>
                <h5 class="ml-4 mt-3">{{$movie->genre->name}}</h5>
            @endif
        </div>
        <div class="detalle mt-4">
            <h5 class="card-header">Awards</h5>
            <h5 class="ml-4 mt-3">{{$movie->awards}}</h5>
        </div>
        <div class="detalle mt-4">
            <h5 class="card-header">Rating</h5>
            <h5 class="ml-4 mt-3">{{$movie->rating}}</h5>
        </div>
        <div class="detalle mt-4">
            <h5 class="card-header">Fecha de estreno</h5>
            <h5 class="ml-4 mt-3">{{$movie->releaseDate()}}</h5>
        </div>
        <div class="detalle mt-4">
            <h5 class="card-header">Actores</h5>
            <ul class="list-group list-group-flush">
                @forelse($movie->actors as $actor)
                    <li class="list-group-item">{{$actor->getFullName()}}</li>
                @empty
                    <li class="list-group-item">No hay actores</li>
                @endforelse
            </ul>
        </div>
            @if(Auth::user()->isAdmin > 0)
            <form class="d-inline-block mt-3" action="/deleteMovie" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$movie->id}}">
                <input class="btn btn-danger" type="submit" name="" value="Borrar">
            </form>
            <a href="{{url('editMovie/'.$movie->id)}}"><button type="button" class="btn btn-dark d-inline-block">Editar</button></a>
            @endif
    </div>
@endsection
