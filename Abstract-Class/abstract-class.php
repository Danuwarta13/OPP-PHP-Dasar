<?php

// abstract class adalah class yang tidak dapat diinstansiasi / dibuat objeknya secara Langsung
// abstract class biasanya digunakan sebagai template untuk class turunan
// abstract class dapat memiliki method abstract yang harus diimplementasikan / di buat oleh class turunan
abstract class Produk
{
    // Public untuk properti yang dapat diakses dari mana saja
    private $nama, $detail, $jenis, $harga, $diskon = 0;
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

    abstract public function getInfoProduk(); // Method abstract yang harus diimplementasikan / dibuat oleh class turunan

    public function getInfo()
    {
        $str = "{$this->nama} | {$this->getLabel()} (Rp. {$this->getHarga()}) ";
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

    public function getInfoProduk() // Method ini mengimplementasikan method abstract dari class Produk
    {
        $str = "Paket Data : " . $this->getInfo() . " - {$this->hari} Hari.";
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

    public function getInfoProduk() // Method ini mengimplementasikan method abstract dari class Produk
    {
        $str = "Voucher : " . $this->getInfo() . " ~ {$this->kuota} GB.";
        return $str;
    }
}


// class CetakInfoProduk digunakan untuk mencetak informasi produk
class CetakInfoProduk
{
    public $daftarProduk = [];

    public function tambahProduk(Produk $produk)
    {
        $this->daftarProduk[] = $produk;
    }

    public function cetak()
    {
        $str = "Daftar Produk : <br>";

        foreach ($this->daftarProduk as $p) {
            $str .= "- {$p->getInfoProduk()} <br>";
        }

        return $str;
    }
}


// Membuat objek produk baru dengan nama, detail, kategori, harga, hari, dan kuota
$produk1 = new PaketData("Axis", "Anti Lemot", "Reguler", 25000, 30);
$produk2 = new Voucher("smartfren", "SiCepat", "Prabayar", 20000, 20);

// $produk2->setDiskon(50);

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);
echo $cetakProduk->cetak();
