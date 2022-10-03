<?php 
require_once "Bentuk2D.php";

class PersegiPanjang extends Bentuk2D
{
    public $panjang;
    public $lebar;

    public function __construct($panjang, $lebar)
    {
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }

    public function namaBidang()
    {
        $nama = "Persegi Panjang";
        return $nama;
    }

    public function kelilingBidang()
    {
        $keliling = (2 * $this->panjang) + (2 * $this->lebar);
        return $keliling;
    }

    public function luasBidang()
    {
        $luas = $this->panjang * $this->lebar;
        return $luas;
    }

    public function keterangan()
    {
        return "
        Panjang : ".$this->panjang." <br>
        Lebar : ".$this->lebar."
        ";
    }
}

?>