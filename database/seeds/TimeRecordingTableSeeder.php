<?php


use Illuminate\Database\Seeder;

class TimeRecordingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\TimeRecording::class, 1)->create();
    }
}
