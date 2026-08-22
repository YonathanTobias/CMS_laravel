<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    public function run(): void
    {
        Achievement::truncate();

        // 1. Prestasi Dosen / Sertifikasi
        Achievement::create([
            'student_name' => 'Ns. Maria Lucia, M.Kep.',
            'student_prodi' => 'Dosen Tetap S1 Keperawatan & Ners',
            'title' => 'Lulus Sertifikasi Dosen Nasional Kemenristekdikti',
            'badge_title' => 'Sertifikasi Dosen',
            'badge_color' => 'bg-amber-500 text-slate-950',
            'event_name' => 'Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi',
            'description' => 'Penetapan Dosen Profesional Ter-Sertifikasi Tahun 2026',
            'poster_image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=800&auto=format&fit=crop',
            'order' => 1,
            'is_active' => true,
        ]);

        // 2. Pembentukan Satgas Baru
        Achievement::create([
            'student_name' => 'Tim Satgas PPKS STIKes PW',
            'student_prodi' => 'Unit Layanan & Satuan Tugas Kampus',
            'title' => 'Resmi Dilantik Satuan Tugas PPKS Periode 2026-2028',
            'badge_title' => 'Satgas Baru',
            'badge_color' => 'bg-indigo-600 text-white',
            'event_name' => 'SK Ketua STIKes Panti Waluya Malang',
            'description' => 'Pencegahan dan Penanganan Kekerasan Seksual di Lingkungan Kampus',
            'poster_image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=800&auto=format&fit=crop',
            'order' => 2,
            'is_active' => true,
        ]);

        // 3. Prestasi Mahasiswa Juara 1
        Achievement::create([
            'student_name' => 'Sisilia Caroline S.',
            'student_prodi' => 'Mahasiswa Prodi S1 Keperawatan Semester 4',
            'title' => 'Lomba Poster Digital Tingkat Nasional',
            'badge_title' => 'Juara 1',
            'badge_color' => 'bg-amber-500 text-slate-950',
            'event_name' => 'Kita Merdeka Indonesia',
            'description' => 'Tema: "Bhinneka Tunggal Ika"',
            'poster_image' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=800&auto=format&fit=crop',
            'order' => 3,
            'is_active' => true,
        ]);

        // 4. Prestasi Mahasiswa The Finest
        Achievement::create([
            'student_name' => 'Leontius Jj N.N',
            'student_prodi' => 'Mahasiswa Prodi D4 MIK Semester 2',
            'title' => 'Lomba Infografis Tingkat Nasional',
            'badge_title' => 'The Finest',
            'badge_color' => 'bg-blue-600 text-white',
            'event_name' => 'Akademi Farmasi Prayoga Padang',
            'description' => 'Tema: "Peran Mahasiswa Mencegah Bullying di Kampus"',
            'poster_image' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=800&auto=format&fit=crop',
            'order' => 4,
            'is_active' => true,
        ]);
    }
}
