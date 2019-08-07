<?php

use Illuminate\Database\Seeder;
use App\Email;
class EmailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Email::truncate();

        $faker = \Faker\Factory::create();

        $recv = [];
        for($i=1; $i <= rand(1, 10); $i++){
            $recv[] =  $faker->freeEmail;
        }
        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 50; $i++) {
            Email::create([
                'email_title' => $faker->sentence,
                'email_body' => $faker->paragraph,
                'email_receiver' => json_encode($recv),
                'email_state'=> $faker->numberBetween(0,2),
                'email_service'=> $faker->numberBetween(0,1)
            ]);
        }
    }
}
