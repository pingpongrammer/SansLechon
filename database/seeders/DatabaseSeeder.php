<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Letchon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'karlita',
            'email' => 'karlcabalquinto07@gmail.com',
            'username' => 'karl.admin',
            'password' =>Hash::make('kar.853'),
            'phone_number' => '09776162392',
            'adminType'=>'admin',
         ]);

         User::create([
            'name' => 'Jessan',
            'email' => 'cabalquintojessan03@gmail.com',
            'username' => 'jessan.admin',
            'password' =>Hash::make('jess.853'),
            'phone_number' => '09776162392',
            'adminType'=>'admin',
         ]);
         
         Letchon::create([
            'kls' => '16-20kls',
            'prices' => '8500.00',
         ]);
         Letchon::create([
            'kls' => '21-25kls',
            'prices' => '9500.00',
         ]);
         Letchon::create([
            'kls' => '26-30kls',
            'prices' => '10500.00',
         ]);
         Letchon::create([
            'kls' => '31-35kls',
            'prices' => '11500.00',
         ]);
         Letchon::create([
            'kls' => '36-40kls',
            'prices' => '12500.00',
         ]);
         
    }
}
