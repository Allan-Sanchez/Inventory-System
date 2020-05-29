<?php

use App\State;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(State::class,10)->create();
        DB::table('states')->insert([
            'state'=>'sold',
            'description'=> 'Lorem ipsum dolor, sit amet consectetur adipisicing',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('states')->insert([
            'state'=>'break',
            'description'=> 'Lorem ipsum dolor, sit amet consectetur adipisicing',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('states')->insert([
            'state'=>'use',
            'description'=> 'Lorem ipsum dolor, sit amet consectetur adipisicing',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
