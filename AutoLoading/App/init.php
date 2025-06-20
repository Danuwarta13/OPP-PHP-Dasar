<?php


// Menggunakan Require untuk mengimpor file-file yang diperlukan
// require_once 'App/Produk/InfoProduk.php';
// require_once 'App/Produk/Produk.php';
// require_once 'App/Produk/PaketData.php';
// require_once 'App/Produk/Voucher.php';
// require_once 'App/Produk/CetakInfoProduk.php';


// Menggunakan spl_autoLoad_register untuk mengimpor file-file yang diperlukan secara otomatis
spl_autoload_register(function ($class) {
    require_once __DIR__ . '/Produk/' . $class . '.php';
});