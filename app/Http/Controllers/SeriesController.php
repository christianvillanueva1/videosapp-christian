<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    // Llistar totes les sèries
    public function index()
    {
        $series = Serie::latest()->get();
        return view('series.index', compact('series'));
    }

    // Mostrar una sèrie concreta
    public function show($id)
    {

        $serie = Serie::findOrFail($id);
        $videos = $serie->videos;

        return view('series.show', compact('serie', 'videos'));
    }
}
