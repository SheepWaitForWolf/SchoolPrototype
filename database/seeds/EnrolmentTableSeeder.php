<?php

use Illuminate\Database\Seeder;

class EnrolmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Enrolment::class, 50)->create();
    }
}
