<?php


// Menggunakan Require untuk mengimpor file-file yang diperlukan
// require_once 'Produk/InfoProduk.php';
// require_once 'Produk/Produk.php';
// require_once 'Produk/PaketData.php';
// require_once 'Produk/Voucher.php';
// require_once 'Produk/CetakInfoProduk.php';
// require_once 'Produk/User.php';

// require_once 'Service/User.php';


// Menggunakan spl_autoLoad_register untuk mengimpor file-file yang diperlukan secara otomatis
spl_autoload_register(function ($class) {
    // Memecah nama kelas menggunakan explode menjadi bagian2 dan mengambil nama kelas terakhir
    // App\Produk\User = ['App', 'Produk', 'User'] 
    $class = explode('\\', $class);
    $class = end($class);
    require_once __DIR__ . '/Produk/' . $class . '.php';
});

spl_autoload_register(function ($class) {
    // Memecah nama kelas menggunalan explode menjadi bagian2 dan mengambil nama kelas terakhir
    // App\Service\User = ['App', 'Service', 'User']
    $class = explode('\\', $class);
    $class = end($class);
    require_once __DIR__ . '/Service/' . $class . '.php';
});