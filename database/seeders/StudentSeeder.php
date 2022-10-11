<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Schema::disableForeignKeyConstraints();
        // Student::truncate();
        // Schema::enableForeignKeyConstraints();

        // $data = [
        //     ['nama' => 'Bagus', 'gender' => 'L', 'nis' => '4482', 'class_id' => 1],
        //     ['nama' => 'Rananda', 'gender' => 'P', 'nis' => '4465', 'class_id' => 2],
        //     ['nama' => 'Ario', 'gender' => 'L', 'nis' => '4478', 'class_id' => 1],
        // ];
        // foreach($data as $value){
        //     Student::insert([
        //         'nama' => $value['nama'],
        //         'gender' => $value['gender'],
        //         'nis' => $value['nis'],
        //         'class_id' => $value['class_id'],
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ]);
        // }
        
        Student::factory()->count(500)->create();
    }
}
