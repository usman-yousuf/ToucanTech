<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools = [
            ['school_name' => 'School 1'],
            ['school_name' => 'School 2'],
            ['school_name' => 'School 3'],
            ['school_name' => 'School 4'],
            ['school_name' => 'School 5'],
        ];

        DB::table('schools')->insert($schools);
    }
}
