<?php

// namespace digunakan untuk mengelompokkan kode dalam sebuah aplikasi untuk menandai ruang lingkup kode tersebut
namespace App\Service;

class User
{
    public function __construct()
    {
        echo "ini adalah class " . __CLASS__;
    }
}