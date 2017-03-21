<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->truncate();

        DB::transaction(function (){
            Role::create([
                'name'=>'admin',
                'display_name'=>'Администратор',
                'description'=>'',
            ]);

            Role::create([
                'name'=>'user',
                'display_name'=>'Пользователь',
                'description'=>'',
            ]);
        });
    }
}
