<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tugas 2 PHP</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>

    <body>
    <div class="container px-5 my-5">
    <form method="POST">
        <div class="form-floating mb-3">
            <input class="form-control" name="namapegawai" id="namaPegawai" type="text" placeholder="Nama Pegawai" data-sb-validations="required" />
            <label for="namaPegawai">Nama Pegawai</label>
            <div class="invalid-feedback" data-sb-feedback="namaPegawai:required">Nama Pegawai is required.</div>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" name="agama" id="agama" aria-label="Agama">
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
            </select>
            <label for="agama">Agama</label>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Jabatan</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="Manager" id="manager" type="radio" name="jabatan" data-sb-validations="" />
                <label class="form-check-label" for="manager">Manager</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="Asisten" id="asisten" type="radio" name="jabatan" data-sb-validations="" />
                <label class="form-check-label" for="asisten">Asisten</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="Kabag" id="kabag" type="radio" name="jabatan" data-sb-validations="" />
                <label class="form-check-label" for="kabag">Kabag</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="Staff" id="staff" type="radio" name="jabatan" data-sb-validations="" />
                <label class="form-check-label" for="staff">Staff</label>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Status</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="Menikah" id="menikah" type="radio" name="status" data-sb-validations="" />
                <label class="form-check-label" for="menikah">Menikah</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="Belum Menikah" id="belumMenikah" type="radio" name="status" data-sb-validations="" />
                <label class="form-check-label" for="belumMenikah">Belum Menikah</label>
            </div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="jumlahanak" id="jumlahAnak" type="text" placeholder="Jumlah Anak" data-sb-validations="required" />
            <label for="jumlahAnak">Jumlah Anak</label>
            <div class="invalid-feedback" data-sb-feedback="jumlahAnak:required">Jumlah Anak is required.</div>
        </div>
        <div class="d-none" id="submitSuccessMessage">
            <div class="text-center mb-3">
                <div class="fw-bolder">Form submission successful!</div>
                <p>To activate this form, sign up at</p>
                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
            </div>
        </div>
        <div class="d-none" id="submitErrorMessage">
            <div class="text-center text-danger mb-3">Error sending message!</div>
        </div>
        <div class="d-grid">
            <button class="btn btn-primary btn-lg" name="submit" type="submit">Submit</button>
        </div>
    </form>
    </div>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        </form>

        <?php 
        if (isset($_POST['submit'])) {
            $namapegawai = $_POST['namapegawai'];
            $agama= $_POST['agama'];
            $jabatan = $_POST['jabatan'];
            $status = $_POST['status'];
            $jumlahanak = $_POST['jumlahanak'];   
       
        switch ($jabatan) {
            case 'Manager': $gajipokok = 20000000; break;
            case 'Asisten': $gajipokok = 15000000; break;
            case 'Kabag': $gajipokok = 10000000; break;
            case 'Staff': $gajipokok = 4000000; break;
            
            default: 
                $gajipokok = 0;
            break;
        }
        $tunjanganjabatan = 20 * $gajipokok / 100;

        if ($status == "Menikah" && $jumlahanak <= 2) {
            $tunjangankeluarga = 5 * $gajipokok / 100;
        }
        elseif ($status == "Menikah" && $jumlahanak <= 5) {
            $tunjangankeluarga = 10 * $gajipokok / 100;
        }
        elseif ($status == "Menikah" && $jumlahanak > 5) {
            $tunjangankeluarga = 15 * $gajipokok / 100;
        }
        else {
            $tunjangankeluarga = 0;
        }

        $gajikotor = $gajipokok + $tunjanganjabatan + $tunjangankeluarga;

        $zakat = ($agama == "Islam" && $gajikotor >= 6000000) ? (2.5 * $gajikotor) / 100 : 0;

        $takehomepay = $gajikotor - $zakat;

        ?>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">DATA PEGAWAI</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table>
                    <tr>
                        <td>Nama Pegawai</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?=$namapegawai ?></td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?=$agama ?></td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?=$jabatan ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?=$status ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Anak</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?=$jumlahanak ?></td>
                    </tr>
                    <tr>
                        <td>Gaji Pokok</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?="Rp".number_format($gajipokok, 2, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td>Tunjangan Jabatan</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?="Rp".number_format($tunjanganjabatan, 2, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td>Tunjangan Keluarga</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?="Rp".number_format($tunjangankeluarga, 2, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td>Zakat Profesi</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?="Rp".number_format($zakat, 2, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td>Take Home Pay</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?="Rp".number_format($takehomepay, 2, ',', '.') ?></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>

        <?php
        }
        ?> 
        <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
        </script>
        <script>
            const modal = new bootstrap.Modal("#exampleModal");
            modal.show();
        </script>
    </body>
</html>