<?php

namespace Database\Seeders;

use App\Models\Donatur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DonaturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $donaturs  = [
            [
                'name' => 'Donatur 1',
                'kategori' => 'internal',
                'email' => 'dummy1@mail.com',
                'phone_no' => '081234567890',
                'campaign_id' => 1,
                'amount' => '15000',
                'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisl eget fermentum aliquam, elit nunc aliquet nunc, vitae aliquam nisi nunc eget nunc.',
                'rekening_id' => 1,
                'payment_status' => 'paid',
                'payment_date' => now(),
                'payment_proof' => 'assets\img\dummy-bukti/1.jpeg',
                'status' => 'verified',
                ],
            ['name' => 'Donatur 2',
                'kategori' => 'internal',
                'email' => 'dummy2@mail.com',
                'phone_no' => '081234567890',
                'campaign_id' => 1,
                'amount' => '10000',
                'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisl eget fermentum aliquam, elit nunc aliquet nunc, vitae aliquam nisi nunc eget nunc.',
                'rekening_id' => 2,
                'payment_status' => 'paid',
                'payment_date' => now(),
                'payment_proof' => 'assets\img\dummy-bukti/2.jpeg',
                'status' => 'verified',
                ],
            ['name' => 'Donatur 3',
                'kategori' => 'eksternal',
                'email' => 'dummy3@mail.com',
                'phone_no' => '081234567890',
                'campaign_id' => 2,
                'amount' => '50000',
                'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisl eget fermentum aliquam, elit nunc aliquet nunc, vitae aliquam nisi nunc eget nunc.',
                'rekening_id' => 3,
                'payment_status' => 'paid',
                'payment_date' => now(),
                'payment_proof' => 'assets\img\dummy-bukti/3.jpeg',
                'status' => 'verified',
                ],
            ];

        foreach ($donaturs as $donatur) {
            Donatur::create($donatur);
        }
        
        foreach ($donaturs as $donatur) {
            Donatur::create($donatur);
        }
    }
}
