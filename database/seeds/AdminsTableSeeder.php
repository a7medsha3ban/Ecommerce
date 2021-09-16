<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([ ['name'=>'admin', 'type'=>'admin', 'mobile'=>'01158665252', 'email'=>'admin@gmail.com', 'password'=>Hash::make('12345'), 'image'=>'', 'status'=>'1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=>'john', 'type'=>'subadmin', 'mobile'=>'01158665252', 'email'=>'john@gmail.com', 'password'=>Hash::make('12345'), 'image'=>'', 'status'=>'1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=>'steve', 'type'=>'subadmin', 'mobile'=>'01158665252', 'email'=>'steve@gmail.com', 'password'=>Hash::make('12345'), 'image'=>'', 'status'=>'1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=>'amit', 'type'=>'admin', 'mobile'=>'01158665252', 'email'=>'amit@gmail.com', 'password'=>Hash::make('12345'), 'image'=>'', 'status'=>'1', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
        ]);
    }
}
