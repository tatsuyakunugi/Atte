<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'id' => 1,
            'stamp_id' => 1,
            'restIn' => '2024-05-10 11:00:00',
            'restOut' => '2024-05-10 12:00:00',
            'restTime' => 3600.00,
            'created_at' => '2024-05-10 11:00:00',
            'updated_at' => '2024-05-10 12:00:00'
        ];
        DB::table('rests')->insert($param);
        $param = [
            'id' => 2,
            'stamp_id' => 2,
            'restIn' => '2024-05-10 13:00:00',
            'restOut' => '2024-05-10 14:00:00',
            'restTime' => 3600.00,
            'created_at' => '2024-05-10 13:00:00',
            'updated_at' => '2024-05-10 14:00:00'
        ];
        DB::table('rests')->insert($param);
        $param = [
            'id' => 3,
            'stamp_id' => 3,
            'restIn' => '2024-05-10 09:00:00',
            'restOut' => '2024-05-10 09:30:00',
            'restTime' => 1800.00,
            'created_at' => '2024-05-10 09:00:00',
            'updated_at' => '2024-05-10 09:30:00'
        ];
        DB::table('rests')->insert($param);
        $param = [
            'id' => 4,
            'stamp_id' => 4,
            'restIn' => '2024-05-10 12:00:00',
            'restOut' => '2024-05-10 12:30:00',
            'restTime' => 1800.00,
            'created_at' => '2024-05-10 12:00:00',
            'updated_at' => '2024-05-10 12:30:00'
        ];
        DB::table('rests')->insert($param);
        $param = [
            'id' => 5,
            'stamp_id' => 5,
            'restIn' => '2024-05-10 15:00:00',
            'restOut' => '2024-05-10 15:30:00',
            'restTime' => 1800.00,
            'created_at' => '2024-05-10 15:00:00',
            'updated_at' => '2024-05-10 15:30:00'
        ];
        DB::table('rests')->insert($param);
        $param = [
            'id' => 6,
            'stamp_id' => 6,
            'restIn' => '2024-05-10 17:00:00',
            'restOut' => '2024-05-10 18:15:00',
            'restTime' => 4500.00,
            'created_at' => '2024-05-10 17:00:00',
            'updated_at' => '2024-05-10 18:15:00'
        ];
        DB::table('rests')->insert($param);
        $param = [
            'id' => 7,
            'stamp_id' => 7,
            'restIn' => '2024-05-10 17:00:00',
            'restOut' => '2024-05-10 18:00:00',
            'restTime' => 1800.00,
            'created_at' => '2024-05-10 17:00:00',
            'updated_at' => '2024-05-10 18:00:00'
        ];
        DB::table('rests')->insert($param);
        $param = [
            'id' => 8,
            'stamp_id' => 8,
            'restIn' => '2024-05-10 15:00:00',
            'restOut' => '2024-05-10 15:15:00',
            'restTime' => 900.00,
            'created_at' => '2024-05-10 15:00:00',
            'updated_at' => '2024-05-10 15:30:00'
        ];
        DB::table('rests')->insert($param);
        $param = [
            'id' => 9,
            'stamp_id' => 10,
            'restIn' => '2024-05-11 00:30:00',
            'restOut' => '2024-05-11 01:00:00',
            'restTime' => 1800.00,
            'created_at' => '2024-05-11 00:30:00',
            'updated_at' => '2024-05-11 01:00:00'
        ];
        DB::table('rests')->insert($param);
        $param = [
            'id' => 10,
            'stamp_id' => 10,
            'restIn' => '2024-05-11 05:30:00',
            'restOut' => '2024-05-11 06:00:00',
            'restTime' => 1800.00,
            'created_at' => '2024-05-11 05:30:00',
            'updated_at' => '2024-05-11 06:00:00'
        ];
        DB::table('rests')->insert($param);
    }
}
