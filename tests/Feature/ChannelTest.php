<?php

namespace Tests\Feature;

use App\Models\Channel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChannelTest extends TestCase
{
    /**
     * Check the channel main route
     * @test
     * @return void
     */
    public function channelsListIsReturned(): void
    {
        $response = $this->get('/channels');

        $response->assertStatus(200);
    }

    /**
     * Check the channel timetable route
     * @test
     * @return void
     */
    public function channelTimetableListIsReturned(): void
    {
        $channel = Channel::first();
        $date = $channel->programmes->first()->timetables->first()->start_time->format('Y-m-d');
        $response = $this->get('/channels/' . $channel->id . '/' . $date . '/timezone/CET');

        $response->assertStatus(200);
    }

    /**
     * Check the channel programme route
     * @test
     * @return void
     */
    public function channelProgrammeIsReturned(): void
    {
        $channel = Channel::first();
        $response = $this->get('/channels/' . $channel->id . '/programmes/' . $channel->programmes->first()->id);

        $response->assertStatus(200);
    }
}
