<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Schema;
//use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Role::truncate();

        $this->call(UsersTableSeeder::class);
        $this->command->info('The admin data has been seeded!');
        Role::create(['name'=>'seeker']);  //Job Seeker
        Role::create(['name'=>'employer']); //Hiring employer            
        Role::create(['name'=>'volunteer']);  //Volunteer
        

        $this->command->info('All other roles have been seeded!');

        Schema::enableForeignKeyConstraints();
       

    }
}
