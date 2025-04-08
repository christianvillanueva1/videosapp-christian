<?php

namespace App\Helpers;

use App\Models\Serie;
use Carbon\Carbon;

class SeriesHelper
{
    public static function createDefaultSerie1()
    {
        return Serie::create([
            'title' => 'Serie1',
            'description' => 'Descripcio Serie1',
            'image' => null,
            'user_name' => 'Admin',
            'user_photo_url' => null,
            'published_at' => Carbon::now()->subDays(rand(0, 10)),
        ]);
    }
    public static function createDefaultSerie2()
    {
        return Serie::create([
            'title' => 'Serie2',
            'description' => 'Descripcio Serie2',
            'image' => null,
            'user_name' => 'Admin',
            'user_photo_url' => null,
            'published_at' => Carbon::now()->subDays(rand(0, 10)),
        ]);
    }
    public static function createDefaultSerie3()
    {
        return Serie::create([
            'title' => 'Serie3',
            'description' => 'Descripcio Serie3',
            'image' => null,
            'user_name' => 'Admin',
            'user_photo_url' => null,
            'published_at' => Carbon::now()->subDays(rand(0, 10)),
        ]);
    }
}
