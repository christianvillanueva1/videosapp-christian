<?php

namespace App\Helpers;

use App\Models\User;
use App\Models\Video;
use Carbon\Carbon;


class DefaultVideoHelper
{


    public static function createDefaultVideo(array $overrides = []){

        $defaultUserId = User::first()->id ?? User::factory()->create()->id;


        $defaultData = [
            'title' => 'Life Could Be A Dream',
            'description' => 'This is a default video',
            'url' => 'https://www.youtube.com/embed/XfqOB4hvxlY?si=ZkjDzfKBsfqh6An7',
            'published_at' => Carbon::now()->toDateTimeString(),
            'previous' => null,
            'next' => null,
            'series_id' => 1,
            'user_id' => $defaultUserId
        ];

        $data = array_merge($defaultData, $overrides);

        return Video::create($data);
    }
    public static function createDefaultVideo2(array $overrides = []){

        $defaultUserId = User::first()->id ?? User::factory()->create()->id;


        $defaultData = [
            'title' => 'Top 5 Monkey',
            'description' => 'This is a default video 2',
            'url' => 'https://www.youtube.com/embed/SPAw3KmyeQ8?si=0ChJ4TIPpFgJbrXx',
            'published_at' => Carbon::now()->toDateTimeString(),
            'previous' => null,
            'next' => null,
            'series_id' => 1,
            'user_id' => $defaultUserId
        ];

        $data = array_merge($defaultData, $overrides);

        return Video::create($data);
    }
    public static function createDefaultVideo3(array $overrides = []){

        $defaultUserId = User::first()->id ?? User::factory()->create()->id;


        $defaultData = [
            'title' => 'C.R.O - Tony Montana (LETRA)',
            'description' => 'This is a default video 3',
            'url' => 'https://www.youtube.com/embed/TGqSWFJDWXM?si=CWJ22qcqYq3sWyKf',
            'published_at' => Carbon::now()->toDateTimeString(),
            'previous' => null,
            'next' => null,
            'series_id' => 1,
            'user_id' => $defaultUserId
        ];

        $data = array_merge($defaultData, $overrides);

        return Video::create($data);
    }

}
