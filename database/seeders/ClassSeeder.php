<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\ClassRoom;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        ClassRoom::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['nama' => 'RPL1'],
            ['nama' => 'RPL2'],
            ['nama' => 'RPL3'],
        ];

        foreach($data as $value) {
        ClassRoom::insert([
            'nama' => $value['nama'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        }
    }
}
