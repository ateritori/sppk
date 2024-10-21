<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>TAMBAH DATA</title>
</head>
<style type="text/css">
    form {
        width: 100%;
    }

    body {
        font-family: "Verdana";
    }

    .error {
        font-size: 11px;
        font-weight: bold;
        position: relative;
        left: 10px;
        margin-bottom: 6px;
        color: firebrick;
    }
</style>

<?php
require 'config/koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Cek apakah kriteria kosong
    if (empty($_POST['kriteria'])) {
        echo "<script>alert('Kriteria tidak boleh kosong'); window.location = 'dashboard.php?url=tambahkriteria';</script>";
        exit();
    }
    // Mendapatkan input dari form
    $kriteria = $_POST['kriteria'];
    $bobot = isset($_POST['bobot']) && $_POST['bobot'] !== "" ? $_POST['bobot'] : NULL;
    $atribut = isset($_POST['atribut']) && $_POST['atribut'] !== "" ? $_POST['atribut'] : NULL;
    $status_sub = $_POST['status_sub']; // Mendapatkan status sub-kriteria dari dropdown

    // Menyiapkan query dengan prepared statements untuk menyimpan data ke tabel Kriteria
    $query = "INSERT INTO Kriteria (nama_kriteria, bobot_kriteria, tipe_kriteria, punyasub) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    // Bind parameters sesuai dengan data yang diterima dari form
    $stmt->bind_param("sdsi", $kriteria, $bobot, $atribut, $status_sub);

    // Eksekusi query
    if ($stmt->execute()) {
        echo "<script>alert('Data Berhasil Disimpan'); window.location = 'dashboard.php?url=kriteria';</script>";
    } else {
        echo "<script>alert('Gagal Menyimpan Data: " . $conn->error . "'); window.location = 'dashboard.php?url=kriteria';</script>";
    }

    // Tutup statement
    $stmt->close();
}
?>

<body id="page-top">
    <br>
    <div class="card shadow" style="width: 50%;">
        <div class="card-header m-0 font-weight-bold" style="text-align:center; background-color: #167395; color: white">Tambah Data Kriteria</div>
        <div class="card-body">
            <form method="post" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group cols-sm-6">
                    <label style="color: black">Kriteria</label>
                    <input type="text" name="kriteria" value="<?= $kriteria ?>" class="form-control" style="color: black" required autofocus>
                    <span class="error"><?= $kriteriaErr ?></span>
                </div>

                <div class="form-group cols-sm-6">
                    <label style="color: black">Status Sub-Kriteria</label>
                    <select class="form-control" name="status_sub" style="color: black">
                        <option value="0">Tidak Memiliki Sub-Kriteria</option>
                        <option value="1">Memiliki Sub-Kriteria</option>
                    </select>
                </div>

                <div class="form-group cols-sm-6">
                    <label style="color: black">Bobot (antara 0.00 s/d 1.00)</label>
                    <input type="number" step="any" name="bobot" value="<?= $bobot ?>" class="form-control" style="color: black">
                    <span class="error"><?= $bobotErr ?></span>
                </div>

                <div class="form-group cols-sm-6">
                    <label style="color: black">Tipe Kriteria</label>
                    <select class="form-control" name="atribut" value="<?= $atribut ?>" style="color: black">
                        <option hidden></option>
                        <option value="cost">Cost</option>
                        <option value="benefit">Benefit</option>
                    </select>
                    <span class="error"><?= $atributErr ?></span>
                </div>

                <div class="form-group cols-sm-6">
                    <button type="submit" class="btn btn-secondary btn-icon-split" style="background: #167395" name="submit">
                        <span class="icon text-white-50">
                            <i class="fas fa-user-check"></i>
                        </span>
                        <span class="text">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>