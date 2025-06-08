<?php

// class produk
class Produk
{
    // proprty / variabel dalam class
    public $nama, $detail, $harga;

    // constructor adalah method yang akan dipanggil secara otomatis ketika objek dibuat atau diinstansiasi
    public function __construct($nama = "nama", $detail = "detail", $harga = 0)
    {
        $this->nama = $nama;  // This digunakan untuk mengakses property dari dalam class
        $this->detail = $detail;
        $this->harga = $harga;
    }

    // method / function dalam class
    public function getLabel()
    {
        return "$this->nama, $this->detail, dengan harga : $this->harga ";
    }
}

// instansiasi class produk / objek dari class produk
$produk1 = new Produk("Telkomsel", "Internet Unlimited", 30000);
$produk2 = new Produk("Indosat", "Internet 25 Jam", 35000);
$produk3 = new Produk("XL");

echo "Voucher : " . $produk1->getLabel();
echo "<br>";
echo "Paket Data : " . $produk2->getLabel();
echo "<br>";
echo "Paket Internet : " . $produk3->getLabel();
