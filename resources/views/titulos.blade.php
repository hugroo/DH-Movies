@extends('layouts.app')

@section('content')
    @if (session('alert'))
        <div class="alert alert-success w-75 mx-auto">
            {{ session('alert') }}
        </div>
    @endif
    <div class="row mx-auto mb-3">
        <form class="col-12 mb-3 mx-auto col-sm-10 col-md-8 col-xl-6">
            <div class="input-group">
                <input type="text" class="form-control" name="search"
                       placeholder="Buscar"> <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                      <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                    </svg>
                </button>
            </span>
            </div>
        </form>
            @if(Auth::user()->isAdmin > 0)
                <div class="bd-highlight col-12 text-center">
                    <a href="{{url('/addMovie')}}" class="btn btn-info mb-2 mr-3" role="button">Agregar Pelicula</a>
                </div>
            @endif
    </div>
    @if($search)
        <div class="alert alert-primary w-50 mx-auto" role="alert">
            Los resultados para tu búsqueda '{{$search}}' son:
        </div>
    @endif
    <div class="container-fluid titulos">
        <div class="list-group">
            @forelse($movies as $movie)
                <a href="{{ url('detail/'.$movie->id) }}" class="list-group-item list-group-item-action">
                    {{$movie->title}}
                    @if($movie->genre)
                        <span class="badge bg-dark ml-2">{{$movie->genre->name}}</span>
                    @endif
                </a>
            @empty
                <h3>
                   No se encontraron peliculas!
                </h3>
            @endforelse
        </div>
        <div>{{$movies->links()}}</div>
    </div>
@endsection
