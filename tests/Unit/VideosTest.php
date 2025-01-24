<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Video; // Asegúrate de tener un modelo Video

class VideosTest extends TestCase
{
    public function test_can_get_formatted_published_at_date()
    {
        $video = new Video();
        $video->published_at = '2025-01-20 14:00:00';

        $formattedDate = $video->getFormattedPublishedAtDate();

        $this->assertEquals('20/01/2025 14:00', $formattedDate);
    }
    public function test_can_get_formatted_published_at_date_when_not_published()
    {
        $video = new Video();
        $video->published_at = null;

        $formattedDate = $video->getFormattedPublishedAtDate();

        $this->assertEquals('No publicada', $formattedDate);
    }
}
