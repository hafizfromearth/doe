<?php

use Illuminate\Database\Seeder;

class seed_tabel_toko extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tokos')->insert([
             'name' => 'borneo',
             'email' => 'borneo'.'@gmail.com',
             'alamat' => str_random(30),
             'telepon' => '123456789012',
             'password' => bcrypt('123456'),
         ]);
    }
}
