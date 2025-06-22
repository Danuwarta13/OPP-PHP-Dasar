<?php

// Voucher adalah turunan dari class Produk dan mewarisi semua properti dan metode dari class Produk
class Voucher extends Produk implements Infoproduk
{
    // Properti khusus untuk Voucher
    public $kuota;

    // Constructor ini digunakan untuk menginisialisasi objek Voucher dengan parameter khusus kuota
    public function __construct($nama = "nama", $detail = "detail", $jenis = "jenis", $harga = 0, $kuota = 0)
    {
        // Menggunakan overriding = parent::__construct() untuk menginisialisasi properti dari class parent yaitu Produk
        parent::__construct($nama, $detail, $jenis, $harga);
        // Inisialisasi properti khusus untuk Voucher
        $this->kuota = $kuota;
    }

    public function getInfoProduk() // Method ini mengimplementasikan method interface Infoproduk
    {
        $str = "Voucher : " . $this->getInfo() . " ~ {$this->kuota} GB.";
        return $str;
    }

    public function getInfo() // Method ini mengimplementasikan method abstract dari class Produk
    {
        $str = "{$this->nama} | {$this->getLabel()} (Rp. {$this->getHarga()}) ";
        return $str;
    }
}