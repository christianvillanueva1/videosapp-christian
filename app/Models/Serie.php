<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Models\Video;
use Tests\Unit\SerieTest;

class Serie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'user_name',
        'user_photo_url',
        'published_at',
    ];

    public function videos()
    {
        return $this->hasMany(Video::class, 'series_id');  // Canviar 'serie_id' per 'series_id'
    }
    public function testedBy()
    {
        return SerieTest::class;
    }
    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at->format('d/m/Y H:i');
    }
    public function getFormattedForHumansCreatedAtAttribute()
    {
        return $this->created_at->diffForHumans();
    }
    public function getCreatedAtTimestampAttribute()
    {
        return $this->created_at->timestamp;
    }
}
