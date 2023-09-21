<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $members = [];

        for ($i = 1; $i <= 10; $i++) {
            $members[] = [
                'name' => 'Member ' . $i,
                'email' => 'member' . $i . '@example.com',
            ];
        }

        DB::table('members')->insert($members);
    }
}
