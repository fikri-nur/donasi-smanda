<?php

namespace Database\Seeders;

use App\Models\Campaign;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $campaigns = [
            [
                'name' => 'Donasi Masjid',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisl eget fermentum aliquam, elit nunc aliquet nunc, vitae aliquam nisi nunc eget nunc. Donec euismod, nisl eget fermentum aliquam, elit nunc aliquet nunc, vitae aliquam nisi nunc eget nunc.',
                'image' => 'https://via.placeholder.com/300x200',
                'carousel' => 'https://via.placeholder.com/1200x400',
                'video' => 'https://www.youtube.com/embed/5qap5aO4i9A',
                'goal' => '100000',
                'raised' => '50000',
                'start_date' => '2021-10-21 21:55:59',
                'end_date' => '2021-10-21 21:55:59',
                'status' => 'open',
                'user_id' => 1,
            ],
            [
                'name' => 'Donasi Palestina',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisl eget fermentum aliquam, elit nunc aliquet nunc, vitae aliquam nisi nunc eget nunc. Donec euismod, nisl eget fermentum aliquam, elit nunc aliquet nunc, vitae aliquam nisi nunc eget nunc.',
                'image' => 'https://via.placeholder.com/300x200',
                'carousel' => 'https://via.placeholder.com/1200x400',
                'video' => 'https://www.youtube.com/embed/5qap5aO4i9A',
                'goal' => '100000',
                'raised' => '50000',
                'start_date' => '2021-10-21 21:55:59',
                'end_date' => '2021-10-21 21:55:59',
                'status' => 'open',
                'user_id' => 1,
            ],
            [
                'name' => 'Donasi Siswa Kurang Mampu',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisl eget fermentum aliquam, elit nunc aliquet nunc, vitae aliquam nisi nunc eget nunc.
                Donec euismod, nisl eget fermentum aliquam, elit nunc aliquet nunc, vitae aliquam nisi nunc eget nunc.',
                'image' => 'https://via.placeholder.com/300x200',
                'carousel' => 'https://via.placeholder.com/1200x400',
                'video' => 'https://www.youtube.com/embed/5qap5aO4i9A',
                'goal' => '100000',
                'raised' => '50000',
                'start_date' => '2021-10-21 21:55:59',
                'end_date' => '2021-10-21 21:55:59',
                'status' => 'open',
                'user_id' => 1,
            ],
            [
                'name' => 'Donasi Bencana Banjir',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisl eget fermentum aliquam, elit nunc aliquet nunc, vitae aliquam nisi nunc eget nunc.
                Donec euismod, nisl eget fermentum aliquam, elit nunc aliquet nunc, vitae aliquam nisi nunc eget nunc.',
                'image' => 'https://via.placeholder.com/300x200',
                'carousel' => 'https://via.placeholder.com/1200x400',
                'video' => 'https://www.youtube.com/embed/5qap5aO4i9A',
                'goal' => '100000',
                'raised' => '50000',
                'start_date' => '2021-10-21 21:55:59',
                'end_date' => '2021-10-21 21:55:59',
                'status' => 'open',
                'user_id' => 1,
            ],
            [
                'name' => 'Donasi Bencana Gempa',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisl eget fermentum aliquam, elit nunc aliquet nunc, vitae aliquam nisi nunc eget nunc.
                Donec euismod, nisl eget fermentum aliquam, elit nunc aliquet nunc, vitae aliquam nisi nunc eget nunc.',
                'image' => 'https://via.placeholder.com/300x200',
                'carousel' => 'https://via.placeholder.com/1200x400',
                'video' => 'https://www.youtube.com/embed/5qap5aO4i9A',
                'goal' => '100000',
                'raised' => '50000',
                'start_date' => '2021-10-21 21:55:59',
                'end_date' => '2021-10-21 21:55:59',
                'status' => 'open',
                'user_id' => 1,
            ],
            [
                'name' => 'Donasi Bencana Gunung Meletus',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec euismod, nisl eget fermentum aliquam, elit nunc aliquet nunc, vitae aliquam nisi nunc eget nunc.
                Donec euismod, nisl eget fermentum aliquam, elit nunc aliquet nunc, vitae aliquam nisi nunc eget nunc.',
                'image' => 'https://via.placeholder.com/300x200',
                'carousel' => 'https://via.placeholder.com/1200x400',
                'video' => 'https://www.youtube.com/embed/5qap5aO4i9A',
                'goal' => '100000',
                'raised' => '50000',
                'start_date' => '2021-10-21 21:55:59',
                'end_date' => '2021-10-21 21:55:59',
                'status' => 'open',
                'user_id' => 1,
            ]
        ];

        foreach ($campaigns as $campaign) {
            Campaign::create($campaign);
        }
    }
}
