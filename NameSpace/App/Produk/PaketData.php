<?php



// PaketData adalah turunan dari class Produk dan mewarisi semua properti dan metode dari class Produk
class PaketData extends Produk implements Infoproduk
{
    // Properti Khusus untuk PaketData
    public $hari;

    // Constructor ini digunakan untuk menginisialisasi objek PaketData dengan parameter khusus hari
    public function __construct($nama = "nama", $detail = "detail", $jenis = "jenis", $harga = 0, $hari = 0)
    {
        // Menggunakan overriding = parent::__construct() untuk menginisialisasi properti dari class parent yaitu Produk
        parent::__construct($nama, $detail, $jenis, $harga);
        // Inisialisasi properti Khusus untuk PaketData
        $this->hari = $hari;
    }

    public function getInfoProduk() // Method ini mengimplementasikan method interface Infoproduk
    {
        $str = "Paket Data : " . $this->getInfo() . " - {$this->hari} Hari.";
        return $str;
    }

    public function getInfo()  //Method ini mengimplementasikan method abstract dari class Produk
    {
        $str = "{$this->nama} | {$this->getLabel()} (Rp. {$this->getHarga()}) ";
        return $str;
    }
}