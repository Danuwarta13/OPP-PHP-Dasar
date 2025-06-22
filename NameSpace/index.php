<?php

// File ini adalah entry point untuk menggunakan autoLoading
require_once 'App/init.php';

// // Membuat objek produk baru dengan nama, detail, kategori, harga, hari, dan kuota
// $produk1 = new PaketData("Axis", "Anti Lemot", "Reguler", 25000, 30);
// $produk2 = new Voucher("smartfren", "SiCepat", "Prabayar", 20000, 20);

// // $produk2->setDiskon(50);

// $cetakProduk = new CetakInfoProduk();
// $cetakProduk->tambahProduk($produk1);
// $cetakProduk->tambahProduk($produk2);
// echo $cetakProduk->cetak();

// echo "<hr>";

// menggunakan namespace untuk mengelompokkan kode dan menggunakan as untuk mengubah nama kelas agar tidak bentrok
use App\Produk\User as ProdukUser;
use App\Service\User as ServiceUser;

new ProdukUser();
echo "<hr>";
new ServiceUser();