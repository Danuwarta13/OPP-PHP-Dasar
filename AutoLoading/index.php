<?php

// File ini adalah entry point untuk menggunakan autoLoading
require_once 'App/init.php';

// Membuat objek produk baru dengan nama, detail, kategori, harga, hari, dan kuota
$produk1 = new PaketData("Axis", "Anti Lemot", "Reguler", 25000, 30);
$produk2 = new Voucher("smartfren", "SiCepat", "Prabayar", 20000, 20);

// $produk2->setDiskon(50);

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);
echo $cetakProduk->cetak();

echo "<hr>";

// Contoh Penggunaan autoLoading
// dengan menggunakan autoLoading kita tidak perlu lagi require_once untuk mengimpor file-file yang diperlukan
new Coba();