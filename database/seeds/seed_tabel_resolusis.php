<?php

use Illuminate\Database\Seeder;

class seed_tabel_resolusis extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('resolusis')->insert([
           'resolusi' => '1080',
           'fps' => '60',
           'skor' => '1140',
           'created_at' => date('Y-m-d-h-i-s'),
           'updated_at' => date('Y-m-d-h-i-s'),
       ]);
    }
}
