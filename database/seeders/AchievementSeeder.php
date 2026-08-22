<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    public function run(): void
    {
        Achievement::truncate();

        $items = [
            [
                'student_name' => 'Ns. Maria Lucia, M.Kep.',
                'student_prodi' => 'Dosen Tetap S1 Keperawatan & Ners',
                'title' => 'Lulus Sertifikasi Dosen Nasional Kemenristekdikti 2026',
                'badge_title' => 'Sertifikasi Dosen',
                'badge_color' => 'bg-amber-500 text-slate-950',
                'event_name' => 'Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi',
                'description' => 'Penetapan Dosen Profesional Ter-Sertifikasi Tahun 2026',
                'poster_image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=800&auto=format&fit=crop',
                'order' => 1,
            ],
            [
                'student_name' => 'Tim Satgas PPKS STIKes PW',
                'student_prodi' => 'Unit Layanan & Satuan Tugas Kampus',
                'title' => 'Resmi Dilantik Satuan Tugas PPKS Periode 2026-2028',
                'badge_title' => 'Satgas Baru',
                'badge_color' => 'bg-indigo-600 text-white',
                'event_name' => 'SK Ketua STIKes Panti Waluya Malang',
                'description' => 'Pencegahan dan Penanganan Kekerasan Seksual di Lingkungan Kampus',
                'poster_image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=800&auto=format&fit=crop',
                'order' => 2,
            ],
            [
                'student_name' => 'Sisilia Caroline S.',
                'student_prodi' => 'Mahasiswa Prodi S1 Keperawatan Semester 4',
                'title' => 'Lomba Poster Digital Tingkat Nasional',
                'badge_title' => 'Juara 1',
                'badge_color' => 'bg-amber-500 text-slate-950',
                'event_name' => 'Kita Merdeka Indonesia',
                'description' => 'Tema: "Bhinneka Tunggal Ika"',
                'poster_image' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=800&auto=format&fit=crop',
                'order' => 3,
            ],
            [
                'student_name' => 'Leontius Jj N.N',
                'student_prodi' => 'Mahasiswa Prodi D4 MIK Semester 2',
                'title' => 'Lomba Infografis Tingkat Nasional',
                'badge_title' => 'The Finest',
                'badge_color' => 'bg-blue-600 text-white',
                'event_name' => 'Akademi Farmasi Prayoga Padang',
                'description' => 'Tema: "Peran Mahasiswa Mencegah Bullying di Kampus"',
                'poster_image' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=800&auto=format&fit=crop',
                'order' => 4,
            ],
            [
                'student_name' => 'dr. Antonius Hendra, M.Biomed',
                'student_prodi' => 'Dosen Peneliti Kebidanan & Kesehatan',
                'title' => 'Publikasi Jurnal Internasional Bereputasi Scopus Q2',
                'badge_title' => 'Hibah Penelitian',
                'badge_color' => 'bg-emerald-600 text-white',
                'event_name' => 'Journal of Medical & Clinical Health Studies',
                'description' => 'Inovasi Pelayanan Kebidanan Komunitas di Jawa Timur',
                'poster_image' => 'https://images.unsplash.com/photo-1537368910025-700350fe46c7?q=80&w=800&auto=format&fit=crop',
                'order' => 5,
            ],
            [
                'student_name' => 'Tim Relawan Donor Darah KSR',
                'student_prodi' => 'UKM KSR & Kemahasiswaan STIKes PW',
                'title' => 'Penghargaan Kemanusiaan & Bakti Sosial PMI 2026',
                'badge_title' => 'Bakti Sosial',
                'badge_color' => 'bg-rose-600 text-white',
                'event_name' => 'Palang Merah Indonesia Kota Malang',
                'description' => 'Pengumpulan 500 Kantong Darah untuk Rumah Sakit Malang Raya',
                'poster_image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?q=80&w=800&auto=format&fit=crop',
                'order' => 6,
            ],
            [
                'student_name' => 'Novianti Rahayu, A.Md.Kep',
                'student_prodi' => 'Alumni Prodi D3 Keperawatan Angkatan 2023',
                'title' => 'Lulus Rekrutmen Perawat Rumah Sakit di Tokyo Japan',
                'badge_title' => 'Karir Internasional',
                'badge_color' => 'bg-sky-600 text-white',
                'event_name' => 'Japan International Health Care Program',
                'description' => 'Perawat Profesional Berlisensi Kerja Resmi di Jepang',
                'poster_image' => 'https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?q=80&w=800&auto=format&fit=crop',
                'order' => 7,
            ],
            [
                'student_name' => 'Tim Pembina SPMI Institusi',
                'student_prodi' => 'LPMI STIKes Panti Waluya',
                'title' => 'Penghargaan Implementasi SPMI Terbaik Wilayah LLDIKTI VII',
                'badge_title' => 'Penjaminan Mutu',
                'badge_color' => 'bg-indigo-600 text-white',
                'event_name' => 'LLDIKTI Wilayah VII Jawa Timur',
                'description' => 'Kategori Perguruan Tinggi Kesehatan Swasta Berkinerja Baik',
                'poster_image' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=800&auto=format&fit=crop',
                'order' => 8,
            ],
            [
                'student_name' => 'Bagas Prasetyo & Tim MIK',
                'student_prodi' => 'Mahasiswa Prodi D4 Rekam Medis Semester 6',
                'title' => 'Juara 2 Hackathon Inovasi SIMRS Kesehatan Nasional',
                'badge_title' => 'Juara 2',
                'badge_color' => 'bg-emerald-600 text-white',
                'event_name' => 'Asosiasi Rekam Medis Indonesia',
                'description' => 'Aplikasi EHR Rekam Medis Berbasis Web Cloud',
                'poster_image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?q=80&w=800&auto=format&fit=crop',
                'order' => 9,
            ],
            [
                'student_name' => 'Unit Laboratorium Keperawatan',
                'student_prodi' => 'Laboratorium Medis STIKes PW',
                'title' => 'Akreditasi Laboratorium Standar Kemenkes Lulus Pemantauan',
                'badge_title' => 'Fasilitas Unggul',
                'badge_color' => 'bg-amber-500 text-slate-950',
                'event_name' => 'Komite Akreditasi Laboratorium Kesehatan',
                'description' => 'Laboratorium Praktikum Praktik Medis Berstandardisasi Internasional',
                'poster_image' => 'https://images.unsplash.com/photo-1579154204601-01588f351e67?q=80&w=800&auto=format&fit=crop',
                'order' => 10,
            ],
        ];

        foreach ($items as $item) {
            Achievement::create(array_merge($item, ['is_active' => true]));
        }
    }
}
