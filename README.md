<!-- Nama Proyek -->
<h1 align="center">Tropicare</h1>

<!-- Deskripsi -->
<p align="center">Aplikasi pembantu petani pepaya dalam mengolah kebunnya, dengan fitur unggulan deteksi dan rekapitulasi.</p>

<!-- Badges -->
<div align="center">
    <!-- Badge Status Build -->
    <img src="https://img.shields.io/github/workflow/status/juniyasyos/Tropicare_9/Build?label=Build&style=for-the-badge" alt="Build Status">
    <!-- Badge Lisensi -->
    <img src="https://img.shields.io/github/license/juniyasyos/Tropicare_9?label=Lisensi&style=for-the-badge" alt="License">
    <!-- Badge Jumlah Issues -->
    <img src="https://img.shields.io/github/issues/juniyasyos/Tropicare_9?label=Issues&style=for-the-badge" alt="Issues">
    <!-- Badge Jumlah Pull Requests -->
    <img src="https://img.shields.io/github/issues-pr/juniyasyos/Tropicare_9?label=Pull%20Requests&style=for-the-badge" alt="Pull Requests">
</div>

<!-- Gambar / GIF -->
<p align="center">
    <img src="https://placeimg.com/640/480/tech" alt="Demo">
</p>

## Daftar Isi

- [Tentang](#tentang)
- [Fitur](#fitur)
- [Instalasi](#instalasi)
- [Penggunaan](#penggunaan)
- [Kontribusi](#kontribusi)
- [Lisensi](#lisensi)

## Tentang

Tropicare adalah aplikasi pembantu petani pepaya yang membantu mereka dalam mengelola kebun pepaya mereka dengan lebih efisien. Aplikasi ini dilengkapi dengan fitur unggulan deteksi dan rekapitulasi untuk mempermudah petani dalam mengoptimalkan produksi pepaya mereka.

## Fitur

Daftar fitur utama Tropicare:

- Deteksi Penyakit Pepaya: Fitur ini memungkinkan pengguna untuk mendeteksi penyakit yang mungkin menyerang tanaman pepaya mereka.
- Rekapitulasi Produksi: Pengguna dapat melihat rekapitulasi produksi pepaya dalam rentang waktu tertentu, termasuk total hasil panen, harga jual, dan lainnya.

## Instalasi

Petunjuk instalasi Tropicare:

## Permulaan sebelum memulai
Nyalakan XAMPP, MAMPP Laravel Heart apapun itu dan buat database bernama tropicare_final

### Langkah 1
```bash
git clone https://github.com/juniyasyos/Tropicare_9.git
cd Tropicare
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

### Langkah 2
- Silahkan login dengan akun dummy yang sudah kami sediakan (email:john.doe@example.com, pass:password123)
- kemudian lakukan perintah berikut di terminal projek tropicare_9

```bash
php artisan db:seed --class=DatabaseSeeder
```

# Kontribusi
## Jika Anda ingin berkontribusi pada Tropicase, silakan ikuti langkah-langkah berikut:
1. Fork proyek ini (https://github.com/<USERNAME>/Tropicare_9/fork)
2. Buat fitur baru (git checkout -b fitur/fiturBaru)
3. Commit perubahan Anda (git commit -am 'Tambahkan fitur baru')
4. Push ke branch Anda (git push origin fitur/fiturBaru)
5. Buat pull request baru


# Lisensi
Tropicare dilisensikan di bawah MIT License.
