@extends('layouts.app')

@section('content')
    <div class="container-fluid add mt-2">
    <div class="card">
        <div class="card-header">
            Agregar pelicula
        </div>
        <div class="card-body">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
            <form class="row g-3" action="/addMovie" method="POST">
                {{csrf_field()}}
                <div class="col-12">
                    <label for="title" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old("title")}}">
                </div>
                <div class="col-12">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="text" class="form-control" id="rating" name="rating" value="{{old("rating")}}">
                </div>
                <div class="col-12">
                    <label for="awards" class="form-label">Awards</label>
                    <input type="text" class="form-control" id="awards" name="awards" value="{{old("awards")}}">
                </div>
                <div class="col-12">
                    <label for="release_date" class="form-label">Fecha de estreno</label>
                    <input type="date" class="form-control" id="release_date" name="release_date" value="{{old("release_date")}}">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
