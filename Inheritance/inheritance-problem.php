<?php

class Produk
{
    public $nama, $detail, $jenis, $harga, $hari, $kuota, $type;

    public function __construct($nama = "nama", $detail = "detail", $jenis = "jenis", $harga = 0, $hari = 0, $kuota = 0, $type = "type")
    {
        $this->nama = $nama;
        $this->detail = $detail;
        $this->jenis = $jenis;
        $this->harga = $harga;
        $this->hari = $hari;
        $this->kuota = $kuota;
        $this->type = $type;
    }

    public function getLabel()
    {
        return "$this->detail, $this->jenis";
    }

    public function getInfoLengkap()
    {
        // Paket data : Axis | Anti Lemot, Jenis (Rp. 25000) - 30 Hari.
        $str = "{$this->type} : {$this->nama} | {$this->getLabel()} (Rp. {$this->harga}) ";
        if ($this->type == "Paket Data") {
            $str .= "- {$this->hari} Hari.";
        } elseif ($this->type == "Voucher") {
            $str .= "~ {$this->kuota} GB.";
        }
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
$produk1 = new Produk("Axis", "Anti Lemot", "Reguler", 25000, 30, 0, "Paket Data");
$produk2 = new Produk("smartfren", "SiCepat", "Prabayar", 20000, 0, 20, "Voucher");

// Paket data : Axis | Anti Lemot , PaketData (Rp. 25000)
// Voucher : Smartfren | SiMurah , Voucher (Rp. 20000)
// Axis | Anti Lemot, Voucher (Rp. 25000)

// Paket data : Axis | Anti Lemot, PaketData (Rp. 25000) - 30 Hari.
// Voucher : Smartfren | SiMurah, Voucher (Rp. 20000) - 20 GB.

echo $produk1->getInfoLengkap();
echo "<br>";
echo $produk2->getInfoLengkap();
