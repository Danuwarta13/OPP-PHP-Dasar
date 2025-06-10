<?php


class Produk
{
    public $nama, $detail, $jenis, $harga;

    public function __construct($nama = "nama", $detail = "detail", $jenis = "jenis", $harga = 0)
    {
        $this->nama = $nama;
        $this->detail = $detail;
        $this->jenis = $jenis;
        $this->harga = $harga;
    }

    public function getLabel()
    {
        return "$this->detail, $this->jenis";
    }

    public function getInfoProduk()
    {
        $str = "{$this->nama} | {$this->getLabel()} (Rp. {$this->harga}) ";
        return $str;
    }
}

// PaketData adalah turunan dari class Produk dan mewarisi semua properti dan metode dari class Produk
class PaketData extends Produk
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

    public function getInfoProduk()
    {
        // Menggunakan overriding = parent::getInfoProduk() untuk mendapatkan informasi produk dari class parent yaitu Produk
        $str = "Paket Data : " . parent::getInfoProduk() . " - {$this->hari} Hari.";
        return $str;
    }
}

// Voucher adalah turunan dari class Produk dan mewarisi semua properti dan metode dari class Produk
class Voucher extends Produk
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

    public function getInfoProduk()
    {
        // Menggunakan overriding = parent::getInfoProduk() untuk mendapatkan informasi produk dari class parent yaitu Produk
        $str = "Voucher : " . parent::getInfoProduk() . " ~ {$this->kuota} GB.";
        return $str;
    }
}


// class CetakInfoProduk digunakan untuk mencetak informasi produk
class CetakInfoProduk
{
    // Method cetak menerima objek Produk dan mengembalikan string informasi produk
    public function cetak(Produk $produk) // Parameter bertipe Produk untuk memastikan hanya objek produk yang valid yang diterima
    {
        $str = "{$produk->nama} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}

// Membuat objek produk baru dengan nama, detail, kategori, harga, hari, dan kuota
$produk1 = new PaketData("Axis", "Anti Lemot", "Reguler", 25000, 30);
$produk2 = new Voucher("smartfren", "SiCepat", "Prabayar", 20000, 20);

// Paket data : Axis | Anti Lemot , PaketData (Rp. 25000)
// Voucher : Smartfren | SiMurah , Voucher (Rp. 20000)
// Axis | Anti Lemot, Voucher (Rp. 25000)

// Paket data : Axis | Anti Lemot, PaketData (Rp. 25000) - 30 Hari.
// Voucher : Smartfren | SiMurah, Voucher (Rp. 20000) - 20 GB.

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
