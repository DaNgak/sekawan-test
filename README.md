# Aplikasi Pemesanan Kendaraan

Aplikasi Pemesanan Kendaraan adalah sebuah aplikasi yang memungkinkan perusahaan tambang nikel untuk melakukan monitoring terhadap kendaraan yang dimiliki, termasuk konsumsi BBM, jadwal service, dan riwayat pemakaian kendaraan. Selain itu, aplikasi ini juga memfasilitasi pemesanan kendaraan dengan persetujuan berjenjang dan menyediakan dashboard untuk melihat grafik pemakaian kendaraan.

Terdapat dua jenis pengguna dalam aplikasi ini:

```bash
Admin: Pengguna dengan hak akses penuh untuk menginputkan pemesanan kendaraan, menentukan driver, serta pihak yang menyetujui pemesanan.
```

```bash
Pihak yang menyetujui: Pengguna dengan hak akses terbatas untuk melakukan persetujuan pemesanan melalui aplikasi.
```

# Data

Berikut adalah daftar username dan password untuk mengakses aplikasi:

    Admin:
        Username: Admin
        Password: password

    Pihak yang menyetujui (Atasan 1):
        Username: Atasan1
        Password: password

    Pihak yang menyetujui (Atasan 2):
        Username: Atasan2
        Password: password

Disiapkan data juga untuk proses testing aplikasi diantaranya adalah data driver (Tidak bisa untuk login):

    Driver:
        Driver1
        Driver2

# Dependency

Untuk menjalankan aplikasi ini, pastikan sistem memenuhi kebutuhan berikut:

    PHP versi >= ^8.0
    Composer >= ^2.0
    Laravel Framework versi 9

# Running Project

Clone repository dahulu

Buka terminal atau command prompt, lalu navigasikan ke direktori proyek Laravel Anda menggunakan perintah cd.

```bash
cd [nama_folder]
```

Jalankan perintah composer install untuk menginstal semua dependensi proyek Laravel. Pastikan Anda memiliki file composer.json di direktori proyek.

```bash
composer install
```

Buat file `.env` dari file `.env.example` dengan perintah

```bash
cp .env.example .env
```

di sistem operasi Linux/Unix atau di sistem operasi Windows.

```bash
copy .env.example .env
```

Generate kunci aplikasi dengan perintah

```bash
php artisan key:generate
```

Pastikan pengaturan koneksi database di file .env sesuai dengan konfigurasi database Anda.

Jalankan migrasi database dengan perintah php artisan migrate untuk membuat tabel-tabel yang diperlukan di database.

```bash
php artisan migrate --seed
```

Jalankan server pengembangan lokal dengan perintah

```bash
php artisan serve
```

Buka browser dan akses http://localhost:8000 atau sesuai dengan URL yang ditampilkan di terminal.

Aplikasi dapat dijalankan secara normal

# Dashboard

Aplikasi ini menyediakan dashboard yang menampilkan grafik pemakaian kendaraan. Dashboard ini dapat diakses melalui http://localhost:8000/dashboard

Aplikasi ini memiliki fitur laporan periodik pemesanan kendaraan yang dapat diekspor dalam format Excel.

Berikut adalah panduan penggunaan untuk aplikasi Pemesanan Kendaraan:

<ul>
<li>Masukkan username dan password yang valid untuk masuk ke aplikasi.</li>
<li>Setelah login, admin dapat menginputkan pemesanan kendaraan dengan memasukkan informasi yang diminta dan menentukan driver serta pihak yang menyetujui pemesanan `(Atasan 1)` atau `(Atasan 2)`.</li>
<li>Terdapat juga fitur validasi dimana ketika kendaraan sedang di sewa, maka data kendaraan tersebut tidak bisa ditambahkan kedalam data pemesanan</li>
<li>Jika berhasil menginputkan data pemesanan Admin bisa menyetujui pemesanan tersebut dengan cara centang checkbox input ataupun setujui melalui tombol didalam page detail pemesanan</li>
<li>Admin juga dapat menyelesaikan pesanan jika kendaraan telah selesai disewa maka admin bisa menyelesaikan pemesanan tersebut agar kendaraannya bisa digunakan untuk disewakan lagi</li>
<li>Untuk Pihak yang menyetujui dapat melakukan persetujuan pemesanan dengan cara login kedalam sistem, lalu mengakses daftar pemesanan, nanti akan tampil semua data berdasarkan Pihak yang login (Atasan 1 atau Atasan 2) untuk melihat data pemesanan yang belum disetujui. dan bisa menyetujui nya dengan masuk ke detail page, lalu klik tombol setuju</li>
<li>Pihak yang menyetujui (Atasan) dan Admin bisa melihat history data order dari kendaraan yang dimiliki, tetapi Pihak yang menyetujui (Atasan) memiliki batasan yaitu hanya bisa melihat dan menyetujui pemesanan, sedangkan untuk create, update, dan delete hanya ditujukan untuk admin </li>
<li>Semua data yang didelete tidak akan hilang dari database, karena menerapkan `Soft Deletes` jadi data tetap berada didatabase dan sewaktu-waktu bisa diakses dari sisi server-side </li>
<li>Dashboard dapat digunakan untuk melihat grafik pemakaian kendaraan yang ada di perusahaan X.</li>
<li>Laporan tentang data kendaraan dapat diklik pada tombol `Export Transport Data`  untuk mengekspor data dalam format Excel.
</li>
</ul>

Catatan: Pastikan untuk menggantikan sesuaikan versi dependecies agar bisa menjalankan aplikasi tersebut.
