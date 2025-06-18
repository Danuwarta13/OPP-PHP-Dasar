<?php
// Contoh penggunaan Constans menggunakan define
define('NAMA', 'Rhinozzz');

echo NAMA;

echo '<br>';

// Contoh penggunaan Constans menggunakan const
const ALAMAT = 'Jakarta';
echo ALAMAT;

// Perbedaan define dan const 
// 1. define dapat digunakan di dalam kondisi, sedangkan const tidak bisa
// 2. const bisa digunakan di dalam class, sedangkan define tidak bisa

echo '<hr>';

class coba
{
    const UMUR = 20;
}

echo coba::UMUR;
echo '<hr>';

echo __LINE__; // Untuk menampilkan nomor baris
echo '<br>';
echo __FILE__; // Untuk menampilkan nama file
echo '<br>';
echo __DIR__; // Untuk menampilkan direktori file
echo '<br>';
function coba()
{
    return __FUNCTION__; // Untuk menampilkan nama fungsi
}
echo coba();
echo '<br>';
function coba2()
{
    return __METHOD__; // Untuk menampilkan nama method
}
echo coba2();
echo '<br>';
class coba3
{
    public $kelas = __CLASS__; // Untuk menampilkan nama kelas
}
$coba3 = new coba3();
echo $coba3->kelas;
echo '<br>';
