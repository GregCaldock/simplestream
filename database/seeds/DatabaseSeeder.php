<?php

use App\Models\Channel;
use App\Models\Programme;
use App\Models\Timetable;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        factory(Channel::class, 10)
            ->create()
            ->each(static function (Channel $channel) {
                factory(Programme::class, 50)
                    ->create(['channel_id' => $channel->id])
                    ->each(static function(Programme $programme) {
                        $programme->timetables()->save(factory(Timetable::class)->make());
                    });
            });
    }
}
