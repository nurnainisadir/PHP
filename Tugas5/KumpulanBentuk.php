<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas 5 PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
<body>
    <?php 
    require_once "Lingkaran.php";
    require_once "PersegiPanjang.php";
    require_once "Segitiga.php";

    $arrayJudulTable = ["No", "Nama Bidang", "Keterangan", "Luas Bidang", "Keliling Bidang"];
    ?>
    <table class="table table-bordered my-5">
        <thead>
            <tr>
                <?php 
                foreach ($arrayJudulTable as $judul) { ?>
                <th><?= $judul ?></th>
            <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php  
            $persegiPanjang = new PersegiPanjang(12, 5);
            $lingkaran = new Lingkaran(14);
            $segitiga = new Segitiga(10, 12);

            $arrayBentuk = [$persegiPanjang, $lingkaran, $segitiga];
            $no = 1;
            foreach ($arrayBentuk as $bentuk) {
                $namaBidang = $bentuk->namaBidang();
                $keterangan = $bentuk->keterangan();
                $luasBidang = $bentuk->luasBidang();
                $kelilingBidang = $bentuk->kelilingBidang();

                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $namaBidang ?></td>
                    <td><?= $keterangan ?></td>
                    <td><?= $luasBidang ?></td>
                    <td><?= $kelilingBidang ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
  
</html>