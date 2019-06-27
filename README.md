# monetary
Sistem Manajemen Tabungan Paket Lebaran


Sistem ini digunakan untuk manajemen tabungan paket lebaran, di mana setiap peserta menabung untuk mendapatkan paket lebaran.
Sistem ini menggunakan Framework CodeIgniter Versi 3. Untuk tampilan menggunakan CSS Framework Bootstrap 4, dan template SB Admin 2.
Sistem ini mempunyai beberapa fungsionalitas diantaranya:
1. Login dan Register akun
2. Dashboard untuk menampilkan jumlah peserta, jumlah kolektor, serta total keseluruhan uang yang masuk.
3. Menu Paket untuk menampilkan paket lebaran beserta rincian produk di dalamnya, juga jumlah peserta yang ikut serta pada masing-masing      paket.
4. Menu Kolektor
  untuk menampilkan data kolektor serta rincian peserta yang tergabung dalam kelompok kolektor masing-masing, serta untuk menambahkan,  mengedit dan menghapus data kolektor.
     - Pada rincian peserta, pengguna bisa menambahkan setoran, mengedit setoran, serta melihat riwayat setoran yang telah ditambahkan.
     - Pengguna bisa menghapus data kolektor, akan tetapi mengakibatkan data peserta yang tergabung dalam kelompok kolektor tersebut akan        terhapus juga.
5. Menu Peserta
  untuk menampilkan rincian data peserta berupa nama peserta, nama kolektor, alamat, jenis paket yang diikuti, setoran terakhir, dan         total setoran.
  Untuk menambahkan, mengedit dan menghapus data peserta.
  
Langkah-langkah untuk menjalankan aplikasi
  1. Download dan Install CodeIgniter versi 3.
  2. Download projek dan tempatkan pada folder htdocs
  3. Tempatkan file sesuai dengan foldernya masing-masing pada CodeIgniter yang telah terinstall
  4. Jalankan Apache dan MySQL pada xampp.
  5. Buat database dengan nama 'paketlebaran', kemudian import file paketlebaran.sql
  6. Buka alamat ini : 'http://localhost/monetary/'
  7. Akan tampil laman login, silahkan klik 'Create an Account!' untuk membuat akun.
  8. Setelah selesai registrasi pengguna akan langsung diarahkan ke laman login. Silahkan login dengan akun yang telah dibuat sebelumnya.
  9. Setelah login pengguna akan diarahkan ke laman dashboard. Selesai.
