<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    public function run(): void
    {
        Achievement::truncate();

        Achievement::create([
            'student_name' => 'Sisilia Caroline S.',
            'student_prodi' => 'Mahasiswa Prodi S1 Keperawatan & Ners Semester 4',
            'title' => 'Lomba Poster Digital Tingkat Nasional',
            'badge_title' => 'Juara 1',
            'badge_color' => 'bg-amber-500 text-slate-950',
            'event_name' => 'Kita Merdeka Indonesia',
            'description' => 'Tema: "Bhinneka Tunggal Ika"',
            'poster_image' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=800&auto=format&fit=crop',
            'order' => 1,
            'is_active' => true,
        ]);

        Achievement::create([
            'student_name' => 'Leontius Jj N.N',
            'student_prodi' => 'Mahasiswa Prodi D4 Manajemen Informasi Kesehatan Semester 2',
            'title' => 'Lomba Infografis Tingkat Nasional',
            'badge_title' => 'The Finest',
            'badge_color' => 'bg-blue-600 text-white',
            'event_name' => 'Akademi Farmasi Prayoga Padang',
            'description' => 'Tema: "Peran Mahasiswa Mencegah Bullying di Kampus"',
            'poster_image' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=800&auto=format&fit=crop',
            'order' => 2,
            'is_active' => true,
        ]);

        Achievement::create([
            'student_name' => 'Sisilia Caroline S.',
            'student_prodi' => 'Mahasiswa Prodi S1 Keperawatan & Ners Semester 4',
            'title' => 'Lomba Poster Tingkat Nasional',
            'badge_title' => 'Juara 3',
            'badge_color' => 'bg-emerald-600 text-white',
            'event_name' => 'Universitas Ahmad Dahlan',
            'description' => 'Tema: "Upgrade Your Food & Balanced With Local Food"',
            'poster_image' => 'https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?q=80&w=800&auto=format&fit=crop',
            'order' => 3,
            'is_active' => true,
        ]);

        Achievement::create([
            'student_name' => 'Sisilia Caroline S.',
            'student_prodi' => 'Mahasiswa Prodi S1 Keperawatan & Ners Semester 4',
            'title' => 'Lomba Nasional Menulis Puisi Kangen',
            'badge_title' => 'Penulis Terbaik',
            'badge_color' => 'bg-indigo-600 text-white',
            'event_name' => 'Senjakala Indonesia',
            'description' => 'Judul Karya: "Di Tepian Tatapan Senja"',
            'poster_image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=800&auto=format&fit=crop',
            'order' => 4,
            'is_active' => true,
        ]);
    }
}
