<?php

namespace App\Console\Commands;

use DateTime;
use Illuminate\Console\Command;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class SeedderData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:seeders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = new DateTime();
        $dateString = $date->format('Y-m-d H:i:s');
        for ($i = 0; $i < 10; $i++) {
            DB::table('admin')->insert([
                'user_name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'password' => Hash::make('password'),
            ]);
            DB::table('equipments')->insert([
                'code' => Str::random(6),
                'imported_date' => $dateString,
                'producer' => Str::random(10),
                'image' => Str::random(100),
                'notes' => Str::random(100),
                'category_id' => rand(1, 100),
                'price' => rand(10, 100),
                'name' => Str::random(100)
            ]);
            DB::table('categories')->insert([
                'name' => Str::random(100),
                'quantity' => rand(1, 100),
                'notes' => Str::random(100),
            ]);
            DB::table('employees')->insert([
                'code' => Str::random(6),
                'join_date' => $dateString,
                'name' => Str::random(100),
                'email' => Str::random(10) . '@gmail.com',
                'department_id' => rand(1, 10),
                'is_manager' => rand(1, 10),
                'address' => Str::random(100),
                'phone_number' => rand(10000000, 1000000000),
                'password' => Hash::make('password'),
            ]);
            DB::table('departments')->insert([
                'name' => Str::random(100),
                'slug' => Str::random(100),
                'quantity' => rand(1, 100),

            ]);
            DB::table('repairs')->insert([
                'equipment_id' => rand(1, 10),
                'employee_id' => rand(1, 10),
                'details' => Str::random(100),
                'notes' => Str::random(100),
                'place' => Str::random(100),
                'price' => rand(1, 100),
                'start_date' => $dateString,
                'end_date' => $dateString,
                'status' => rand(1, 5),
            ]);
            DB::table('liquidation')->insert([
                'equipment_id' => rand(1, 10),
                'employee_id' => rand(1, 10),
                'details' => Str::random(100),
                'notes' => Str::random(100),
                'place' => Str::random(100),
                'price' => rand(1, 100),
            ]);
            DB::table('equipment_status')->insert([
                'equipment_id' => rand(1, 10),
                'type' => rand(1, 10),
                'status' => rand(1, 5),
            ]);
            DB::table('request')->insert([
                'equipment_id' => rand(1, 10),
                'employee_id' => rand(1, 10),
                'details' => Str::random(100),
                'notes' => Str::random(100),
                'type' => rand(1, 5),
                'status' => rand(1, 100),
            ]);
            DB::table('equipment_status_log')->insert([
                'equipment_id' => rand(1, 10),
                'employee_id' => rand(1, 10),
                'status' => rand(1, 100),
                'type' => rand(1, 5),
            ]);
        }

        return 0;
    }
}
