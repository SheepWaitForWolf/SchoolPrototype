<?php

use Illuminate\Database\Seeder;
use App;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Enrolment::class, 50)->create()->each(function($u) {
        $u->posts()->save(factory(App\Post::class)->make());
        });
    }
}
