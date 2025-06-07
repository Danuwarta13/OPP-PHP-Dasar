<?php

// class produk
class Produk
{
    // property / variable dalam class
    // public, private, protected
    // public = bisa diakses dari luar class
    // private = hanya bisa diakses dari dalam class
    // protected = hanya bisa diakses dari dalam class dan turunannya (inheritance)
    // property ini akan menjadi milik dari objek yang dibuat dari class ini
    public $nama = "nama",
        $detail = "detail",
        $harga = 0;

    // method / function dalam class 
    // public, private, protected
    // public = bisa diakses dari luar class
    // private = hanya bisa diakses dari dalam class
    // protected = hanya bisa diakses dari dalam class dan turunannya (inheritance)
    public function getLabel()
    {
        return "$this->nama, $this->detail, dengan harga : $this->harga"; // $this digunakan untuk mengakses property dari dalam method
    }
}


// instansiasi class produk / obejek dari class produk
$produk1 = new Produk();
$produk1->nama = "Telkomsel"; // mengakses property dari objek
// var_dump($produk1);

$produk2 = new Produk();
$produk2->nama = "Simpati";
// $produk2->tambah = "thahah";  // menambahkan property baru pada objek TIDAK DISARANKAN
// var_dump($produk2);

$produk3 = new Produk();
$produk3->nama = "Indosat";
$produk3->detail = "internet unlimited";
$produk3->harga = 30000;
// var_dump($produk3);

$produk4 = new Produk();
$produk4->nama = "Axis";
$produk4->detail = "internet 24 jam";
$produk4->harga = 250000;


echo "Voucher : " . $produk3->getLabel();
echo "<br>";
echo "Paket Data : " . $produk4->getLabel();