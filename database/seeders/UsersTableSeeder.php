<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(config('admin.admin_name')) {
            $adminRole = Role::create(['name'=>'admin']);

            $admin = User::firstOrCreate(
                ['email' => config('admin.admin_email')], [
                    'name' => config('admin.admin_name'),
                    'password' => bcrypt(config('admin.admin_password')),
                    'user_type'=>'admin',
                    'email_verified_at'=>NOW(),

                ]
            );

            $admin->roles()->attach($adminRole);
            
            /*$admin = User::create([
                'name'=>'admin',
                'user_type'=>'admin',
                'email'=>'hello@outplacementheros.org',
                'email_verified_at'=>NOW(),
                'password'=>bcrypt('2020hired')
                
            ]);*/
    
            
        }
    }
}
