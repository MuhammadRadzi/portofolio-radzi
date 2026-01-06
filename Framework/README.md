# MVC (Model View Controller)
## Model
Model bertugas mengelola data dan logika bisnis.

### Tugas Model:
- Berinteraksi dengan database (CRUD: Create, Read, Update, Delete)
- Menyimpan aturan/logika data
- Validasi data (tergantung framework)

### Contoh:
- Tabel `users`, `products`, `orders`
- Logika: “user tidak boleh login jika akun nonaktif”

## View
View bertugas menampilkan antarmuka (UI) ke pengguna.

### Tugas View:
- Menampilkan data dari Model
- Mengatur tampilan (HTML, CSS, template)
- Tidak berisi logika bisnis berat

### Contoh:
- File HTML / Blade / Twig
- Halaman login, dashboard, daftar produk

## Controller
Controller adalah penghubung antara Model dan View.

### Tugas Controller:
- Menerima request dari user
- Memproses input
- Memanggil Model
- Mengirim data ke View

### Contoh:
-`UserController`
-`LoginController`
