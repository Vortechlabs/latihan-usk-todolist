# 📝 Todo List App - PHP Native

<div align="center">

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)

**Aplikasi manajemen tugas sederhana namun powerful yang dibangun dengan PHP native, MySQL, dan CSS murni tanpa framework!**

[Demo](#-preview) · [Fitur](#-fitur-unggulan) · [Instalasi](#-instalasi) · [Penggunaan](#-penggunaan)

</div>

---

## 🎯 Tentang Proyek

Todo List App adalah aplikasi web untuk mengelola daftar tugas harian Anda. Dibangun menggunakan teknologi web fundamental tanpa ketergantungan pada framework atau library eksternal. Sempurna untuk belajar atau digunakan dalam lingkungan offline!

### ✨ Kenapa Pilih Aplikasi Ini?

- 🚀 **Pure Native** - Tidak ada framework, tidak ada dependency
- 💪 **Offline-Friendly** - Bisa dijalankan tanpa koneksi internet
- 🎨 **UI Modern** - Desain clean dengan CSS manual yang responsif
- 🔐 **Secure** - Sistem autentikasi user yang aman
- 📱 **Responsive** - Tampil sempurna di semua perangkat

---

## 🌟 Fitur Unggulan

### 🔑 Autentikasi & User Management
- ✅ **Register** - Pendaftaran user baru dengan validasi
- ✅ **Login** - Sistem login yang aman dengan session management
- ✅ **Profile** - Lihat dan kelola profil user
- ✅ **Logout** - Keluar dengan aman dari aplikasi

### 📋 Todo Management
- ✅ **Tambah Todo** - Buat tugas baru dengan judul dan deskripsi
- ✅ **Edit Todo** - Ubah detail tugas yang sudah ada
- ✅ **Hapus Todo** - Hapus tugas yang tidak diperlukan
- ✅ **Update Status** - Tandai tugas sebagai selesai atau pending

### 🎨 Visual Feedback
- ✅ **Card Dinamis** - Card berubah warna otomatis:
  - 🟢 **Card Putih** - Tugas yang belum selesai (pending)
  - ⚫ **Card Hitam** - Tugas yang sudah selesai (done)
- ✅ **Text Strikethrough** - Teks dicoret otomatis untuk tugas selesai
- ✅ **Smooth Transitions** - Animasi halus pada setiap interaksi

### 📁 Kategori & Filter
- ✅ **Multi-Kategori** - Kelompokkan tugas berdasarkan kategori
- ✅ **Filter Kategori** - Tampilkan tugas berdasarkan kategori tertentu
- ✅ **Dynamic Dropdown** - Filter kategori dengan dropdown interaktif

### 💝 Favorites/Wishlist
- ✅ **Add to Favorites** - Tandai tugas penting sebagai favorit
- ✅ **Remove from Favorites** - Hapus dari daftar favorit
- ✅ **Visual Indicator** - Ikon hati yang berubah warna:
  - ❤️ **Merah** - Sudah difavoritkan
  - 🤍 **Abu-abu** - Belum difavoritkan

---

## 📸 Preview

### Dashboard Todo
```
┌─────────────────────────────────────────────────┐
│  🏠 Dashboard     👤 Profile     🚪 Logout       │
├─────────────────────────────────────────────────┤
│                                                  │
│  Filter kategori: [Semua ▼]                     │
│                                                  │
│         [+ Tambah]                               │
│                                                  │
│  ┌──────────────┐  ┌──────────────┐             │
│  │ ⬜ Belajar PHP│  │ ⬛ Beli Susu  │             │
│  │              │  │ ̶B̶e̶l̶i̶ ̶s̶u̶s̶u̶ ̶d̶i̶  │             │
│  │ Belajar PHP  │  │ ̶w̶a̶r̶u̶n̶g̶        │             │
│  │ native untuk │  │              │             │
│  │ todo list    │  │ Kategori:    │             │
│  │              │  │ ̶B̶e̶l̶a̶n̶j̶a̶      │             │
│  │ Kategori:    │  │ Status: done │             │
│  │ Programming  │  │              │             │
│  │ Status:      │  │ [Edit][Hapus]│             │
│  │ pending      │  │          ❤️  │             │
│  │              │  └──────────────┘             │
│  │ [Edit][Hapus]│                               │
│  │          🤍  │                               │
│  └──────────────┘                               │
│                                                  │
└─────────────────────────────────────────────────┘
```

---

## 🗂️ Struktur Database

### Tabel: `users`
```sql
- id_user (INT, PRIMARY KEY, AUTO_INCREMENT)
- username (VARCHAR)
- email (VARCHAR)
- password (VARCHAR) - hashed
- created_at (TIMESTAMP)
```

### Tabel: `category`
```sql
- id_category (INT, PRIMARY KEY, AUTO_INCREMENT)
- category (VARCHAR)
```

### Tabel: `todo`
```sql
- id_todo (INT, PRIMARY KEY, AUTO_INCREMENT)
- id_user (INT, FOREIGN KEY)
- id_category (INT, FOREIGN KEY)
- title (VARCHAR)
- description (TEXT)
- status (ENUM: 'pending', 'done')
- created_at (TIMESTAMP)
- updated_at (TIMESTAMP)
```

### Tabel: `favorites`
```sql
- id_favorites (INT, PRIMARY KEY, AUTO_INCREMENT)
- id_user (INT, FOREIGN KEY)
- id_todo (INT, FOREIGN KEY)
```

---

## 🛠️ Instalasi

### Prasyarat
- **XAMPP** / **WAMP** / **LAMP** (PHP 7.4+ & MySQL)
- Web Browser modern
- Text Editor (VS Code, Sublime, dll)

### Langkah Instalasi

1️⃣ **Clone/Download Repository**
```bash
git clone https://github.com/username/latihan-usk-todolist.git
cd latihan-usk-todolist
```

2️⃣ **Setup Database**
```bash
# Buka phpMyAdmin (http://localhost/phpmyadmin)
# Buat database baru dengan nama: todolist_db
# Import file SQL yang disediakan
```

3️⃣ **Konfigurasi Koneksi**
```php
// Edit file koneksi.php
$host = "localhost";
$user = "root";
$pass = "";
$db = "todolist_db";
```

4️⃣ **Jalankan Aplikasi**
```bash
# Pindahkan folder ke htdocs (untuk XAMPP)
# Buka browser: http://localhost/latihan-usk-todolist
```

---

## 💻 Penggunaan

### 1. Register & Login
1. Buka aplikasi di browser
2. Klik **Register** untuk membuat akun baru
3. Isi form dengan username, email, dan password
4. Setelah berhasil, login dengan kredensial Anda

### 2. Kelola Todo
1. Di dashboard, klik **[+ Tambah]** untuk membuat todo baru
2. Isi judul, deskripsi, dan pilih kategori
3. Klik **Simpan**
4. Todo akan muncul sebagai card putih (status: pending)

### 3. Update Status
1. Klik **Edit** pada card todo
2. Ubah status menjadi **Done**
3. Card akan berubah menjadi hitam dan teks tercoret

### 4. Filter & Favorites
- Gunakan dropdown **Filter kategori** untuk menyaring todo
- Klik ikon **💘** untuk menambah/menghapus dari favorites

---

## 📁 Struktur File

```
latihan-usk-todolist/
├── 📄 index.php              # Dashboard utama
├── 📄 login.php              # Halaman login
├── 📄 register.php           # Halaman register
├── 📄 profile.php            # Halaman profil user
├── 📄 navbar.php             # Komponen navigasi
├── 📄 tambah-todo.php        # Form tambah todo
├── 📄 edit-todo.php          # Form edit todo
├── 📄 hapus-todo.php         # Handler hapus todo
├── 📄 add-to-wishlist.php    # Handler tambah favorit
├── 📄 delete-from-wishlist.php # Handler hapus favorit
├── 📄 koneksi.php            # Konfigurasi database
├── 📄 style.css              # Styling aplikasi
└── 📄 README.md              # Dokumentasi
```

---

## 🎨 Teknologi

| Teknologi | Penggunaan |
|-----------|------------|
| **PHP Native** | Backend logic & server-side processing |
| **MySQL** | Database management system |
| **CSS3** | Styling & responsive design |
| **HTML5** | Markup & struktur halaman |
| **Session** | User authentication & state management |

---

## 🔒 Keamanan

- ✅ Password hashing dengan algoritma PHP native
- ✅ Session management untuk autentikasi
- ✅ SQL query dengan prepared statement (recommended upgrade)
- ✅ Validasi input di sisi server
- ✅ Protection dari unauthorized access

---

## 🚀 Roadmap & Future Updates

- [ ] Implementasi AJAX untuk operasi tanpa reload
- [ ] Fitur search/pencarian todo
- [ ] Export todo ke PDF/Excel
- [ ] Dark mode toggle
- [ ] Notifikasi reminder
- [ ] API untuk mobile integration
- [ ] Multi-language support

---

## 🤝 Kontribusi

Kontribusi sangat diterima! Jika Anda ingin berkontribusi:

1. Fork repository ini
2. Buat branch baru (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

---

## 📝 Lisensi

Distributed under the MIT License. See `LICENSE` for more information.

---

## 👨‍💻 Author

**Al Zaki Ibra Ramadani**

- GitHub: [@VortechLabs](https://github.com/VortechLabs)
- Email: alzak1ibra@gmail.com

---

## 🙏 Acknowledgments

- Terima kasih kepada semua yang telah berkontribusi
- Inspirasi dari berbagai tutorial dan dokumentasi PHP
- Community support dari Stack Overflow

---

<div align="center">

**⭐ Jangan lupa untuk memberikan star jika project ini membantu Anda! ⭐**

Made with ❤️ and ☕

</div>