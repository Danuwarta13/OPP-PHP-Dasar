<?php

class ContohStatic
{
    // static digunakan untuk membuat properti atau method yang dapat diakses tanpa harus membuat instance dari kelas terebut.
    public static $angka = 1;

    public static function halo()
    {
        // self:: digunakan untuk mengakses properti atau method static dalam kelas yang sama.
        return "Hallow " . self::$angka++ . "kali.";
    }
}

// Mengakses properti dan method static tanpa membuat instance dari kelas
echo ContohStatic::$angka;
echo "<br>";
echo ContohStatic::halo();
echo "<hr>";
echo ContohStatic::halo();
