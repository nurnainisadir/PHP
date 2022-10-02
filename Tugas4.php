<?php
class Pegawai {
    public $nip;
    public $nama;
    public $jabatan;
    public $agama;
    public $status;

    const PT = "PT. Membangun Bangsa";
    static $no = 1;

    public function __construct($nip, $nama, $jabatan, $agama, $status) {
        $this->nip = $nip;
        $this->nama = $nama;
        $this->jabatan = $jabatan;
        $this->agama = $agama;
        $this->status = $status;
    }

    public function setgajiPokok() {
        switch ($this->jabatan) {
            case 'Manager':
                $gajipokok = 15000000;
                break;
            case 'Asmen':
                $gajipokok = 10000000;
                break;
            case 'Kabag':
                $gajipokok = 7000000;
                break;
            case 'Staff':
                $gajipokok = 4000000;
                break;
            default:
                $gajipokok = 0;
                break;
        }
            return $gajipokok;
    }
    public  function setTunjanganjabatan() {
        $tunjanganjabatan = (20 * $this->setgajiPokok()) / 100;
        return $tunjanganjabatan;
    }

    public function setTunjanganKeluarga() {
        $tunjangankeluarga = ($this->status == "Menikah") ? (10 * $this->setgajiPokok()) / 100 : 0;
        return $tunjangankeluarga;
    }

    public function setgajiKotor() {
        $gajikotor = $this->setgajiPokok() + $this->setTunjanganjabatan() + $this->setTunjanganKeluarga();
        return $gajikotor;
    }

    public function setZakat() {
        $zakat = ($this->agama == "Islam" && $this->setgajiKotor() >= 6000000) ? (2.5 * $this->setgajiPokok()) / 100 : 0;
        return $zakat;
    }

    public function setgajiBersih() {
        $gajibersih = $this->setgajiKotor() - $this->setZakat();
        return $gajibersih;
    }

    public function mencetak() {
        echo '
        <div class="col-12">
            <div class="card mt-3 bg-white">
                <div class="card-header text-dark">
                    <h4>'.Pegawai::PT.'</h4>
                </div>
                <div class="card-body">
                <table class="table table-bordered table-striped table-light">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama Pegawai</th>
                        <th>Jabatan</th>
                        <th>Agama</th>
                        <th>Status</th>
                        <th>Gaji Pokok</th>
                        <th>Tunjangan Jabatan</th>
                        <th>Tunjangan Keluarga</th>
                        <th>Gaji Kotor</th>
                        <th>Zakat</th>
                        <th>Gaji Bersih</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>'.self::$no++.'</th>
                        <th>'.$this->nip.'</th>
                        <th>'.$this->nama.'</th>
                        <th>'.$this->jabatan.'</th>
                        <th>'.$this->agama.'</th>
                        <th>'.$this->status.'</th>
                        <th>Rp.'.number_format($this->setgajiPokok()).'</th>
                        <th>Rp.'.number_format($this->setTunjanganjabatan()).'</th>
                        <th>Rp.'.number_format($this->setTunjanganKeluarga()).'</th>
                        <th>Rp.'.number_format($this->setgajiKotor()).'</th>
                        <th>Rp.'.number_format($this->setZakat()).'</th>
                        <th>Rp.'.number_format($this->setgajiBersih()).'</th>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>';

    }
}
?>