<?php

namespace App\Http\Controllers;

use App\Events\VideoCreated;
use App\Models\Serie;
use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Support\Facades\Event;
use Tests\Feature\Videos\VideosManageControllerTest;

class VideosManageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!auth()->user()->can('manage-videos')) {
            abort(403, 'Unauthorized');
        }
        $videos = Video::all();

        return view('videos.manage.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->can('manage-videos')) {
            abort(403, 'Unauthorized');
        }

        $series = Serie::all();
        return view('videos.manage.create', compact('series'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('manage-videos')) {
            abort(403, 'Unauthorized');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'url' => 'required|string|url',
            'published_at' => 'required|date',
            'previous' => 'nullable|string',
            'next' => 'nullable|string',
            'series_id' => 'nullable|integer|exists:series,id', // si tienes una tabla de series
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

        return redirect()->route('videos.manage.index')->with('success', 'Video created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!auth()->user()->can('manage-videos')) {
            abort(403, 'Unauthorized');
        }

        $video = Video::find($id);

        if(!$video){
            return response()->json([
                'message' => 'Video not found'
            ], 404);
        }

        return view('videos.manage.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!auth()->user()->can('manage-videos')) {
            abort(403, 'Unauthorized');
        }

        $video = Video::find($id);

        if(!$video){
            return response()->json([
                'message' => 'Video not found'
            ], 404);
        }

        $series = Serie::all();


        return view('videos.manage.edit', compact('video', 'series'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (!auth()->user()->can('manage-videos')) {
            abort(403, 'Unauthorized');
        }

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
            'series_id' => 'nullable|integer|exists:series,id', // si tienes una tabla de series
        ]);

        $video->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'url' => $validated['url'],
            'published_at' => $validated['published_at'],
            'previous' => $validated['previous'],
            'next' => $validated['next'],
            'series_id' => $validated['series_id'],
        ]);

        return redirect()->route('videos.manage.index')->with('success', 'Video updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!auth()->user()->can('manage-videos')) {
            abort(403, 'Unauthorized');
        }

        $video = Video::find($id);

        if(!$video){
            return response()->json([
                'message' => 'Video not found'
            ], 404);
        }

        $video->delete();

        return redirect()->route('videos.manage.index')->with('success', 'Video deleted successfully');
    }

    /**
     * Return the name of the test class.
     */
    public function testedBy()
    {
        return VideosManageControllerTest::class;
    }
}
