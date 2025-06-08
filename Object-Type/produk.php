<?php

class Produk
{
    public $nama, $detail, $kategori, $harga;

    public function __construct($nama = "nama", $detail = "detail", $kategori = "kategori", $harga = 0)
    {
        $this->nama = $nama;
        $this->detail = $detail;
        $this->kategori = $kategori;
        $this->harga = $harga;
    }

    public function getLabel()
    {
        return "$this->detail, $this->kategori";
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

$produk1 = new Produk("Axis", "Anti Lemot", "Voucher", 25000);
$produk2 = new Produk("smartfren", "SiCepat", "PaketData", 20000);

echo  "$produk1->nama " . $produk1->getLabel();
echo "<br>";
echo  "$produk2->nama " . $produk2->getLabel();
echo "<br>";

$cetakProduk = new CetakInfoProduk();
echo $cetakProduk->cetak($produk1);
