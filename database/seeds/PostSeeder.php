<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->truncate();

        DB::transaction(function (){
            $faker = Faker\Factory::create();
            $users = User::where('role_id', Role::USER)->get();

            foreach ($users as $user) {
                $max = rand(1, 15);

                for($i=0; $i<$max; $i++){
                    Post::create([
                        'user_id'=>$user->id,
                        'title'=>$faker->text(50),
                        'content'=>$faker->text(3000),
                        'published'=>rand(0,1),
                    ]);
                }
            }
        });
    }
}
