<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HewanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hewan')-> insert([
                'namapemilik'=> 'AdhiknaEnggarjati',
                'jenishewan'=> 'Monyet',
                'nomorhp'=> '08782182931',
            ]);
    }
}
