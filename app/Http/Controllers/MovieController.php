<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Support\Facades\Log;

class MovieController extends Controller
{
    public function index(){
        $movies = Movie::all();
        Log::debug($movies->count());
        return view('getMovie',['movies'=>$movies]);
    }
}