Sistem Peminjaman Barang di Kampus

Sistem ini dibangun untuk memenuhi tugas UTS mata kuliah Enterprise Application Integration (EAI), dengan studi kasus **peminjaman barang di kampus**. Aplikasi menggunakan pendekatan **microservices** yang terdiri dari tiga service utama yang saling berkomunikasi satu sama lain.

Arsitektur Layanan
- `userService` (port `8001`)  
  Menyimpan dan mengelola data user seperti nama, email, NIM, dan jurusan.

- `productService` (port `8002`)  
  Menyimpan dan mengelola data produk/barang yang tersedia untuk dipinjam.

- `orderService` (port `8003`)  
  Bertanggung jawab untuk pencatatan transaksi peminjaman, termasuk relasi antara user dan produk.

Alur Komunikasi Antar Service

1. `orderService` menerima permintaan peminjaman.
2. `orderService` melakukan request ke `userService` dan `productService` untuk mengambil data user & produk berdasarkan ID.
3. Setelah data berhasil diambil, transaksi disimpan di database dan response dikembalikan ke client.

Teknologi yang Digunakan

- Laravel (PHP)
- MySQL
- Postman (untuk testing API)
- JSON untuk format pertukaran data

Cara Menjalankan

Buka terminal di masing-masing folder dan jalankan perintah:

```bash
php artisan serve --port=8001 # untuk userService
php artisan serve --port=8002 # untuk productService
php artisan serve --port=8003 # untuk orderService
