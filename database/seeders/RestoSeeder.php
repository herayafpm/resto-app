<?php

namespace Database\Seeders;

use App\Models\Resto;
use Illuminate\Database\Seeder;

class RestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $resto = new Resto();
        $resto->fill([
            'nama_resto' => 'RM Heraya',
            'nama_pemilik' => 'Heraya',
            'alamat' => 'Desa Rakit',
            'no_hp' => '084214xxx'
        ]);
        $resto->save();
    }
}
