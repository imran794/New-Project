<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
      {
          DB::table('users')->insert([
            'name' => 'MD.Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt(123456789),
        ]);

        DB::table('users')->insert([
            'name' => 'MD.User',
            'email' => 'user@gmail.com',
            'password' => bcrypt(123456789),
        ]);
    }
}
