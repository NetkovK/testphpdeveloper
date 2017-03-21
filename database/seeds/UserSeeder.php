<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->truncate();

        DB::transaction(function (){

            $faker = Faker\Factory::create();

            User::create([
                'name' => $faker->name,
                'email' =>'admin@gmail.com',
                'password' => bcrypt('qweqwe'),
                'role_id' =>Role::ADMIN,
            ]);

            for($i=0; $i<20; $i++){
                User::create([
                    'name' => $faker->name,
                    'email' =>$faker->email,
                    'password' => bcrypt('qweqwe'),
                    'role_id' =>Role::USER,
                ]);
            }

        });
    }
}
