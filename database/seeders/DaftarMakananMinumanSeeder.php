<?php

namespace Database\Seeders;

use App\Models\DaftarMakananMinuman;
use Illuminate\Database\Seeder;

class DaftarMakananMinumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $makanan = new DaftarMakananMinuman();
        $makanan->fill([
            'nama' => 'Nasi',
            'harga' => 5000
        ]);
        $makanan->save();
        $makanan = new DaftarMakananMinuman();
        $makanan->fill([
            'nama' => 'Rendang',
            'harga' => 10000
        ]);
        $makanan->save();
        $esteh = new DaftarMakananMinuman();
        $esteh->fill([
            'nama' => 'Es Teh',
            'harga' => 2000
        ]);
        $esteh->save();
    }
}
