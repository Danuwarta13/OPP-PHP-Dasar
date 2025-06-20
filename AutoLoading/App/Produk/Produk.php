<?php

abstract class Produk
{
    // Public untuk properti yang dapat diakses dari mana saja
    protected $nama, $detail, $jenis, $harga, $diskon = 0;
    // Protected untuk properti yang hanya dapat diakses dari dalam class ini dan class turunan
    // Private untuk properti yang hanya dapat diakses dari dalam class ini

    public function __construct($nama = "nama", $detail = "detail", $jenis = "jenis", $harga = 0)
    {
        $this->nama = $nama;
        $this->detail = $detail;
        $this->jenis = $jenis;
        $this->harga = $harga;
    }

    // Getter dan Setter untuk properti nama
    //  Getter digunakan untuk mendapatkan nilai dari properti
    public function getNama()
    {
        return $this->nama;
    }
    // Setter digunakan untuk mengatur nilai dari properti
    public function setNama($nama)
    {
        // Validasi untuk memastikan nama yang diberikan adalah string
        if (!is_string($nama)) {
            throw new Exception("Nama harus berupa string");
        }
        $this->nama = $nama;
    }

    // Getter dan Setter untuk properti detail
    // Getter untuk mendapatkan nilai dari properti detail
    public function getDetail()
    {
        return $this->detail;
    }
    // Setter untuk mengatur nilai dari properti detail
    public function setDetail($detail)
    {
        $this->detail = $detail;
    }

    // Getter dan Setter untuk properti jenis
    // Getter untuk mendapatkan nilai dari properti jenis
    public function getJenis()
    {
        return $this->jenis;
    }
    // Setter untuk mengatur nilai dari properti jenis
    public function setJenis($jenis)
    {
        $this->jenis = $jenis;
    }

    // Method getHarga digunakan untuk mendapatkan harga produk setelah diskon
    public function getHarga()
    {
        return $this->harga - ($this->harga * $this->diskon / 100);
    }

    public function setHarga($harga)
    {
        $this->harga = $harga;
    }

    public function getDiskon()
    {
        return $this->diskon;
    }

    // Method setDiskon digunakan untuk mengatur diskon produk
    public function setDiskon($diskon)
    {
        $this->diskon = $diskon;
    }

    public function getLabel()
    {
        return "$this->detail, $this->jenis";
    }

    abstract public function getInfo();  // Method abstract yang harus diimpLementasikan oleh class turunan
}