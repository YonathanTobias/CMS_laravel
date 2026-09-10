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
                'slug' => 'sejarah-profil',
                'icon' => 'fa-university',
                'is_active' => true,
                'order' => 1,
                'content' => '
                    <div class="space-y-10">

                        <!-- Header Banner Profil -->
                        <div class="bg-gradient-to-r from-blue-900 via-slate-900 to-blue-950 text-white p-8 rounded-3xl shadow-xl space-y-3 border border-blue-800">
                            <span class="px-3.5 py-1 bg-amber-500 text-slate-950 font-extrabold text-xs rounded-full uppercase tracking-wider shadow">
                                Yayasan Pendidikan Misericordia
                            </span>
                            <h3 class="font-heading font-extrabold text-2xl sm:text-3xl text-white leading-tight">
                                Profil & Sejarah Singkat STIKes Panti Waluya Malang
                            </h3>
                            <p class="text-slate-300 text-sm leading-relaxed max-w-3xl">
                                Sekolah Tinggi Ilmu Kesehatan Panti Waluya Malang dinaungi oleh <strong>Yayasan Pendidikan Misericordia</strong>. Berkomitmen tinggi mendidik mahasiswa dengan keunggulan memiliki jiwa melayani dan peduli kepada orang lain, berwawasan global, yang berorientasi kepada pelayanan sesama.
                            </p>
                        </div>

                        <!-- Timeline Sejarah Transformasi -->
                        <div class="space-y-6">
                            <h4 class="font-heading font-bold text-slate-900 text-2xl border-b-2 border-blue-600 pb-2 flex items-center gap-2">
                                <i class="fa-solid fa-clock-rotate-left text-blue-700"></i> Perjalanan Sejarah & Akreditasi Kampus
                            </h4>

                            <div class="relative border-l-2 border-blue-500 pl-6 ml-4 space-y-6">
                                
                                <div class="relative group">
                                    <div class="absolute -left-[31px] top-1 w-4 h-4 rounded-full bg-blue-700 border-4 border-white shadow"></div>
                                    <div class="bg-slate-50 p-5 rounded-2xl border border-slate-200 shadow-sm space-y-1">
                                        <span class="px-2.5 py-0.5 bg-blue-100 text-blue-800 font-extrabold text-xs rounded-md">Tahun 1955</span>
                                        <h5 class="font-bold text-slate-900 text-base">Berdiri sebagai Djuru Kesehatan (DK)</h5>
                                        <p class="text-xs text-slate-600 leading-relaxed">
                                            Lembaga Pendidikan Keperawatan ini berdiri sejak tahun 1955 berawal dari pendidikan Djuru Kesehatan (DK) di Malang.
                                        </p>
                                    </div>
                                </div>

                                <div class="relative group">
                                    <div class="absolute -left-[31px] top-1 w-4 h-4 rounded-full bg-blue-700 border-4 border-white shadow"></div>
                                    <div class="bg-slate-50 p-5 rounded-2xl border border-slate-200 shadow-sm space-y-1">
                                        <span class="px-2.5 py-0.5 bg-blue-100 text-blue-800 font-extrabold text-xs rounded-md">Tahun 1980</span>
                                        <h5 class="font-bold text-slate-900 text-base">Konversi Menjadi Sekolah Perawat Kesehatan (SPK)</h5>
                                        <p class="text-xs text-slate-600 leading-relaxed">
                                            Dikonversi menjadi Sekolah Perawat Kesehatan (SPK) Panti Waluya Malang.
                                        </p>
                                    </div>
                                </div>

                                <div class="relative group">
                                    <div class="absolute -left-[31px] top-1 w-4 h-4 rounded-full bg-blue-700 border-4 border-white shadow"></div>
                                    <div class="bg-slate-50 p-5 rounded-2xl border border-slate-200 shadow-sm space-y-1">
                                        <span class="px-2.5 py-0.5 bg-blue-100 text-blue-800 font-extrabold text-xs rounded-md">Tahun 1997 - 1998</span>
                                        <h5 class="font-bold text-slate-900 text-base">Konversi Menjadi Akademi Perawat (Akper) Panti Waluya Malang</h5>
                                        <p class="text-xs text-slate-600 leading-relaxed">
                                            Berdasarkan Akreditasi, SPK Panti Waluya Malang dikonversi menjadi Akademi Keperawatan Panti Waluya Malang terakreditasi dengan nilai <strong>“B”</strong>.
                                        </p>
                                    </div>
                                </div>

                                <div class="relative group">
                                    <div class="absolute -left-[31px] top-1 w-4 h-4 rounded-full bg-emerald-600 border-4 border-white shadow"></div>
                                    <div class="bg-emerald-50/60 p-5 rounded-2xl border border-emerald-200 shadow-sm space-y-1">
                                        <span class="px-2.5 py-0.5 bg-emerald-100 text-emerald-800 font-extrabold text-xs rounded-md">Januari 2008</span>
                                        <h5 class="font-bold text-emerald-900 text-base">Akreditasi Depkes Nilai Strata "A"</h5>
                                        <p class="text-xs text-slate-600 leading-relaxed">
                                            Akademi Keperawatan Panti Waluya Malang berhasil meraih Akreditasi Depkes dengan nilai <strong>Strata "A"</strong>.
                                        </p>
                                    </div>
                                </div>

                                <div class="relative group">
                                    <div class="absolute -left-[31px] top-1 w-4 h-4 rounded-full bg-blue-700 border-4 border-white shadow"></div>
                                    <div class="bg-slate-50 p-5 rounded-2xl border border-slate-200 shadow-sm space-y-1">
                                        <span class="px-2.5 py-0.5 bg-blue-100 text-blue-800 font-extrabold text-xs rounded-md">Tahun 2015</span>
                                        <h5 class="font-bold text-slate-900 text-base">Akreditasi BAN-PT Nilai Strata "B"</h5>
                                        <p class="text-xs text-slate-600 leading-relaxed">
                                            Terakreditasi institusi dengan nilai strata <strong>“B” oleh BAN-PT</strong> berdasarkan SK Nomor: <em>941/SK/BAN-PT/Akred/PT/VIII/2015</em>.
                                        </p>
                                    </div>
                                </div>

                                <div class="relative group">
                                    <div class="absolute -left-[31px] top-1 w-4 h-4 rounded-full bg-amber-500 border-4 border-white shadow"></div>
                                    <div class="bg-amber-50/80 p-5 rounded-2xl border border-amber-200 shadow-sm space-y-2">
                                        <span class="px-2.5 py-0.5 bg-amber-200 text-amber-900 font-extrabold text-xs rounded-md">Tahun 2016</span>
                                        <h5 class="font-bold text-amber-950 text-base">Akreditasi LAM-PTKes & Prestasi PTS Unggulan Ke-2</h5>
                                        <p class="text-xs text-slate-700 leading-relaxed">
                                            &bull; Terakreditasi nilai strata <strong>”B” oleh LAM-PTKes</strong> untuk Prodi Keperawatan (SK No: <em>0581/LAM-PTKes/Akr/Dip/V/2016</em>).<br>
                                            &bull; Meraih <strong>Peringkat ke-2 Perguruan Tinggi Swasta Unggulan [Bentuk Akademi] Tahun 2016</strong> di lingkungan Kopertis Wilayah VII Jawa Timur (SK No: <em>063/K7/SK/KL/2016</em>).
                                        </p>
                                    </div>
                                </div>

                                <div class="relative group">
                                    <div class="absolute -left-[31px] top-1 w-4 h-4 rounded-full bg-blue-900 border-4 border-white shadow"></div>
                                    <div class="bg-blue-900 text-white p-6 rounded-2xl shadow-md space-y-2">
                                        <span class="px-2.5 py-0.5 bg-amber-400 text-slate-950 font-extrabold text-xs rounded-md">September 2018 - Sekarang</span>
                                        <h5 class="font-bold text-xl text-white">Transformasi Menjadi Sekolah Tinggi Ilmu Kesehatan (STIKes)</h5>
                                        <p class="text-xs text-blue-100 leading-relaxed">
                                            Resmi berkembang menjadi <strong>Sekolah Tinggi Ilmu Kesehatan Panti Waluya Malang</strong>, membuka berbagai program studi unggulan vokasi dan sarjana.
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Galeri Dokumentasi Foto Sejarah -->
                        <div class="space-y-4 pt-4">
                            <h4 class="font-heading font-bold text-slate-900 text-2xl border-b-2 border-amber-500 pb-2 flex items-center gap-2">
                                <i class="fa-solid fa-camera-retro text-amber-500"></i> Galeri Dokumentasi Sejarah (1955 - 1980-an)
                            </h4>
                            <p class="text-xs text-slate-500">Dokumentasi bersejarah perjalanan suster pendiri, staf pengajar, dan para perawat generasi awal STIKes Panti Waluya Malang.</p>

                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                <div class="group rounded-2xl overflow-hidden border border-slate-200 bg-slate-900 shadow-sm hover:shadow-md transition">
                                    <div class="h-48 overflow-hidden">
                                        <img src="/images/sejarah/sejarah-1.png" alt="Dokumentasi Sejarah 1" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                    </div>
                                    <div class="p-3 bg-white text-xs font-semibold text-slate-700">
                                        Suster Pendiri & Staf Pengajar Perawat
                                    </div>
                                </div>

                                <div class="group rounded-2xl overflow-hidden border border-slate-200 bg-slate-900 shadow-sm hover:shadow-md transition">
                                    <div class="h-48 overflow-hidden">
                                        <img src="/images/sejarah/sejarah-2.png" alt="Dokumentasi Sejarah 2" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                    </div>
                                    <div class="p-3 bg-white text-xs font-semibold text-slate-700">
                                        Kebersamaan Siswa Perawat Generasi Awal
                                    </div>
                                </div>

                                <div class="group rounded-2xl overflow-hidden border border-slate-200 bg-slate-900 shadow-sm hover:shadow-md transition">
                                    <div class="h-48 overflow-hidden">
                                        <img src="/images/sejarah/sejarah-3.png" alt="Dokumentasi Sejarah 3" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                    </div>
                                    <div class="p-3 bg-white text-xs font-semibold text-slate-700">
                                        Foto Bersama Angkatan Sekolah Perawat
                                    </div>
                                </div>

                                <div class="group rounded-2xl overflow-hidden border border-slate-200 bg-slate-900 shadow-sm hover:shadow-md transition">
                                    <div class="h-48 overflow-hidden">
                                        <img src="/images/sejarah/sejarah-4.png" alt="Dokumentasi Sejarah 4" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                    </div>
                                    <div class="p-3 bg-white text-xs font-semibold text-slate-700">
                                        Perayaan HUT 50 Tahun Institusi (1929-1979)
                                    </div>
                                </div>

                                <div class="group rounded-2xl overflow-hidden border border-slate-200 bg-slate-900 shadow-sm hover:shadow-md transition sm:col-span-2 lg:col-span-1">
                                    <div class="h-48 overflow-hidden">
                                        <img src="/images/sejarah/sejarah-5.png" alt="Dokumentasi Sejarah 5" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                    </div>
                                    <div class="p-3 bg-white text-xs font-semibold text-slate-700">
                                        Acara Bersama & Ramah Tamah Civitas
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Banner Komitmen Pelayanan -->
                        <div class="bg-blue-50 border border-blue-200 rounded-3xl p-6 flex flex-col sm:flex-row items-center gap-6">
                            <div class="w-16 h-16 rounded-2xl bg-blue-700 text-white flex items-center justify-center text-3xl shrink-0 shadow-md">
                                <i class="fa-solid fa-hand-holding-heart"></i>
                            </div>
                            <div class="space-y-1">
                                <h5 class="font-heading font-bold text-slate-900 text-lg">Komitmen Pelayanan Kasih & Wawasan Global</h5>
                                <p class="text-xs text-slate-600 leading-relaxed">
                                    Sekolah Tinggi Ilmu Kesehatan Panti Waluya Malang merupakan lembaga pendidikan tinggi yang berkomitmen tinggi untuk mendidik mahasiswa dengan keunggulan memiliki jiwa melayani dan peduli kepada orang lain, berwawasan global, yang berorientasi kepada pelayanan sesama.
                                </p>
                            </div>
                        </div>

                    </div>
                ',
            ],
            [
                'title' => 'Visi, Misi & Nilai Dasar DIC4',
                'slug' => 'visi-misi',
                'icon' => 'fa-bullseye',
                'is_active' => true,
                'order' => 2,
                'content' => '
                    <div class="space-y-10">
                        <!-- 1. Visi Utama Kampus -->
                        <div class="bg-gradient-to-r from-blue-900 via-slate-900 to-blue-950 text-white p-8 rounded-3xl shadow-xl space-y-4 border border-blue-800">
                            <span class="px-3.5 py-1 bg-amber-500 text-slate-950 font-extrabold text-xs rounded-full uppercase tracking-wider shadow">Visi Utama Kampus</span>
                            <h3 class="font-heading font-extrabold text-xl sm:text-2xl leading-relaxed text-amber-100">
                                “Menjadi pendidikan tinggi kesehatan yang menghasilkan tenaga kesehatan yang profesional, unggul, berkarakter nilai-nilai Misericordia, dan mampu berkiprah di tingkat Internasional pada tahun 2045.”
                            </h3>
                        </div>

                        <!-- 2. Misi Kampus -->
                        <div class="space-y-4">
                            <h4 class="font-heading font-bold text-slate-900 text-2xl border-b-2 border-blue-600 pb-2 flex items-center gap-2">
                                <i class="fa-solid fa-bullseye text-blue-700"></i> Misi Kampus STIKes Panti Waluya
                            </h4>
                            <ol class="space-y-3 text-slate-700 text-sm leading-relaxed">
                                <li class="flex items-start gap-3 bg-slate-50 p-4 rounded-2xl border border-slate-200 shadow-sm">
                                    <span class="w-7 h-7 rounded-lg bg-blue-700 text-white font-extrabold text-xs flex items-center justify-center shrink-0 shadow">1</span>
                                    <span>Melaksanakan tata pamong dan tata kelola perguruan tinggi kesehatan yang bersinergi, sehat dan bermutu dengan pemanfaatan digitalisasi dan teknologi informasi.</span>
                                </li>
                                <li class="flex items-start gap-3 bg-slate-50 p-4 rounded-2xl border border-slate-200 shadow-sm">
                                    <span class="w-7 h-7 rounded-lg bg-blue-700 text-white font-extrabold text-xs flex items-center justify-center shrink-0 shadow">2</span>
                                    <span>Menyelenggarakan pendidikan dalam bidang kesehatan untuk menghasilkan lulusan tenaga kesehatan yang profesional, unggul dan mampu berkiprah di lingkup internasional.</span>
                                </li>
                                <li class="flex items-start gap-3 bg-slate-50 p-4 rounded-2xl border border-slate-200 shadow-sm">
                                    <span class="w-7 h-7 rounded-lg bg-blue-700 text-white font-extrabold text-xs flex items-center justify-center shrink-0 shadow">3</span>
                                    <span>Menyelenggarakan penelitian dan pengabdian masyarakat yang bermanfaat bagi pengembangan ilmu pengetahuan di bidang Kesehatan.</span>
                                </li>
                                <li class="flex items-start gap-3 bg-slate-50 p-4 rounded-2xl border border-slate-200 shadow-sm">
                                    <span class="w-7 h-7 rounded-lg bg-blue-700 text-white font-extrabold text-xs flex items-center justify-center shrink-0 shadow">4</span>
                                    <span>Mengembangkan budaya organisasi berdasarkan karakter nilai-nilai Misericordia.</span>
                                </li>
                                <li class="flex items-start gap-3 bg-slate-50 p-4 rounded-2xl border border-slate-200 shadow-sm">
                                    <span class="w-7 h-7 rounded-lg bg-blue-700 text-white font-extrabold text-xs flex items-center justify-center shrink-0 shadow">5</span>
                                    <span>Mengembangkan jejaring alumni dan mitra kerja sama di dalam dan luar negeri untuk meningkatkan mutu lulusan.</span>
                                </li>
                            </ol>
                        </div>

                        <!-- 3. Tujuan STIKes Panti Waluya Malang -->
                        <div class="space-y-4 pt-2">
                            <h4 class="font-heading font-bold text-slate-900 text-2xl border-b-2 border-emerald-600 pb-2 flex items-center gap-2">
                                <i class="fa-solid fa-crosshairs text-emerald-600"></i> Tujuan STIKes Panti Waluya Malang
                            </h4>
                            <ol class="space-y-3 text-slate-700 text-sm leading-relaxed">
                                <li class="flex items-start gap-3 bg-emerald-50/50 p-4 rounded-2xl border border-emerald-200/80 shadow-sm">
                                    <span class="w-7 h-7 rounded-lg bg-emerald-600 text-white font-extrabold text-xs flex items-center justify-center shrink-0 shadow">1</span>
                                    <span>Terselenggaranya tata pamong dan tata kelola pendidikan tinggi yang sehat, bermutu, efektif dan efisien dengan memanfaatkan digitalisasi dan teknologi informasi.</span>
                                </li>
                                <li class="flex items-start gap-3 bg-emerald-50/50 p-4 rounded-2xl border border-emerald-200/80 shadow-sm">
                                    <span class="w-7 h-7 rounded-lg bg-emerald-600 text-white font-extrabold text-xs flex items-center justify-center shrink-0 shadow">2</span>
                                    <span>Dihasilkannya lulusan yang profesional dan unggul dalam bidang kesehatan serta mampu berkiprah di lingkup internasional.</span>
                                </li>
                                <li class="flex items-start gap-3 bg-emerald-50/50 p-4 rounded-2xl border border-emerald-200/80 shadow-sm">
                                    <span class="w-7 h-7 rounded-lg bg-emerald-600 text-white font-extrabold text-xs flex items-center justify-center shrink-0 shadow">3</span>
                                    <span>Terlaksananya penelitian dan pengabdian masyarakat yang bermanfaat bagi pengembangan ilmu pengetahuan di bidang Kesehatan.</span>
                                </li>
                                <li class="flex items-start gap-3 bg-emerald-50/50 p-4 rounded-2xl border border-emerald-200/80 shadow-sm">
                                    <span class="w-7 h-7 rounded-lg bg-emerald-600 text-white font-extrabold text-xs flex items-center justify-center shrink-0 shadow">4</span>
                                    <span>Terwujudnya budaya organisasi DIC4 (Discipline, Innovative, Communicative, Competence, Creative, Collaborative) berdasarkan karakter nilai-nilai Misericordia di semua bidang.</span>
                                </li>
                                <li class="flex items-start gap-3 bg-emerald-50/50 p-4 rounded-2xl border border-emerald-200/80 shadow-sm">
                                    <span class="w-7 h-7 rounded-lg bg-emerald-600 text-white font-extrabold text-xs flex items-center justify-center shrink-0 shadow">5</span>
                                    <span>Terselenggaranya jejaring alumni dan mitra kerjasama di dalam dan luar negeri untuk meningkatkan mutu lulusan.</span>
                                </li>
                            </ol>
                        </div>

                        <!-- 4. Sasaran STIKes Panti Waluya Malang -->
                        <div class="space-y-4 pt-2">
                            <h4 class="font-heading font-bold text-slate-900 text-2xl border-b-2 border-sky-600 pb-2 flex items-center gap-2">
                                <i class="fa-solid fa-compass text-sky-600"></i> Sasaran Strategis STIKes Panti Waluya Malang
                            </h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                <div class="p-4 bg-sky-50/80 rounded-2xl border border-sky-200 shadow-sm flex items-center gap-3">
                                    <span class="w-9 h-9 rounded-xl bg-sky-600 text-white font-black text-sm flex items-center justify-center shrink-0 shadow">1</span>
                                    <div>
                                        <div class="font-bold text-slate-900 text-sm">Pendidikan</div>
                                        <div class="text-xs text-slate-600">Kurikulum, Mahasiswa & Alumni</div>
                                    </div>
                                </div>

                                <div class="p-4 bg-sky-50/80 rounded-2xl border border-sky-200 shadow-sm flex items-center gap-3">
                                    <span class="w-9 h-9 rounded-xl bg-sky-600 text-white font-black text-sm flex items-center justify-center shrink-0 shadow">2</span>
                                    <div>
                                        <div class="font-bold text-slate-900 text-sm">Riset & Pengabdian</div>
                                        <div class="text-xs text-slate-600">Penelitian & Pengabdian Masyarakat</div>
                                    </div>
                                </div>

                                <div class="p-4 bg-sky-50/80 rounded-2xl border border-sky-200 shadow-sm flex items-center gap-3">
                                    <span class="w-9 h-9 rounded-xl bg-sky-600 text-white font-black text-sm flex items-center justify-center shrink-0 shadow">3</span>
                                    <div>
                                        <div class="font-bold text-slate-900 text-sm">Sumber Daya Manusia</div>
                                        <div class="text-xs text-slate-600">Dosen, Tenaga Kependidikan & Staf</div>
                                    </div>
                                </div>

                                <div class="p-4 bg-sky-50/80 rounded-2xl border border-sky-200 shadow-sm flex items-center gap-3">
                                    <span class="w-9 h-9 rounded-xl bg-sky-600 text-white font-black text-sm flex items-center justify-center shrink-0 shadow">4</span>
                                    <div>
                                        <div class="font-bold text-slate-900 text-sm">Fasilitas & Keuangan</div>
                                        <div class="text-xs text-slate-600">Keuangan, Sarana Prasarana & IT</div>
                                    </div>
                                </div>

                                <div class="p-4 bg-sky-50/80 rounded-2xl border border-sky-200 shadow-sm flex items-center gap-3">
                                    <span class="w-9 h-9 rounded-xl bg-sky-600 text-white font-black text-sm flex items-center justify-center shrink-0 shadow">5</span>
                                    <div>
                                        <div class="font-bold text-slate-900 text-sm">Tata Kelola Kampus</div>
                                        <div class="text-xs text-slate-600">Tata Kelola & Tata Pamong</div>
                                    </div>
                                </div>

                                <div class="p-4 bg-sky-50/80 rounded-2xl border border-sky-200 shadow-sm flex items-center gap-3">
                                    <span class="w-9 h-9 rounded-xl bg-sky-600 text-white font-black text-sm flex items-center justify-center shrink-0 shadow">6</span>
                                    <div>
                                        <div class="font-bold text-slate-900 text-sm">Kemitraan</div>
                                        <div class="text-xs text-slate-600">Kerja Sama Dalam & Luar Negeri</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 5. Nilai-Nilai Dasar Misericordia -->
                        <div class="space-y-4 pt-2">
                            <h4 class="font-heading font-bold text-slate-900 text-2xl border-b-2 border-blue-800 pb-2 flex items-center gap-2">
                                <i class="fa-solid fa-award text-blue-700"></i> Nilai-Nilai Dasar Misericordia
                            </h4>
                            <p class="text-xs text-slate-500">Pedoman nilai Katolik universal yang bersifat universal dan berbelas kasih dalam seluruh penyelenggaraan pendidikan kesehatan.</p>
                            
                            <!-- Banner Poster Utuh (2 Gambar Bersambung Lokal) -->
                            <div class="rounded-3xl overflow-hidden shadow-xl border border-slate-200 bg-slate-900 space-y-0">
                                <img src="/images/dasar-misc.jpg" alt="Nilai Dasar Misericordia - Poster Atas" class="w-full h-auto object-contain max-h-[700px] mx-auto block">
                                <img src="/images/dasar-misc_point.jpg" alt="Nilai Dasar Misericordia - Poin" class="w-full h-auto object-contain max-h-[700px] mx-auto block -mt-1">
                            </div>
                        </div>

                        <!-- 6. Budaya Organisasi DIC4 -->
                        <div class="space-y-6 pt-2">
                            <h4 class="font-heading font-bold text-slate-900 text-2xl border-b-2 border-amber-500 pb-2 flex items-center gap-2">
                                <i class="fa-solid fa-heart-pulse text-amber-500"></i> Budaya Organisasi DIC4
                            </h4>
                            <p class="text-xs text-slate-500">Karakter dan budaya kerja utama seluruh sivitas akademika STIKes Panti Waluya Malang.</p>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                <div class="p-5 bg-blue-50/90 rounded-2xl border border-blue-200 shadow-sm space-y-2">
                                    <div class="flex items-center gap-2 text-blue-900 font-extrabold text-lg">
                                        <span class="w-8 h-8 rounded-xl bg-blue-700 text-white flex items-center justify-center text-sm font-black shadow">D</span>
                                        Discipline
                                    </div>
                                    <p class="text-xs text-slate-600 leading-relaxed">
                                        Disiplin tinggi dalam melaksanakan tugas, tanggung jawab, dan tata tertib akademik/profesi kesehatan.
                                    </p>
                                </div>

                                <div class="p-5 bg-amber-50/90 rounded-2xl border border-amber-200 shadow-sm space-y-2">
                                    <div class="flex items-center gap-2 text-amber-900 font-extrabold text-lg">
                                        <span class="w-8 h-8 rounded-xl bg-amber-500 text-slate-950 flex items-center justify-center text-sm font-black shadow">I</span>
                                        Innovative
                                    </div>
                                    <p class="text-xs text-slate-600 leading-relaxed">
                                        Inovatif dalam mengadaptasi solusi baru, riset kesehatan, dan teknologi pelayanan medis modern.
                                    </p>
                                </div>

                                <div class="p-5 bg-emerald-50/90 rounded-2xl border border-emerald-200 shadow-sm space-y-2">
                                    <div class="flex items-center gap-2 text-emerald-900 font-extrabold text-lg">
                                        <span class="w-8 h-8 rounded-xl bg-emerald-600 text-white flex items-center justify-center text-sm font-black shadow">C</span>
                                        Communicative
                                    </div>
                                    <p class="text-xs text-slate-600 leading-relaxed">
                                        Berkomunikasi efektif dan empati tinggi kepada pasien, keluarga, tim medis, dan masyarakat.
                                    </p>
                                </div>

                                <div class="p-5 bg-sky-50/90 rounded-2xl border border-sky-200 shadow-sm space-y-2">
                                    <div class="flex items-center gap-2 text-sky-900 font-extrabold text-lg">
                                        <span class="w-8 h-8 rounded-xl bg-sky-600 text-white flex items-center justify-center text-sm font-black shadow">C</span>
                                        Competent
                                    </div>
                                    <p class="text-xs text-slate-600 leading-relaxed">
                                        Kompeten secara klinis dan keilmuan sesuai standar keahlian profesi kesehatan internasional.
                                    </p>
                                </div>

                                <div class="p-5 bg-purple-50/90 rounded-2xl border border-purple-200 shadow-sm space-y-2">
                                    <div class="flex items-center gap-2 text-purple-900 font-extrabold text-lg">
                                        <span class="w-8 h-8 rounded-xl bg-purple-600 text-white flex items-center justify-center text-sm font-black shadow">C</span>
                                        Creative
                                    </div>
                                    <p class="text-xs text-slate-600 leading-relaxed">
                                        Kreatif dalam menyelesaikan tantangan medis dan beradaptasi dengan dinamika kebutuhan pelayanan.
                                    </p>
                                </div>

                                <div class="p-5 bg-indigo-50/90 rounded-2xl border border-indigo-200 shadow-sm space-y-2">
                                    <div class="flex items-center gap-2 text-indigo-900 font-extrabold text-lg">
                                        <span class="w-8 h-8 rounded-xl bg-indigo-600 text-white flex items-center justify-center text-sm font-black shadow">C</span>
                                        Collaborative
                                    </div>
                                    <p class="text-xs text-slate-600 leading-relaxed">
                                        Kolaboratif antar-profesi kesehatan (Interprofessional Collaboration) untuk keselamatan & kesehatan pasien.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                ',
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
                ',
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
                ',
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
                ',
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
                ',
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
                ',
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
                ',
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
                ',
            ],
        ];

        foreach ($pages as $p) {
            Page::updateOrCreate(['slug' => $p['slug']], $p);
        }
    }
}
