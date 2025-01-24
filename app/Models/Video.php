<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    protected $fillable = [
        'title',
        'description',
        'url',
        'published_at',
        'previous',
        'next',
        'series_id',
    ];

    function getFormattedPublishedAtAttibute(){
        return Carbon::parse($this->published_at)->format('d m Y');
    }

    function getFormattedForHumansPublishedAtAttribute(){
        return Carbon::parse($this->published_at)->diffForHumans();
    }

    function getPublishedAtTimestampAttribute(){
        return Carbon::parse($this->published_at)->timestamp;
    }

    public function getFormattedPublishedAtDate()
    {
        if ($this->published_at) {
            return date('d/m/Y H:i', strtotime($this->published_at));
        }
        return 'No publicada';
    }
}
