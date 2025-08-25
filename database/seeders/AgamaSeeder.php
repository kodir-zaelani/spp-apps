<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgamaSeeder extends Seeder
{
    /**
    * Run the database seeds.
    */
    public function run(): void
    {
        //DB::table('agama')->truncate();
        $json = File::get('database/data/agama.json');
        $data = json_decode($json);
        foreach($data as $obj){
            DB::table('agama')->insert([
                'agama_id'   => $obj->id,
                'nama'       => $obj->nama,
                'created_at' => $obj->created_at,
                'updated_at' => $obj->updated_at,
                'deleted_at' => $obj->deleted_at,
            ]);
        }
    }
}