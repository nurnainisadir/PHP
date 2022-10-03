<?php 
require_once "Bentuk2D.php";

class Segitiga extends Bentuk2D 
{
    public $alas;
    public $tinggi;

    public function __construct($alas, $tinggi)
    {
        $this->alas = $alas;
        $this->tinggi = $tinggi;
    }

    public function namaBidang()
    {
        $nama = "Segitiga";
        return $nama;
    }

    public function kelilingBidang()
    {
        $keliling = 3 * $this->alas;
        return $keliling;
    }

    public function luasBidang()
    {
        $luas = 0.5 * $this->alas * $this->tinggi;
        return $luas;
    }

    public function keterangan()
    {
        return "
        Alas : ".$this->alas." <br>
        Tinggi : ".$this->tinggi."
        ";
    }
}
?>