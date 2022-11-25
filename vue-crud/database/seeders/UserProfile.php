<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProfile extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'name' => 'user',
            'id' => 1,
        ]);
        DB::table('profiles')->insert([
            'name' => 'adm',
            'id' => 2,
        ]);
    }
}
