<?php

namespace Database\Seeders;

use App\Models\JenisBarang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisBarang::insert([
            [
                'id' => '1',
                'nama' => 'Perangkat Komputer',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '2',
                'nama' => 'Pakaian',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => '3',
                'nama' => 'ELektronik',
                'created_at' => now(),
                'updated_at' => now()
            ],
          
            
        ]);
    }
}
