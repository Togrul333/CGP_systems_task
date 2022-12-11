<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Client;
use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::factory(10)->create();
        $clients = Client::factory(10)->create();

        foreach ($companies as $company){
            $clientsIds = $clients->random(3)->pluck('id');
            $company->clients()->attach($clientsIds);
        }

        DB::table('users')->insert([
           'name'=>'admin',
           'role'=>\App\Models\User::ADMIN,
           'email'=>'admin@gmail.cpm',
           'password'=>bcrypt('12345678'),
        ]);

        DB::table('users')->insert([
            'name'=>'user',
            'role'=>\App\Models\User::USER,
            'email'=>'user@gmail.cpm',
            'password'=>bcrypt('12345678'),
        ]);

    }
}
