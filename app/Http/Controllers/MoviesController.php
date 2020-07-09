<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;
use App\Movie;

class MoviesController extends Controller
{
    public function home(){
        $randomMovies = Movie::all()->random(5);
        $recentMovies = Movie::orderBy('created_at','desc')->take(5)->get();

        $vac = compact("randomMovies","recentMovies");
        return view("home", $vac);
    }

    public function movies(Request $request){

        if($request){
            $query = trim($request->get('search'));
            $movies = Movie::where('title','LIKE','%' . $query . '%')->orderBy('id','asc')->paginate(12);
            return view('titulos', ['movies' => $movies, 'search' => $query]);
        }

        $movies = Movie::paginate(12);

        $vac = compact("movies");

        return view("titulos", $vac);
    }

    public function detail($id){
        $movie = Movie::find($id);

        $vac = compact("movie");

        return view("detail",$vac);
    }

    public function addMovie(Request $req){
        $messages = [
            "string" => "El campo :attribute debe ser un texto",
            "min" => "El campo :attribute tiene un mínimo de :min",
            "max" => "El campo :attribute tiene un máximo de :max",
            "date" => "El campo Fecha de estreno debe ser una fecha",
            "numeric" => "El campo :attribute debe ser un número",
            "integer" => "El campo :attribute debe ser un número",
            "unique" => "El campo :attribute se encuentra repetido"
        ];
        $rules = [
            "title" => "string|min:3|unique:movies,title",
            "awards" => "integer|min:0",
            "release_date" => "date",
            "rating" =>"numeric|min:0|max:10"
        ];
        $this->validate($req,$rules,$messages);

        $newMovie = new Movie();
        $newMovie->title = $req["title"];
        $newMovie->rating = $req["rating"];
        $newMovie->awards = $req["awards"];
        $newMovie->release_date = $req["release_date"];

        $newMovie->save();


        return redirect("/titulos")->with('alert', 'Agregado correctamente!');
    }

    public function deleteMovie(Request $req){
        $id = $req["id"];
        $movie = Movie::find($id);
        $movie->delete();
        return redirect("/titulos")->with('alert', 'Borrado correctamente!');
    }

    public function listMoviesAPI(){
        $movies = Movie::all();
        return json_encode($movies);
    }

    public function editMovie($id){
        return view('editMovie',['movie' => Movie::findOrFail($id)]);
    }

    public function update(Request $req,$id){
        $messages = [
            "string" => "El campo :attribute debe ser un texto",
            "min" => "El campo :attribute tiene un mínimo de :min",
            "max" => "El campo :attribute tiene un máximo de :max",
            "date" => "El campo Fecha de estreno debe ser una fecha",
            "numeric" => "El campo :attribute debe ser un número",
            "integer" => "El campo :attribute debe ser un número",
            "unique" => "El campo :attribute se encuentra repetido"
        ];
        $rules = [
            "title" => "string|min:3,title",
            "awards" => "integer|min:0",
            "release_date" => "date",
            "rating" =>"numeric|min:0|max:10"
        ];
        $this->validate($req,$rules,$messages);

        $movie = Movie::findOrFail($id);

        $movie->title = $req["title"];
        $movie->rating = $req["rating"];
        $movie->awards = $req["awards"];
        $movie->release_date = $req["release_date"];

        $movie->update();


        return redirect("/titulos")->with('alert', 'Modificado correctamente!');
    }
}
