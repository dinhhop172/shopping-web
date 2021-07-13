<?php

use Illuminate\Database\Seeder;

class CreateRoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->insert([
            ['name' => 'admin', 'display_name' => 'Quan tri he thong'],
            ['name' => 'guest', 'display_name' => 'Quan tri he thong'],
            ['name' => 'developer', 'display_name' => 'Phat trien he thong'],
            ['name' => 'content', 'display_name' => 'Chinh sua noi dung'],
        ]);
    }
}
