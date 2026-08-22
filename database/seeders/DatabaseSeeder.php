<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Page;
use App\Models\ProgramStudi;
use App\Models\Facility;
use App\Models\SpmiDocument;
use App\Models\SiteSetting;
use App\Models\Menu;
use App\Models\Slide;
use App\Models\Stat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@stikespantiwaluya.ac.id'],
            [
                'name' => 'Admin Utama STIKes',
                'password' => Hash::make('password123'),
            ]
        );

        // 2. Site Settings
        $settings = [
            'site_name' => 'STIKes Panti Waluya Malang',
            'site_tagline' => 'Pendidikan Kesehatan Berkualitas, Berkarakter, dan Berdaya Saing Global',
            'phone' => '(0341) 369003 / 369004',
            'whatsapp' => '0812-3456-7890',
            'email' => 'info@stikespantiwaluya.ac.id',
            'address' => 'Jl. Yulius Riefbuilder No. 5, Oro-Oro Dowo, Kec. Klojen, Kota Malang, Jawa Timur 65119',
            'pmb_status' => 'Buka',
            'pmb_title' => 'Penerimaan Mahasiswa Baru (PMB) T.A. 2026/2027',
            'pmb_subtitle' => 'Daftar sekarang dan dapatkan beasiswa potongan SPP khusus pendaftar Gelombang I & II.',
            'pmb_link' => 'https://pmb.stikespantiwaluya.ac.id',
            'facebook' => 'https://facebook.com/stikespantiwaluyamalang',
            'instagram' => 'https://instagram.com/stikespantiwaluya',
            'youtube' => 'https://youtube.com/@stikespantiwaluyaofficial',
        ];

        foreach ($settings as $key => $val) {
            SiteSetting::set($key, $val);
        }

        // 3. Program Studi
        $prodis = [
            [
                'name' => 'D3 Keperawatan',
                'slug' => 'd3-keperawatan',
                'degree' => 'D3',
                'accreditation' => 'Unggul',
                'description' => 'Menghasilkan Ahli Madya Keperawatan yang unggul dalam asuhan keperawatan kegawatdaruratan, berkarakter Kasih, dan siap kerja profesional baik di dalam maupun luar negeri.',
                'curriculum_summary' => '110 SKS mencakup Keperawatan Dasar, Keperawatan Medikal Bedah, Gawat Darurat, Maternitas, Anak, Jiwa, Komunitas, dan Praktik Klinik Keperawatan.',
                'career_prospects' => 'Perawat Rumah Sakit, Perawat Klinik, Homecare Specialist, Perawat Internasional (Jepang, Arab Saudi, Jerman), Tenaga Kesehatan Instansi Pemerintah.',
                'icon' => 'fa-user-nurse',
            ],
            [
                'name' => 'S1 Keperawatan',
                'slug' => 's1-keperawatan',
                'degree' => 'S1',
                'accreditation' => 'Baik Sekali',
                'description' => 'Program pendidikan akademik perawat jenjang sarjana dengan keunggulan riset keperawatan, manajerial keperawatan rumah sakit, dan aplikasi keperawatan holistik.',
                'curriculum_summary' => '144 SKS teori & praktikum sains keperawatan, patofisiologi, farmakologi, kepemimpinan keperawatan, skripsi riset kesehatan.',
                'career_prospects' => 'Nurse Manager, Peneliti Kesehatan, Pengembang Layanan Keperawatan, Konsultan Kesehatan, Akademisi Keperawatan.',
                'icon' => 'fa-graduation-cap',
            ],
            [
                'name' => 'Profesi Ners',
                'slug' => 'profesi-ners',
                'degree' => 'Profesi',
                'accreditation' => 'Baik Sekali',
                'description' => 'Program profesi perawat lanjutan bagi lulusan S1 Keperawatan untuk meraih gelar Ners (Ns.) dengan kemampuan klinis komprehensif berstandar nasional.',
                'curriculum_summary' => '36 SKS praktik klinik stase Rumah Sakit Tipe A/B, Puskesmas, dan Komunitas selama 2 semester.',
                'career_prospects' => 'Perawat Profesional (Ns.), Kepala Ruangan Rumah Sakit, Supervisor Klinis, Perawat Spesialis.',
                'icon' => 'fa-stethoscope',
            ],
            [
                'name' => 'D3 Rekam Medis & Informasi Kesehatan (RMIK)',
                'slug' => 'd3-rmik',
                'degree' => 'D3',
                'accreditation' => 'Unggul',
                'description' => 'Program studi pelopor di Jawa Timur yang mendidik tenaga ahli pengelola data kesehatan digital, koding klinis ICD-10/ICD-9-CM, dan sistem EHR (Electronic Health Record).',
                'curriculum_summary' => '108 SKS Koding Diagnosis, Klasifikasi Penyakit, Manajemen Informasi Kesehatan Digital, Analisis Data Rekam Medis, Hukum Kesehatan.',
                'career_prospects' => 'Perekam Medis Rumah Sakit, Coder Klinis BPJS, Data Analyst Kesehatan, System Analyst SIMRS, Auditor Rekam Medis.',
                'icon' => 'fa-notes-medical',
            ],
            [
                'name' => 'D3 Farmasi',
                'slug' => 'd3-farmasi',
                'degree' => 'D3',
                'accreditation' => 'Baik Sekali',
                'description' => 'Mendidik Ahli Madya Farmasi yang mahir dalam pelayanan kefarmasian klinik, racikan obat, tata kelola instalasi farmasi, dan formulasi bahan alam.',
                'curriculum_summary' => '112 SKS Farmasetika, Farmakologi, Kimia Farmasi, Pelayanan Kefarmasian Apotek/RS, Produksi Obat Tradisional.',
                'career_prospects' => 'Tenaga Teknis Kefarmasian (TTK) Apotek, Asisten Apoteker RS, Quality Control Industri Farmasi, Entrepreneur Produk Herbal.',
                'icon' => 'fa-pills',
            ],
        ];

        foreach ($prodis as $prodi) {
            ProgramStudi::updateOrCreate(['slug' => $prodi['slug']], $prodi);
        }

        // 4. Static Pages & Posts
        $pages = [
            ['title' => 'Sejarah & Profil Kampus', 'slug' => 'sejarah-profil', 'icon' => 'fa-university', 'order' => 1, 'content' => '<h3>Sejarah Singkat STIKes Panti Waluya Malang</h3><p>Berdiri sejak puluhan tahun lalu...</p>'],
            ['title' => 'Visi, Misi & Nilai Dasar', 'slug' => 'visi-misi', 'icon' => 'fa-bullseye', 'order' => 2, 'content' => '<h3>Visi STIKes Panti Waluya Malang</h3><p><em>"Menjadi Sekolah Tinggi Ilmu Kesehatan yang Unggul..."</em></p>'],
            ['title' => 'Sambutan Ketua STIKes', 'slug' => 'sambutan-ketua', 'icon' => 'fa-user-tie', 'order' => 3, 'content' => '<h3>Sambutan Ketua STIKes Panti Waluya Malang</h3><p>Salam Sejahtera...</p>'],
        ];
        foreach ($pages as $page) {
            Page::updateOrCreate(['slug' => $page['slug']], $page);
        }

        $posts = [
            ['title' => 'Penerimaan Mahasiswa Baru (PMB) STIKes Panti Waluya Malang T.A. 2026/2027 Resmi Dibuka', 'slug' => 'pmb-stikes-panti-waluya-malang-2026-2027', 'excerpt' => 'STIKes Panti Waluya Malang membuka pendaftaran mahasiswa baru...', 'content' => '<p>STIKes Panti Waluya Malang kembali membuka pendaftaran...</p>', 'category' => 'PMB & Akademik', 'status' => 'published', 'views' => 450, 'published_at' => now()->subDays(1)],
            ['title' => 'Pelatihan Kegawatdaruratan dan Basic Trauma Cardiac Life Support (BTCLS) Mahasiswa Keperawatan', 'slug' => 'pelatihan-btcls-mahasiswa-keperawatan-2026', 'excerpt' => 'Sebanyak 120 mahasiswa Ners dan D3 Keperawatan...', 'content' => '<p>Guna mengasah ketangkasan pra-klinis...</p>', 'category' => 'Akademik', 'status' => 'published', 'views' => 280, 'published_at' => now()->subDays(2)],
            ['title' => 'Kuliah Pakar Rekam Medis: Penerapan Sistem Electronic Health Record (EHR) Berbasis Cloud', 'slug' => 'kuliah-pakar-rekam-medis-ehr-2026', 'excerpt' => 'Program Studi D4 MIK menggelar kuliah pakar nasional...', 'content' => '<p>Menghadapi era digitalisasi rekam medis...</p>', 'category' => 'Akademik', 'status' => 'published', 'views' => 310, 'published_at' => now()->subDays(3)],
            ['title' => 'Bakti Sosial & Pemeriksaan Kesehatan Gratis Civitas Akademika di Malang Raya', 'slug' => 'bakti-sosial-pemeriksaan-kesehatan-gratis-2026', 'excerpt' => 'Tim Dosen dan Mahasiswa menggelar baksos pemeriksaan tensi dan gula darah...', 'content' => '<p>Wujud nyata pengabdian masyarakat...</p>', 'category' => 'Pengabdian Masyarakat', 'status' => 'published', 'views' => 195, 'published_at' => now()->subDays(4)],
            ['title' => 'Workshop Penulisan Karya Tulis Ilmiah & Jurnal Nasional Sinta untuk Dosen Kesehatan', 'slug' => 'workshop-penulisan-karya-tulis-ilmiah-2026', 'excerpt' => 'LPMI menggelar pendampingan publikasi jurnal riset bagi para dosen...', 'content' => '<p>Dalam rangka meningkatkan reputasi akademik...</p>', 'category' => 'Akademik', 'status' => 'published', 'views' => 220, 'published_at' => now()->subDays(5)],
            ['title' => 'Pelepasan Calon Perawat Internasional Lulusan STIKes Panti Waluya ke Jepang', 'slug' => 'pelepasan-perawat-internasional-ke-jepang-2026', 'excerpt' => '15 Lulusan D3 & S1 Keperawatan resmi berangkat bertugas di Tokyo...', 'content' => '<p>Selamat dan sukses kepada para perawat muda...</p>', 'category' => 'Prestasi & Pengakuan', 'status' => 'published', 'views' => 520, 'published_at' => now()->subDays(6)],
            ['title' => 'Sosialisasi Pencegahan Kekerasan Seksual & Perundungan oleh Satgas PPKS Kampus', 'slug' => 'sosialisasi-ppks-dan-anti-bullying-2026', 'excerpt' => 'Satgas PPKS mengadakan seminar interaktif lingkungan kampus ramah dan aman...', 'content' => '<p>Menciptakan iklim belajar yang aman dan kondusif...</p>', 'category' => 'Kemahasiswaan', 'status' => 'published', 'views' => 175, 'published_at' => now()->subDays(7)],
            ['title' => 'Simulasi Tanggap Bencana & Evakuasi Pasien Rumah Sakit Bersama Badan SAR Nasional', 'slug' => 'simulasi-tanggap-bencana-medis-2026', 'excerpt' => 'Mahasiswa Keperawatan mengikuti latihan evakuasi gawat darurat bencana...', 'content' => '<p>Kesiapsiagaan menghadapi situasi darurat...</p>', 'category' => 'Kemahasiswaan', 'status' => 'published', 'views' => 340, 'published_at' => now()->subDays(8)],
            ['title' => 'Studi Banding & Kerjasama Riset Farmasi Herbal dengan Universitas Partner Internasional', 'slug' => 'studi-banding-farmasi-herbal-2026', 'excerpt' => 'Prodi D3 Farmasi memperluas jejaring laboratorium sains bahan alam...', 'content' => '<p>Pengembangan obat tradisional berbasis kearifan lokal...</p>', 'category' => 'Akademik', 'status' => 'published', 'views' => 290, 'published_at' => now()->subDays(9)],
            ['title' => 'Perayaan Natal & Syukuran Akhir Tahun Civitas Akademika STIKes Panti Waluya', 'slug' => 'perayaan-natal-dan-syukuran-civitas-2026', 'excerpt' => 'Seluruh jajaran pimpinan, dosen, tendik, dan mahasiswa mempererat persaudaraan...', 'content' => '<p>Momen kebersamaan dan ucapan syukur atas pencapaian kampus...</p>', 'category' => 'Kemahasiswaan', 'status' => 'published', 'views' => 410, 'published_at' => now()->subDays(10)],
        ];
        foreach ($posts as $post) {
            Post::updateOrCreate(['slug' => $post['slug']], $post);
        }

        $facilities = [
            ['name' => 'Laboratorium Keperawatan Medikal Bedah & Maternitas', 'category' => 'Laboratorium Klinis', 'description' => 'Dilengkapi manekin simulasi pasien interaktif.'],
            ['name' => 'Laboratorium Rekam Medis & Computer Based Test (CBT)', 'category' => 'Laboratorium Digital', 'description' => '60 unit komputer praktikum SIMRS.'],
        ];
        foreach ($facilities as $fac) {
            Facility::updateOrCreate(['name' => $fac['name']], $fac);
        }

        $documents = [
            ['title' => 'Manual Mutu Akademik STIKes Panti Waluya Malang', 'document_number' => 'SPMI-STIKES-MM-2026/001', 'category' => 'Manual Mutu', 'year' => '2026'],
        ];
        foreach ($documents as $doc) {
            SpmiDocument::updateOrCreate(['title' => $doc['title']], $doc);
        }

        // 5. Menus Seeding
        $mHome = Menu::updateOrCreate(['name' => 'Beranda'], ['url' => '/', 'order' => 1]);
        $mProfil = Menu::updateOrCreate(['name' => 'Profil Kampus'], ['url' => '#', 'order' => 2]);
        Menu::updateOrCreate(['name' => 'Sejarah & Profil'], ['url' => '/halaman/sejarah-profil', 'parent_id' => $mProfil->id, 'order' => 1, 'icon' => 'fa-university']);
        Menu::updateOrCreate(['name' => 'Visi, Misi & Nilai'], ['url' => '/halaman/visi-misi', 'parent_id' => $mProfil->id, 'order' => 2, 'icon' => 'fa-bullseye']);
        Menu::updateOrCreate(['name' => 'Sambutan Ketua'], ['url' => '/halaman/sambutan-ketua', 'parent_id' => $mProfil->id, 'order' => 3, 'icon' => 'fa-user-tie']);

        $mProdi = Menu::updateOrCreate(['name' => 'Program Studi'], ['url' => '/program-studi', 'order' => 3]);
        Menu::updateOrCreate(['name' => 'D3 Keperawatan'], ['url' => '/program-studi/d3-keperawatan', 'parent_id' => $mProdi->id, 'order' => 1]);
        Menu::updateOrCreate(['name' => 'S1 Keperawatan'], ['url' => '/program-studi/s1-keperawatan', 'parent_id' => $mProdi->id, 'order' => 2]);
        Menu::updateOrCreate(['name' => 'Profesi Ners'], ['url' => '/program-studi/profesi-ners', 'parent_id' => $mProdi->id, 'order' => 3]);
        Menu::updateOrCreate(['name' => 'D3 Rekam Medis (RMIK)'], ['url' => '/program-studi/d3-rmik', 'parent_id' => $mProdi->id, 'order' => 4]);
        Menu::updateOrCreate(['name' => 'D3 Farmasi'], ['url' => '/program-studi/d3-farmasi', 'parent_id' => $mProdi->id, 'order' => 5]);

        Menu::updateOrCreate(['name' => 'Berita & Pengumuman'], ['url' => '/berita', 'order' => 4]);
        Menu::updateOrCreate(['name' => 'SPMI & Akreditasi'], ['url' => '/spmi', 'order' => 5]);
        Menu::updateOrCreate(['name' => 'Fasilitas'], ['url' => '/fasilitas', 'order' => 6]);
        Menu::updateOrCreate(['name' => 'Kontak'], ['url' => '/kontak', 'order' => 7]);

        // 6. Slides Seeding
        $slides = [
            [
                'title' => 'Penerimaan Mahasiswa Baru (PMB) T.A. 2026/2027',
                'subtitle' => 'Daftar sekarang di STIKes Panti Waluya Malang dan dapatkan beasiswa potongan SPP khusus pendaftar Gelombang I & II.',
                'badge' => 'PMB 2026/2027 DIBUKA',
                'badge_color' => 'bg-amber-500 text-slate-950',
                'image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=1920&q=80',
                'cta_text' => 'Daftar PMB Online Now',
                'cta_link' => 'https://pmb.stikespantiwaluya.ac.id',
                'secondary_text' => 'Lihat Program Studi',
                'secondary_link' => '/program-studi',
                'order' => 1,
            ],
            [
                'title' => 'Pendidikan Kesehatan Berstandar Akreditasi Unggul',
                'subtitle' => 'Menghasilkan lulusan D3/S1 Keperawatan, Profesi Ners, D3 RMIK, dan D3 Farmasi yang berkarakter Kasih dan siap kerja profesional.',
                'badge' => 'AKREDITASI INSTITUSI UNGGUL',
                'badge_color' => 'bg-blue-600 text-white',
                'image' => 'https://images.unsplash.com/photo-1551076805-e1869033e561?auto=format&fit=crop&w=1920&q=80',
                'cta_text' => 'Profil Kampus & Visi Misi',
                'cta_link' => '/halaman/visi-misi',
                'secondary_text' => 'Lihat Dokumen SPMI',
                'secondary_link' => '/spmi',
                'order' => 2,
            ],
        ];

        foreach ($slides as $s) {
            Slide::updateOrCreate(['title' => $s['title']], $s);
        }

        // 7. Counter Stats Bar Widget Seeding (Fitur Edit Widget Statistik Beranda)
        $stats = [
            [
                'value' => '5',
                'label' => 'Program Studi Pilihan',
                'color' => 'text-blue-700',
                'order' => 1,
            ],
            [
                'value' => '96%',
                'label' => 'Alumni Bekerja < 3 Bulan',
                'color' => 'text-blue-700',
                'order' => 2,
            ],
            [
                'value' => '25+',
                'label' => 'RS & Institusi Mitra Kerja',
                'color' => 'text-blue-700',
                'order' => 3,
            ],
            [
                'value' => 'Baik Sekali',
                'label' => 'Akreditasi Perguruan Tinggi',
                'color' => 'text-amber-500',
                'order' => 4,
            ],
        ];

        foreach ($stats as $st) {
            Stat::updateOrCreate(['label' => $st['label']], $st);
        }

        $this->call(AchievementSeeder::class);
        $this->call(PageSeeder::class);
    }
}
