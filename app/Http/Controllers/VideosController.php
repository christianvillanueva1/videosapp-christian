<?php

namespace App\Http\Controllers;

use App\Events\VideoCreated;
use App\Helpers\DefaultVideoHelper;
use App\Models\Serie;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Tests\Unit\VideosTest;



class VideosController extends Controller
{
    public function testedBy(){
        return VideosTest::class;
    }

    public function show($id){
        $video = Video::find($id)::with(['serie', 'user'])->first();

        if(!$video){
            return response()->json([
                'message' => 'Video not found'
            ], 404);
        }

        return view('videos.show', compact('video'));
    }



    public function index()
    {
        $videos = Video::all();

        return view('videos.index', compact('videos'));
    }

    public function create()
    {
        $series = Serie::all();
        return view('videos.create', compact('series'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'url' => 'required|string|url',
            'published_at' => 'required|date',
            'previous' => 'nullable|string',
            'next' => 'nullable|string',
            'series_id' => 'nullable|integer|exists:series,id',
        ]);

        $video = Video::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'url' => $validated['url'],
            'published_at' => $validated['published_at'],
            'previous' => $validated['previous'],
            'next' => $validated['next'],
            'series_id' => $validated['series_id'],
            'user_id' => auth()->id(),
        ]);

        Event::dispatch(new VideoCreated($video));

        return redirect()->route('videos.index')->with('success', 'Video creat correctament');
    }

    public function edit($id)
    {
        $video = Video::find($id);
        $series = Serie::all();

        if(!$video){
            return response()->json([
                'message' => 'Video not found'
            ], 404);
        }

        return view('videos.edit', compact('video', 'series'));
    }

    public function update(Request $request, $id)
    {
        $video = Video::find($id);

        if(!$video){
            return response()->json([
                'message' => 'Video not found'
            ], 404);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'url' => 'required|string|url',
            'published_at' => 'required|date',
            'previous' => 'nullable|string',
            'next' => 'nullable|string',
            'series_id' => 'nullable|integer|exists:series,id',
        ]);

        $video->update($validated);

        return redirect()->route('videos.index')->with('success', 'Video actualitzat correctament');
    }

    public function destroy($id)
    {
        $video = Video::find($id);

        if(!$video){
            return response()->json([
                'message' => 'Video not found'
            ], 404);
        }

        $video->delete();

        return redirect()->route('videos.index')->with('success', 'Video eliminat correctament');
    }
}
