@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container-fluid">
            <h3>Ultimas peliculas agregadas</h3>
                <ul class="list-group list-group-horizontal mt-3 ml-2 row">
                    @foreach($recentMovies as $recentMovie)
                        <div class="col-auto p-0">
                            <a href="{{ url('detail/'.$recentMovie->id) }}" class="list-group-item list-group-item-action">{{$recentMovie->title}}</a>
                        </div>
                    @endforeach
                </ul>
            <br>
            <h3>Peliculas Random</h3>
            <ul class="list-group list-group-horizontal mt-3 ml-2 row">
                @foreach($randomMovies as $randomMovie)
                    <div class="col-auto p-0">
                        <a href="{{ url('detail/'.$randomMovie->id) }}" class="list-group-item list-group-item-action h-100">{{$randomMovie->title}}</a>
                    </div>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
