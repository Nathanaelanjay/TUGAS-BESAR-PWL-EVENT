# 🎉 Event Management System

## 📌 Deskripsi Project

Event Management System adalah aplikasi berbasis web yang dibuat menggunakan framework Laravel untuk membantu proses pengelolaan event secara digital. Sistem ini mendukung beberapa role pengguna seperti Admin, Panitia, Member, dan Tim Keuangan sehingga seluruh proses event dapat berjalan lebih terstruktur.

Aplikasi ini menyediakan fitur pembuatan event, registrasi peserta, upload bukti pembayaran, validasi pembayaran, presensi menggunakan QR Code, hingga pengelolaan sertifikat peserta.

Project ini dibuat sebagai tugas besar mata kuliah Pemrograman Web Lanjut (PWL).

---

# 🚀 Fitur Utama

## 👤 Authentication

* Login
* Register
* Logout
* Middleware authentication
* Multi-role user

## 🧑‍💼 Admin

* Mengelola akun user
* Dashboard admin
* Registrasi akun role tertentu

## 🎫 Panitia

* Membuat event
* Melihat daftar event
* Melihat detail event
* Menambahkan sesi event
* Edit sesi
* Hapus sesi
* Upload sertifikat peserta
* Presensi peserta

## 👥 Member

* Melihat daftar event
* Registrasi event
* Upload bukti pembayaran
* Delete bukti pembayaran
* Melihat event yang diikuti
* Presensi event menggunakan QR Code
* Download sertifikat

## 💰 Tim Keuangan

* Validasi pembayaran peserta
* Approve pembayaran
* Reject pembayaran
* Melihat daftar registrasi pembayaran

## 📷 QR Code Attendance

Sistem menggunakan QR Code untuk proses presensi peserta event.

## 📄 Sertifikat

Panitia dapat mengunggah sertifikat peserta setelah event selesai.

---

# 🛠️ Teknologi yang Digunakan

## Backend

* PHP 8.2
* Laravel 12

## Frontend

* Blade Template Engine
* HTML
* CSS
* JavaScript
* SweetAlert2

## Database

* MySQL

## Library Tambahan

* endroid/qr-code

---

# 📂 Struktur Role

| Role         | Fungsi                   |
| ------------ | ------------------------ |
| Admin        | Mengelola akun pengguna  |
| Panitia      | Mengelola event dan sesi |
| Member       | Mengikuti event          |
| Tim Keuangan | Memvalidasi pembayaran   |

---

# ⚙️ Cara Menjalankan Project

## 1. Clone Repository

```bash
git clone https://github.com/username/repository-name.git
```

## 2. Masuk ke Folder Project

```bash
cd repository-name
```

## 3. Install Dependency PHP

```bash
composer install
```

## 4. Install Dependency Node.js

```bash
npm install
```

## 5. Copy File Environment

```bash
cp .env.example .env
```

## 6. Generate Application Key

```bash
php artisan key:generate
```

## 7. Konfigurasi Database

Buka file `.env` lalu ubah bagian berikut:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

## 8. Jalankan Migration

```bash
php artisan migrate
```

## 9. Jalankan Vite

```bash
npm run dev
```

## 10. Jalankan Laravel Server

```bash
php artisan serve
```

Akses aplikasi melalui:

```text
http://127.0.0.1:8000
```

---

# 📁 Struktur Folder Penting

```text
app/
 ┣ Http/
 ┃ ┣ Controllers/
 ┃ ┃ ┣ Admin/
 ┃ ┃ ┣ Auth/
 ┃ ┃ ┣ Member/
 ┃ ┃ ┣ Panitia/
 ┃ ┃ ┗ TimKeuangan/
 ┣ Models/

resources/
 ┣ views/

routes/
 ┗ web.php
```

---

# 🔐 Middleware & Security

* Authentication middleware
* Role-based access
* CSRF protection Laravel
* Validasi input form

---

# 📌 Fitur Tambahan

* Upload file bukti pembayaran
* Upload sertifikat
* QR Code attendance
* Dashboard sesuai role
* SweetAlert notification

---

# 🧪 Akun Role (Contoh)

## Admin

```text
Email : admin@gmail.com
Password : password
```

## Panitia

```text
Email : panitia@gmail.com
Password : password
```

## Member

```text
Email : member@gmail.com
Password : password
```

## Tim Keuangan

```text
Email : keuangan@gmail.com
Password : password
```

---

# 📖 Tujuan Project

Project ini dibuat untuk membantu digitalisasi manajemen eve
