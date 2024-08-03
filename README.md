## Overview
**Sistem Implementasi Profile Matching Untuk Pemilihan Jurusan Pada Perguruhan Tinggi**

Sistem pendukung keputusan dalam membantu siswa untuk menentukan jurusan pada perguruhan tinggi dengan memeberikan rekomendasi jurusan sesuai dengan profil siswa. Sistem ini ditujukan untuk jurusan manajemen perkantoran, akuntansi, bisnis digital, desain dan produksi busana, seni tari dan tata kecantikan kulit dan rambut. Rumpun ilmu yang digunakan dalam aplikasi ini hanya teknik, matematika dan sains,ekonomi/manajemen,psikologi,sospol/hukum/komunikasi(FISIP), sastra/seni/budaya, administrasi/sekretaris

## Tujuan
- Membangun dan merancang sistem perangkat lunak yang menghasilkan saran pilihan jurusan yang tepat.
- Menerapkan metode profile matching untuk sistem pengambilan keputusan pemilihan jurusan di perguruan tinggi.

## Fitur
- Modul Login
    - login merupakan halaman awal dimana user di haruskan mengisi username dan password. Agar dapat masuk ke dalam sistem dan menggunakan sistem user perlu mengisi username dan password dengan benar.
- Modul Input Nilai Siswa
    - user yang statusnya sebagai siswa mengisikan nilai pengetahuan, keterampilan, dan bakat.
- Modul Hasil Rekomendasi
    - Hasil perhitungan dari nilai yang diisi oleh siswa. Akan ditampilakan pada tabel peringkar rekomendasi.
- Modul Pengaturan Nilai
    - Pengaturan nilai hanya bisa dilakukan oleh admin. Pengaturan nilai ini bertujuan untuk menentukan nilai batas minimal dari nilai pengetahuan, keterampilan, dan bakat. 
- Modul Tambah User
    - Penambahan user baru hanya bisa di lakukan oleh admin. Admin dapat menambakan user yang berstatus siswa ataupun admin menambahkan admin baru.
- Modul Detail User
    - yang menampilkan hasil nilai pengetahuan, keterampilan, dan bakat yang di isi oleh user yang berstatus siswa. Halaman ini juga menampilkan tabel hasil perhitungan dan peringkingan rekomendasi.

## Sofware Required
XAMPP

PHP >= 8.1.17

Text Editor (visual studio code)

Web Browser

## Cara Instalasi
1. **Clone Repositori ini**

Arahkan direktori yang akan digunakan untuk menyimpan dengan terminal, kemudian jalankan perintah ini.
```bash
git clone https://github.com
```
2. **Download Project Zip**

anda bisa download file project zip [disini](https://github.com/)

## Cara Menjalankan Aplikasi
1. Import database 

    Import file database.sql pada folder database

2. Atur nama database di file koneksi.php
    ```
    host='localhost';
    $user='root';
    $pass='';
    $db_nama='db_database'; 
    ```

3. Login Kehalaman Admin

    username : admin

    password : admin

4. login Kehalaman Siswa 

    username : siswa

    password : siswa