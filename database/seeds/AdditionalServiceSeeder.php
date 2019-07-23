<?php

use Illuminate\Database\Seeder;
use App\AdditionalService;

class AdditionalServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AdditionalService::class, 10)->create();
    }
}
