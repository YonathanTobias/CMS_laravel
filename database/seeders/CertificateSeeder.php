<?php

namespace Database\Seeders;

use App\Models\Certificate;
use Illuminate\Database\Seeder;

class CertificateSeeder extends Seeder
{
    public function run(): void
    {
        $certificates = [
            [
                'title' => 'Sertifikat Akreditasi Perguruan Tinggi',
                'issuer' => 'Badan Akreditasi Nasional Perguruan Tinggi (BAN-PT)',
                'badge' => 'Baik Sekali (BAN-PT)',
                'badge_color' => 'bg-amber-500 text-slate-950',
                'image' => 'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?q=80&w=800&auto=format&fit=crop',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Piagam Akreditasi Bidang Kesehatan',
                'issuer' => 'Lembaga Akreditasi Mandiri Kesehatan (LAM-PTKes)',
                'badge' => 'Akred Kesehatan (LAM-PTKes)',
                'badge_color' => 'bg-blue-600 text-white',
                'image' => 'https://images.unsplash.com/photo-1607604276583-eef5d076aa5f?q=80&w=800&auto=format&fit=crop',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Piagam Implementasi SPMI Terbaik',
                'issuer' => 'LLDIKTI Wilayah VII Jawa Timur',
                'badge' => 'Penghargaan LLDIKTI VII',
                'badge_color' => 'bg-emerald-600 text-white',
                'image' => 'https://images.unsplash.com/photo-1544717305-2782549b5136?q=80&w=800&auto=format&fit=crop',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Sertifikat Standar Laboratorium Medis',
                'issuer' => 'Kementerian Kesehatan Republik Indonesia',
                'badge' => 'Standar Kemenkes RI',
                'badge_color' => 'bg-indigo-600 text-white',
                'image' => 'https://images.unsplash.com/photo-1579154204601-01588f351e67?q=80&w=800&auto=format&fit=crop',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($certificates as $cert) {
            Certificate::updateOrCreate(['title' => $cert['title']], $cert);
        }
    }
}
