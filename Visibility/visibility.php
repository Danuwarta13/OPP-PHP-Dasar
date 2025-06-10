<?php


class Produk
{
    // Public untuk properti yang dapat diakses dari mana saja
    public $nama, $detail, $jenis;
    // Protected untuk properti yang hanya dapat diakses dari dalam class ini dan class turunan
    protected $diskon = 0;
    // Private untuk properti yang hanya dapat diakses dari dalam class ini
    private $harga;

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

    // Method getHarga digunakan untuk mendapatkan harga produk setelah diskon
    public function getHarga()
    {
        return $this->harga - ($this->harga * $this->diskon / 100);
    }

    public function getInfoProduk()
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

    // Method setDiskon digunakan untuk mengatur diskon pada produk Voucher dengan parameter diskon yang di set Protected pada class Produk
    public function setDiskon($diskon)
    {
        $this->diskon = $diskon;
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


echo $produk1->getInfoProduk();
echo "<br>";

// Untuk membuat diskon pada produk Voucher, kita perlu memanggil method setDiskon yang ada pada class Voucher
$produk2->setDiskon(0);

echo $produk2->getInfoProduk();
echo "<hr>";

echo $produk2->getHarga();
