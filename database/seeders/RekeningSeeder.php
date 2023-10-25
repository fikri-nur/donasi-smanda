<?php

namespace Database\Seeders;

use App\Models\Rekening;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RekeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rekenings = [
            [
                'nama_bank' => 'Bank BNI',
                'nama_pemilik' => 'Pemilik 1',
                'nomor_rekening' => '1234567890',
            ],
            [
                'nama_bank' => 'Bank BCA',
                'nama_pemilik' => 'Pemilik 2',
                'nomor_rekening' => '1234567890',
            ],
            [
                'nama_bank' => 'Bank Mandiri',
                'nama_pemilik' => 'Pemilik 3',
                'nomor_rekening' => '1234567890',
            ],
        ];

        foreach ($rekenings as $rekening) {
            Rekening::create($rekening);
        }
    }
}
