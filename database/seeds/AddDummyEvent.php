<?php

use Illuminate\Database\Seeder;
use App\Event;

class AddDummyEvent extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	['title'=>'Rom Event', 'start_date'=>'2018-01-30', 'end_date'=>'2018-02-2'],
        	['title'=>'Coyala Event', 'start_date'=>'2018-02-11', 'end_date'=>'2018-02-15'],
        	['title'=>'Lara Event', 'start_date'=>'2017-05-16', 'end_date'=>'2017-05-22'],
        ];
        foreach ($data as $key => $value) {
        	Event::create($value);
        }
    }
}
