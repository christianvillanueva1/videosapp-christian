<?php

namespace App\Http\Controllers;

use App\Helpers\DefaultVideoHelper;
use App\Models\Video;
use Illuminate\Support\Facades\Gate;
use Tests\Unit\VideosTest;



class VideosController extends Controller
{
    public function testedBy(){
        return VideosTest::class;
    }

    public function show($id){
        $video = Video::find($id);

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
}
