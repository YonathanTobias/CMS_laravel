<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'title' => 'Profil & Sejarah Kampus STIKes Panti Waluya Malang',
                'slug' => 'profil',
                'icon' => 'fa-university',
                'is_active' => true,
                'order' => 1,
                'content' => '
                    <div class="space-y-6">
                        <div class="p-6 bg-blue-50 border border-blue-200 rounded-2xl">
                            <h3 class="font-bold text-blue-900 text-lg mb-2">Sekolah Tinggi Ilmu Kesehatan Panti Waluya Malang</h3>
                            <p class="text-sm text-slate-700 leading-relaxed">Sekolah Tinggi Ilmu Kesehatan Panti Waluya Malang adalah institusi pendidikan kesehatan swasta terkemuka di Kota Malang, Jawa Timur, yang berkomitmen melahirkan tenaga kesehatan profesional, adaptif, dan berkarakter kasih.</p>
                        </div>
                        <h4 class="font-bold text-slate-900 text-xl">Sejarah Singkat</h4>
                        <p class="text-slate-700 leading-relaxed">Berawal dari Akademi Keperawatan Panti Waluya Malang, institusi ini berkembang pesat hingga bertransformasi menjadi Sekolah Tinggi Ilmu Kesehatan (STIKes) Panti Waluya Malang. Dengan pengalaman puluhan tahun mendidik ribuan alumni yang kini tersebar di berbagai rumah sakit pemerintah, swasta, dan internasional.</p>
                        <h4 class="font-bold text-slate-900 text-xl">Fasilitas & Keunggulan</h4>
                        <ul class="list-disc list-inside space-y-2 text-slate-700">
                            <li>Laboratorium Medikal Bedah & Maternitas Terstandar Nasional</li>
                            <li>Laboratorium CBT (Computer Based Test) & Sistem SIMRS Digital</li>
                            <li>Kerjasama Klinis dengan Rumah Sakit Tipe A & B di Jawa Timur</li>
                            <li>Kurikulum Vokasi & Akademik berbasis Budaya Organisasi DIC4</li>
                        </ul>
                    </div>
                '
            ],
            [
                'title' => 'Visi, Misi & Nilai Dasar DIC4',
                'slug' => 'visi-misi',
                'icon' => 'fa-bullseye',
                'is_active' => true,
                'order' => 2,
                'content' => '
                    <div class="space-y-6">
                        <div class="bg-gradient-to-r from-blue-900 to-navy-950 text-white p-8 rounded-3xl shadow-lg space-y-3">
                            <span class="px-3 py-1 bg-amber-500 text-slate-950 font-extrabold text-xs rounded-full uppercase">Visi Utama</span>
                            <h3 class="font-bold text-2xl">"Menjadi Sekolah Tinggi Ilmu Kesehatan yang Unggul, Berkarakter Kasih, dan Berdaya Saing di Tingkat Nasional & Internasional"</h3>
                        </div>
                        <h4 class="font-bold text-slate-900 text-xl border-b border-slate-200 pb-2">Misi Kampus</h4>
                        <ol class="list-decimal list-inside space-y-3 text-slate-700">
                            <li>Menyelenggarakan pendidikan kesehatan yang berkualitas tinggi mengintegrasikan IPTEK medis terkini.</li>
                            <li>Melakukan penelitian ilmiah yang aplikatif di bidang ilmu keperawatan, rekam medis, dan farmasi.</li>
                            <li>Melaksanakan pengabdian kepada masyarakat dalam meningkatkan derajat kesehatan publik.</li>
                            <li>Menanamkan nilai-nilai etik, moral, dan karakter pelayanan kasih kepada sesama.</li>
                        </ol>
                        <h4 class="font-bold text-slate-900 text-xl border-b border-slate-200 pb-2">Budaya Organisasi DIC4</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="p-4 bg-slate-50 rounded-xl border border-slate-200">
                                <div class="font-bold text-blue-700 text-base">Discipline</div>
                                <div class="text-xs text-slate-600">Disiplin tinggi dalam bertindak, belajar, dan beretika medis.</div>
                            </div>
                            <div class="p-4 bg-slate-50 rounded-xl border border-slate-200">
                                <div class="font-bold text-blue-700 text-base">Innovative</div>
                                <div class="text-xs text-slate-600">Selalu berinovasi memanfaatkan teknologi kesehatan modern.</div>
                            </div>
                            <div class="p-4 bg-slate-50 rounded-xl border border-slate-200">
                                <div class="font-bold text-blue-700 text-base">Communicative</div>
                                <div class="text-xs text-slate-600">Berkomunikasi efektif dan empati tinggi kepada pasien.</div>
                            </div>
                            <div class="p-4 bg-slate-50 rounded-xl border border-slate-200">
                                <div class="font-bold text-blue-700 text-base">Competent, Creative & Collaborative</div>
                                <div class="text-xs text-slate-600">Kompeten secara klinis, kreatif dalam solusi, dan kolaboratif antar-profesi.</div>
                            </div>
                        </div>
                    </div>
                '
            ],
            [
                'title' => 'Sambutan Ketua STIKes Panti Waluya',
                'slug' => 'sambutan-ketua',
                'icon' => 'fa-user-tie',
                'is_active' => true,
                'order' => 3,
                'content' => '
                    <div class="space-y-6">
                        <div class="flex flex-col sm:flex-row gap-6 items-center bg-slate-50 p-6 rounded-3xl border border-slate-200">
                            <div class="w-32 h-32 rounded-2xl bg-blue-900 overflow-hidden shrink-0 shadow-md">
                                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="font-bold text-slate-900 text-xl">Selamat Datang di STIKes Panti Waluya Malang</h3>
                                <p class="text-xs text-blue-700 font-bold mb-2">Pesan & Pengantar Ketua STIKes</p>
                                <p class="text-sm text-slate-600 leading-relaxed">"Pendidikan kesehatan bukan hanya tentang mentransfer pengetahuan klinis, tetapi tentang membentuk jiwa kepedulian dan keahlian yang menyelamatkan nyawa sesama."</p>
                            </div>
                        </div>
                        <p class="text-slate-700 leading-relaxed">Salam sejahtera untuk kita semua. Selamat datang di portal resmi Sekolah Tinggi Ilmu Kesehatan Panti Waluya Malang. Kami merasa bangga dapat menyambut para calon mahasiswa, orang tua, alumni, dan seluruh pemangku kepentingan yang ingin mengenal institusi kami lebih dekat.</p>
                        <p class="text-slate-700 leading-relaxed">Di era transformasi digital kesehatan saat ini, STIKes Panti Waluya Malang terus beradaptasi dengan menghadirkan sarana praktikum modern, kurikulum adaptif, serta pengajar praktisi senior di bidang keperawatan, rekam medis digital, dan kefarmasian.</p>
                    </div>
                '
            ],
            [
                'title' => 'Kemahasiswaan, BEM & UKM',
                'slug' => 'kemahasiswaan',
                'icon' => 'fa-users',
                'is_active' => true,
                'order' => 4,
                'content' => '
                    <div class="space-y-6">
                        <div class="p-6 bg-blue-50 border border-blue-200 rounded-2xl">
                            <h3 class="font-bold text-blue-900 text-lg mb-2">Pengembangan Bakat & Organisasi Kemahasiswaan</h3>
                            <p class="text-sm text-slate-700 leading-relaxed">STIKes Panti Waluya Malang menyediakan wadah organisasi mahasiswa yang aktif untuk mengasah kepemimpinan, bakat seni, olahraga, dan kegiatan sosial kemanusiaan.</p>
                        </div>
                        <h4 class="font-bold text-slate-900 text-xl border-b border-slate-200 pb-2">Badan Eksekutif Mahasiswa (BEM) & UKM</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            <div class="p-4 bg-white rounded-xl border border-slate-200 shadow-sm">
                                <div class="font-bold text-slate-900 text-sm mb-1"><i class="fa-solid fa-hand-holding-medical text-blue-600 mr-1.5"></i> UKM KSR & PMI</div>
                                <div class="text-xs text-slate-600">Korps Sukarela & Pelayanan Kemanusiaan Donor Darah.</div>
                            </div>
                            <div class="p-4 bg-white rounded-xl border border-slate-200 shadow-sm">
                                <div class="font-bold text-slate-900 text-sm mb-1"><i class="fa-solid fa-volleyball text-emerald-600 mr-1.5"></i> UKM Olahraga & Seni</div>
                                <div class="text-xs text-slate-600">Voli, Futsal, Paduan Suara, dan Tari Tradisional.</div>
                            </div>
                            <div class="p-4 bg-white rounded-xl border border-slate-200 shadow-sm">
                                <div class="font-bold text-slate-900 text-sm mb-1"><i class="fa-solid fa-code text-indigo-600 mr-1.5"></i> UKM Riset & Publikasi</div>
                                <div class="text-xs text-slate-600">Klub Karya Tulis Ilmiah & Lomba Nasional.</div>
                            </div>
                        </div>
                    </div>
                '
            ],
            [
                'title' => 'Informasi Beasiswa PMB Online',
                'slug' => 'beasiswa',
                'icon' => 'fa-graduation-cap',
                'is_active' => true,
                'order' => 5,
                'content' => '
                    <div class="space-y-6">
                        <div class="bg-amber-50 p-6 rounded-2xl border border-amber-200">
                            <h3 class="font-bold text-amber-900 text-lg mb-2">Program Beasiswa Pendidikan STIKes Panti Waluya</h3>
                            <p class="text-sm text-slate-700 leading-relaxed">Kami mendukung calon mahasiswa berprestasi dan berdedikasi melalui berbagai pilihan beasiswa potongan biaya studi.</p>
                        </div>
                        <h4 class="font-bold text-slate-900 text-xl">Pilihan Jalur Beasiswa:</h4>
                        <ul class="list-disc list-inside space-y-2 text-slate-700">
                            <li><strong>Beasiswa Rapor & Akademik</strong>: Potongan DPP bagi lulusan SMA/SMK dengan nilai rapor rata-rata &ge; 80.</li>
                            <li><strong>Beasiswa Prestasi Olahraga & Seni</strong>: Bebas biaya pendaftaran bagi peraih juara lomba minimal tingkat kota/kabupaten.</li>
                            <li><strong>Beasiswa KIP-Kuliah</strong>: Pengajuan bantuan biaya pendidikan bagi mahasiswa penerima KIP Pemerintah.</li>
                        </ul>
                    </div>
                '
            ],
            [
                'title' => 'Akreditasi Perguruan Tinggi & Institusi',
                'slug' => 'akreditasi',
                'icon' => 'fa-award',
                'is_active' => true,
                'order' => 6,
                'content' => '
                    <div class="space-y-6">
                        <div class="p-6 bg-emerald-50 border border-emerald-200 rounded-2xl">
                            <h3 class="font-bold text-emerald-900 text-lg mb-2">Terakreditasi Resmi BAN-PT & LAM-PTKes</h3>
                            <p class="text-sm text-slate-700 leading-relaxed">Seluruh program studi di STIKes Panti Waluya Malang telah mengantongi sertifikasi akreditasi resmi dari Badan Akreditasi Nasional Perguruan Tinggi (BAN-PT) dan Lembaga Akreditasi Mandiri Pendidikan Tinggi Kesehatan (LAM-PTKes).</p>
                        </div>
                    </div>
                '
            ],
            [
                'title' => 'Kerjasama & Mitra Rumah Sakit',
                'slug' => 'kerjasama',
                'icon' => 'fa-handshake',
                'is_active' => true,
                'order' => 7,
                'content' => '
                    <div class="space-y-6">
                        <p class="text-slate-700 leading-relaxed">STIKes Panti Waluya Malang menjalin kemitraan strategis dengan puluhan Rumah Sakit Tipe A, Tipe B, Puskesmas, Klinik Medis, dan Industri Farmasi di seluruh Indonesia untuk tempat praktik klinis dan rekrutmen lulusan kerja langsung.</p>
                    </div>
                '
            ],
            [
                'title' => 'Ikatan Alumni & Karir',
                'slug' => 'alumni',
                'icon' => 'fa-briefcase',
                'is_active' => true,
                'order' => 8,
                'content' => '
                    <div class="space-y-6">
                        <p class="text-slate-700 leading-relaxed">Wadah komunikasi alumni STIKes Panti Waluya Malang. Lebih dari 96% alumni kami terserap bekerja dalam waktu kurang dari 3 bulan setelah lulus.</p>
                    </div>
                '
            ],
            [
                'title' => 'Struktur Organisasi STIKes Panti Waluya',
                'slug' => 'struktur-organisasi',
                'icon' => 'fa-sitemap',
                'is_active' => true,
                'order' => 9,
                'content' => '
                    <div class="space-y-6">
                        <p class="text-slate-700 leading-relaxed">Struktur kepemimpinan dan tata kelola Sekolah Tinggi Ilmu Kesehatan Panti Waluya Malang yang profesional, akuntabel, dan transparan.</p>
                    </div>
                '
            ],
        ];

        foreach ($pages as $p) {
            Page::updateOrCreate(['slug' => $p['slug']], $p);
        }
    }
}
