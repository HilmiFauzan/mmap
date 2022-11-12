<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProduksiTelurs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000, 9999)
            . mt_rand(1000, 9999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $string = str_shuffle($pin);

        for ($i=0; $i <= 5; $i++) { 
            DB::table('produksi_telurs')->insert([
                'no_produksi' => str_shuffle($pin),
                'ttl_tiap_kdng' => str_shuffle(mt_rand(1000, 9999)),
                'ttl_berat_tiap_kdng' => str_shuffle(mt_rand(1000, 9999))
            ]);
        }
    }
}
