# CMS STIKes Panti Waluya Malang

Sistem Manajemen Konten (CMS) dan Website Resmi **Sekolah Tinggi Ilmu Kesehatan (STIKes) Panti Waluya Malang** berbasis Laravel & Tailwind CSS.

---

## 🚀 Fitur Utama Website & Admin CMS

1. **Tampilan Beranda Utama Modern (8 Seksi)**:
   - **Hero Image Carousel Slider** (Slide banner interaktif otomatis).
   - **Ribbon Tagline Banner Blue Accent**.
   - **Info PMB Online Widget Callout** (100% dinamis dari Admin Settings).
   - **Berita & Kegiatan Terbaru Carousel Slider** (10 Berita terbaru dengan tombol panah navigasi).
   - **Prestasi Civitas Akademika Carousel Slider** (10 Item Ucapan Selamat atas Sertifikasi Dosen, Satgas PPKS Baru, & Kejuaraan Mahasiswa + Fullscreen Lightbox Zoom).
   - **Profil Kampus & Sekilas Mengenai Kami** (Foto Gedung Utama, Visi, Akreditasi Institusi).
   - **Dedicated Standalone Widget Sertifikat Akreditasi & Piagam Institusi** (Carousel Slider dokumen legalitas BAN-PT, LAM-PTKes, LLDIKTI VII, & Kemenkes RI).
   - **Organizational Culture "DIC4" Banner**.
   - **Program Studi & Sertifikat Akreditasi Utuh** (D3 Keperawatan, S1 Keperawatan, Profesi Ners, D3 RMIK, D3 Farmasi).
   - **8 Circle Action Icon Grid Layanan Digital Kampus** (PMB, LMS, CBT, E-Library, SPMI, Jurnal, Lab).

2. **Fitur Interactive Dark Mode & Light Mode Switcher**:
   - Tersedia tombol sakelar **`Mode Terang (☀️)`** / **`Mode Gelap (🌙)`** di header Admin CMS dan Navbar Publik.
   - Pilihan tema tersimpan secara konsisten di `localStorage` browser.

3. **Modul Pengaturan CMS Terpadu (`/admin/settings`)**:
   - Pengaturan Pengumuman Running Text Top Bar Header.
   - Pengaturan Isi Widget Info PMB Online.
   - Pengaturan Embed Google Maps Peta Kampus Footer.
   - Pengaturan Kontak (Telepon, WA, Email, Alamat) & Sosial Media.

4. **Sistem Halaman Statis Anti-404 Fallback**:
   - Seluruh tautan menu (`/halaman/profil`, `/halaman/visi-misi`, `/halaman/sambutan-ketua`, `/halaman/kemahasiswaan`, `/halaman/beasiswa`, `/halaman/akreditasi`, `/halaman/kerjasama`, `/halaman/alumni`, `/halaman/struktur-organisasi`) memiliki halaman dinamis dan fallback template rapi.

---

## 🏡 Panduan Menjalankan Project Di Rumah / Laptop Lain

### 1. Update Kodingan Terbaru dari GitHub:
```bash
git pull origin main
```

### 2. Menjalankan Website (Local Development):
```bash
php artisan serve
```
Akses di browser: [`http://127.0.0.1:8000`](http://127.0.0.1:8000)

### 3. Akses Dashboard Admin CMS:
- **URL Login Admin**: [`http://127.0.0.1:8000/admin/login`](http://127.0.0.1:8000/admin/login)
- **Email**: `admin@stikespantiwaluya.ac.id`
- **Password**: `password123`

---

## 📂 Struktur Database & Seeder

- `DatabaseSeeder`: Mengisi data admin, site settings, 5 prodi, 10 berita sampel, slide hero, dan fasilitas.
- `AchievementSeeder`: Mengisi 10 ucapan selamat & prestasi civitas akademika (Dosen, Satgas, Mahasiswa).
- `PageSeeder`: Mengisi 9 halaman statis kampus.

Untuk mereset/mengisi ulang database sampel:
```bash
php artisan migrate:fresh --seed
```

---

## 📌 Repository GitHub Status
- **Repository URL**: [https://github.com/YonathanTobias/CMS_laravel.git](https://github.com/YonathanTobias/CMS_laravel.git)
- **Branch**: `main`
