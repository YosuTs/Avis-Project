<?php

use Illuminate\Database\Seeder;
use App\Reservation;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Reservation::class, 10)->create();
    }
}
