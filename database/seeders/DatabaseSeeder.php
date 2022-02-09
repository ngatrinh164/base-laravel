<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('equipments')->insert([
            code => Str::random(6),
            imported_date => new Date(),
            producer => Str::random(10),
            image => Str::random(100),
            notes => Str::random(100),
            category_id => Math . rand(100),
            price => Math . rand(100),
            name => Str::random(100)
        ]);
        DB::table('categories')->insert([
            name => Str::random(100),
            quantity => Math . rand(100),
            notes => Str::random(100),
        ]);
        DB::table('employees')->insert([
            code => Str::random(6),
            join_date => new Date(),
            name => Str::random(100),
            'email' => Str::random(10) . '@gmail.com',
            department_id => Math . rand(100),
            is_manager => Math . rand(100),
            address => Str::random(100),
            phone_number => Math . rand(10),
            'password' => Hash::make('password'),
        ]);
        DB::table('departments')->insert([
            name => Str::random(100),
            slug => Str::random(100),
            quantity => Math . rand(100),

        ]);
        DB::table('repairs')->insert([
            equipment_id => Math . rand(10),
            employee_id => Math . rand(10),
            details => Str::random(100),
            notes => Str::random(100),
            place => Str::random(100),
            price => Math . rand(100),
            start_date => new Date(),
            end_date => new Date(),
            status => Math . rand(5),
        ]);
        DB::table('liquidation')->insert([
            equipment_id => Math . rand(10),
            employee_id => Math . rand(10),
            details => Str::random(100),
            notes => Str::random(100),
            place => Str::random(100),
            price => Math . rand(100),
        ]);
        DB::table('equipment_status')->insert([
            equipment_id => Math . rand(10),
            type => Math . rand(10),
            status => Math . rand(5),
        ]);
        DB::table('request')->insert([
            equipment_id => Math . rand(10),
            employee_id => Math . rand(10),
            details => Str::random(100),
            notes => Str::random(100),
            type => Math . rand(5),
            status => Math . rand(100),
        ]);
        DB::table('equipment_status_log')->insert([
            equipment_id => Math . rand(10),
            employee_id => Math . rand(10),
            status => Math . rand(100),
            type => Math . rand(5),
        ]);
    }
}
