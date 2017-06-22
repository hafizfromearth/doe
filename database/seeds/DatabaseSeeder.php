<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(seed_tabel_admin::class);
        $this->call(seed_tabel_toko::class);
        $this->call(seed_tabel_resolusis::class);
    }
}
