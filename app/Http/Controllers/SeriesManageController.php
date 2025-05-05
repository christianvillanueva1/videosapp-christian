<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Models\Video;
use Illuminate\Http\Request;
use Tests\Feature\Series\SeriesManageControllerTest;

class SeriesManageController extends Controller
{
    public function testedBy()
    {
        return SeriesManageControllerTest::class;
    }

    public function index()
    {
        $series = Serie::latest()->get();
        return view('series.manage.index', compact('series'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'user_name' => 'nullable|string|max:255',  // No cal que sigui obligatori
            'user_photo_url' => 'nullable|string',
            'published_at' => 'nullable|date',
        ]);

        $request->merge([
            'user_name' => auth()->user()->name,
            'user_photo_url' => auth()->user()->profile_photo_url,
            'published_at' => now(),
        ]);

        Serie::create($request->all());

        return redirect()->route('series.manage.index')->with('success', 'Sèrie creada correctament.');
    }

    public function edit(Serie $serie)
    {
        return view('series.manage.edit', compact('serie'));
    }

    public function update(Request $request, Serie $serie)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'user_name' => 'nullable|string',
            'user_photo_url' => 'nullable|string',
            'published_at' => 'nullable|date',
        ]);

        $request->merge([
            'user_name' => auth()->user()->name,
            'user_photo_url' => auth()->user()->profile_photo_url,
        ]);

        $serie->update($request->all());

        return redirect()->route('series.manage.index')->with('success', 'Sèrie actualitzada correctament.');
    }

    public function delete(Serie $serie)
    {
        Video::where('series_id', $serie->id)->delete();

        $serie->delete();
        return redirect()->route('series.manage.index')->with('success', 'Sèrie eliminada correctament.');
    }

    public function destroy($id)
    {
        $serie = Serie::find($id);

        if (!$serie) {
            return response()->json(['message' => 'Serie not found'], 404);
        }
        Video::where('series_id', $serie->id)->delete();

        $serie->delete();

        return redirect()->route('series.manage.index')->with('success', 'Sèrie eliminada permanentment.');
    }

    public function create()
    {
        return view('series.manage.create');
    }
}
