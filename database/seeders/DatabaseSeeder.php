<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        //adminDashBoard.blade.php
        \App\Models\User::factory()->create([

            'name' => 'Admin',
            'email' => 'admin@brocali.com',
            'password' => Hash::make('password')

        ]);
//        \App\Models\User::factory()->create([
//
//            'name' => 'Faris',
//            'email' => 'f@gmail.com',
//            'password' => Hash::make('password')
//
//        ]);
//
//
//        //company
//        Employee::create([
//            'firstName' => 'Faris',
//            'lastName' => 'Abufarha',
//            'companyID' => 1,
//            'email' => 'f@gmail.com',
//            'password' => Hash::make('password'),
//            'phone' => '1234567890',
//            'userID' => 2
//
//            ]);
//        Company::create([
//            'name' => 'Brocali',
//            'email' => 'b@brocali.co',
//            'logo' => 'logo',
//            'websiteLink' => 'brocali.co',
//        ]);
//
//
//        Company::factory(20)->create();
//        //employee
//        Employee::factory(20)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
