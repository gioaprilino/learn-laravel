<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //jika ingin membuat data dummy manual
        // \App\Models\Mahasiswa::create(
        //     [
        //         'name' => 'hmzz',
        //         'nim' => '37175507050001',
        //         'jurusan'=> 'TI',
        //         'email' => 'jaemin@gmail.com',
        //         'prodi' => 'trpl',
        //         'alamat' => 'jl. limau manis',
        //     ]);

        //jika ingin membuat data dummy secara otomatis
        \App\Models\Mahasiswa::factory(40)->create();
    }
}
