<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas 3 PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>

  <body>
    <?php 
    $mhs1 = ["nim" => "1904411221", "nama" => "Fahira Febrina", "nilai" => 80];
    $mhs2 = ["nim" => "1904411222", "nama" => "Nur Afika Firanti", "nilai" => 95];
    $mhs3 = ["nim" => "1904411223", "nama" => "Puput Febrianti", "nilai" => 67];
    $mhs4 = ["nim" => "1904411224", "nama" => "Iren Kirana", "nilai" => 70];
    $mhs5 = ["nim" => "1904411225", "nama" => "Siti Nurwahida", "nilai" => 70];
    $mhs6 = ["nim" => "1904411226", "nama" => "Wanda Lorenza", "nilai" => 55];
    $mhs7 = ["nim" => "1904411227", "nama" => "Nurnaini", "nilai" => 87];
    $mhs8 = ["nim" => "1904411228", "nama" => "Ria Reski Aulia", "nilai" => 50];
    $mhs9 = ["nim" => "1904411229", "nama" => "Icha Khodija", "nilai" => 80];
    $mhs10 = ["nim" => "1904411230", "nama" => "Nadia Amalia Amnur", "nilai" => 40];
    
    $kumpulanMahasiswa = [$mhs1, $mhs2, $mhs3, $mhs4, $mhs5, $mhs6, $mhs7, $mhs8, $mhs9, $mhs10];
    $kumpulanJudul = ["No", "NIM", "Nama", "Nilai", "Keterangan", "Grade", "Predikat"];
    ?>
    <h1 class="text-center">Data Nilai Mahasiswa</h1>
    <div class="comtainer">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <?php 
                    foreach ($kumpulanJudul as $judul) { ?>
                        <th><?= $judul ?></th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                    <?php 
                    $no = 1;
                    foreach ($kumpulanMahasiswa as $mahasiswa) {
                        $nim = $mahasiswa['nim'];
                        $nama = $mahasiswa['nama'];
                        $nilai = $mahasiswa['nilai'];

                        $keterangan = ($nilai >= 60) ? 'Lulus' : 'Gagal';

                        if ($nilai >= 90 && $nilai <= 100) {
                            $grade = 'A';
                        } 
                        elseif ($nilai >= 80 && $nilai < 90) {
                            $grade = 'B';
                        }
                        elseif ($nilai >= 70 && $nilai < 80) {
                            $grade = 'C';
                        }
                        elseif ($nilai >= 60 && $nilai < 70) {
                            $grade = 'D';
                        }
                        else {
                            $grade = 'E';
                        }
                        switch ($grade) {
                            case 'A':
                                $predikat = 'Memuaskan';
                                break;
                            case 'B':
                                $predikat = 'Baik';
                                break;
                            case 'C':
                                $predikat = 'Cukup';
                                break;
                            case 'D':
                                $predikat = 'Kurang';
                                break;
                            default:
                                $predikat = 'Buruk';
                                break;
                        }
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $nim ?></td>
                            <td><?= $nama ?></td>
                            <td><?= $nilai ?></td>
                            <td><?= $keterangan ?></td>
                            <td><?= $grade ?></td>
                            <td><?= $predikat ?></td>
                        </tr>
                    <?php } ?>
            </tbody>
            <tfoot>
                <?php
                $jumlahmahasiswa = count($kumpulanMahasiswa);
                $kumpulanNilai = array_column($kumpulanMahasiswa, 'nilai');
                $nilaiTertinggi = max($kumpulanNilai);
                $nilaiTerendah = min($kumpulanNilai);
                $totalNilai = array_sum($kumpulanNilai);
                $rata2 = $totalNilai / $jumlahmahasiswa;

                $tfoot = [
                    'Nilai Tertingi' => $nilaiTertinggi,
                    'Nilai Terendah' => $nilaiTerendah,
                    'Rata-rata' => $rata2,
                    'Jumlah Mahasiswa' => $jumlahmahasiswa,
                ];

                foreach ($tfoot as $key => $value) { ?>
                    <tr>
                        <th colspan='4'><?= $key ?></th>
                        <th colspan='3'><?= $value ?></th>
                    </tr>

                <?php } ?>
            </tfoot>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
  
</html>