<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StampsTableSeeder extends Seeder
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
            'user_id' => 1,
            'punchIn' => '2024-05-10 07:00:00',
            'punchOut' => '2024-05-10 14:00:00',
            'stayTime' => 25200.00,
            'created_at' => '2024-05-10 07:00:00',
            'updated_at' => '2024-05-10 14:00:00'
        ];
        DB::table('stamps')->insert($param);
        $param = [
            'id' => 2,
            'user_id' => 2,
            'punchIn' => '2024-05-10 09:00:00',
            'punchOut' => '2024-05-10 18:00:00',
            'stayTime' => 32400.00,
            'created_at' => '2024-05-10 09:00:00',
            'updated_at' => '2024-05-10 18:00:00'
        ];
        DB::table('stamps')->insert($param);
        $param = [
            'id' => 3,
            'user_id' => 3,
            'punchIn' => '2024-05-10 05:00:00',
            'punchOut' => '2024-05-10 12:00:00',
            'stayTime' => 25200.00,
            'created_at' => '2024-05-10 05:00:00',
            'updated_at' => '2024-05-10 12:00:00'
        ];
        DB::table('stamps')->insert($param);
        $param = [
            'id' => 4,
            'user_id' => 4,
            'punchIn' => '2024-05-10 10:00:00',
            'punchOut' => '2024-05-10 15:00:00',
            'stayTime' => 18000.00,
            'created_at' => '2024-05-10 10:00:00',
            'updated_at' => '2024-05-10 15:00:00'
        ];
        DB::table('stamps')->insert($param);
        $param = [
            'id' => 5,
            'user_id' => 5,
            'punchIn' => '2024-05-10 12:00:00',
            'punchOut' => '2024-05-10 17:00:00',
            'stayTime' => 18000.00,
            'created_at' => '2024-05-10 12:00:00',
            'updated_at' => '2024-05-10 17:00:00'
        ];
        DB::table('stamps')->insert($param);
        $param = [
            'id' => 6,
            'user_id' => 6,
            'punchIn' => '2024-05-10 12:00:00',
            'punchOut' => '2024-05-10 22:00:00',
            'stayTime' => 36000.00,
            'created_at' => '2024-05-10 12:00:00',
            'updated_at' => '2024-05-10 22:00:00'
        ];
        DB::table('stamps')->insert($param);
        $param = [
            'id' => 7,
            'user_id' => 7,
            'punchIn' => '2024-05-10 13:00:00',
            'punchOut' => '2024-05-10 22:00:00',
            'stayTime' => 32400.00,
            'created_at' => '2024-05-10 13:00:00',
            'updated_at' => '2024-05-10 22:00:00'
        ];
        DB::table('stamps')->insert($param);
        $param = [
            'id' => 8,
            'user_id' => 8,
            'punchIn' => '2024-05-10 13:00:00',
            'punchOut' => '2024-05-10 18:00:00',
            'stayTime' => 18000.00,
            'created_at' => '2024-05-10 13:00:00',
            'updated_at' => '2024-05-10 18:00:00'
        ];
        DB::table('stamps')->insert($param);
        $param = [
            'id' => 9,
            'user_id' => 9,
            'punchIn' => '2024-05-10 18:00:00',
            'punchOut' => '2024-05-10 21:00:00',
            'stayTime' => 10800.00,
            'created_at' => '2024-05-10 18:00:00',
            'updated_at' => '2024-05-10 21:00:00'
        ];
        DB::table('stamps')->insert($param);
        $param = [
            'id' => 10,
            'user_id' => 10,
            'punchIn' => '2024-05-10 22:00:00',
            'punchOut' => '2024-05-11 07:00:00',
            'stayTime' => 10800.00,
            'created_at' => '2024-05-10 22:00:00',
            'updated_at' => '2024-05-11 07:00:00'
        ];
        DB::table('stamps')->insert($param);
    }
}
