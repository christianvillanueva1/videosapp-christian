<?php

namespace App\Helpers;

use App\Models\Video;
use Carbon\Carbon;


class DefaultVideoHelper
{
    public static function createDefaultVideo(array $overrides = []){
        $defaultData = [
            'title' => 'Default Video',
            'description' => 'This is a default video',
            'url' => 'https://www.youtube.com/watch?v=gsLvizl5j4E&ab_channel=Mattye',
            'published_at' => Carbon::now()->toDateTimeString(),
            'previous' => null,
            'next' => null,
            'series_id' => 1
        ];

        $data = array_merge($defaultData, $overrides);

        return Video::create($data);
    }

}
