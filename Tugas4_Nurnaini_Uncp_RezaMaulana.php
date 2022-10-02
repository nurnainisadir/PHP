<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas 4 PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>
<body>
<?php
    require "Tugas4.php";

    $data = [
        [
            "nip" => "111",
            "nama"=> "Faizal Mahardika",
            "jabatan" => "Manager",
            "agama" => "Islam",
            "status" => "Menikah",
        ],
        [
            "nip" => "112",
            "nama"=> "Yusuf Sauran",
            "jabatan" => "Asmen",
            "agama" => "Hindu",
            "status" => "Belum Menikah",  
        ],
        [
            "nip" => "113",
            "nama"=> "Nurnaini",
            "jabatan" => "Kabag",
            "agama" => "Islam",
            "status" => "Belum Menikah",  
        ],
        [
            "nip" => "114",
            "nama"=> "Didit Prayoga",
            "jabatan" => "Manager",
            "agama" => "Kristen",
            "status" => "Belum Menikah",  
        ],
        [
            "nip" => "115",
            "nama"=> "Puput Febrianti",
            "jabatan" => "Staff",
            "agama" => "Islam",
            "status" => "Menikah",  
        ],
    ]
    ?>
    <div class="container">
        <div class="row">
            <?php
                foreach ($data as $pg) {
                    $Pegawai = new Pegawai($pg["nip"],$pg["nama"],$pg["jabatan"],$pg["agama"],$pg["status"]);
                    $Pegawai->mencetak();               
                }
            ?>
        <div>
        <h5>Jumlah Pegawai: <?= Pegawai::$no - 1 ?></h5>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>