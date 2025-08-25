<?php

namespace Database\Seeders;

use App\Models\Jenistingggal;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class RefJenisTinggalSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $json = File::get('database/data/jenis_tinggal.json');
        $data = json_decode($json);
        foreach($data as $obj){
            Jenistingggal::create([
                'jenis_tingggal_id' => $obj->id,
                'nama'              => $obj->nama,
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);
        }
    }
}
