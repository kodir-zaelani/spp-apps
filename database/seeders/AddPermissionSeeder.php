<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AddPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          //permission for jenistagihan
        Permission::create(['name' => 'jenistagihan.index']);
        Permission::create(['name' => 'jenistagihan.create']);
        Permission::create(['name' => 'jenistagihan.edit']);
        Permission::create(['name' => 'jenistagihan.delete']);
    }
}
