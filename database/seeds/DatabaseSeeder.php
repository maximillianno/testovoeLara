<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(AuthorSeeder::class);
        User::create([
            'name' => 'maxus',
            'email' => 'maxus.star@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        factory(App\Author::class, 10)->create()->each(function ($u) {
            $u->magazines()->save(factory(App\Magazine::class)->make());
        });
    }
}
