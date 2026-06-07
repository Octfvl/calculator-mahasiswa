<?php

$hasil = false;

$nama = "";
$tugas = "";
$uts = "";
$uas = "";

if(isset($_POST['hitung'])){

    $nama = $_POST['nama'];
    $tugas = $_POST['tugas'];
    $uts = $_POST['uts'];
    $uas = $_POST['uas'];

    $nilaiAkhir =
        ($tugas * 0.3) +
        ($uts * 0.3) +
        ($uas * 0.4);

    if($nilaiAkhir >= 85){
        $grade = "A";
    }
    elseif($nilaiAkhir >= 70){
        $grade = "B";
    }
    elseif($nilaiAkhir >= 60){
        $grade = "C";
    }
    elseif($nilaiAkhir >= 50){
        $grade = "D";
    }
    else{
        $grade = "E";
    }

    $status =
        ($nilaiAkhir >= 60)
        ? "LULUS"
        : "TIDAK LULUS";

    $hasil = true;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Grade Calculator</title>

<link rel="stylesheet" href="style.css">

</head>
<body>

<div class="card">

    <h1>🎓 Student Grade Calculator</h1>
    <p class="subtitle">
        Hitung nilai akhir mahasiswa secara otomatis
    </p>

    <form method="POST">

        <input
            type="text"
            name="nama"
            placeholder="Nama Mahasiswa"
            value="<?= $nama ?>"
            required>

        <input
            type="number"
            name="tugas"
            placeholder="Nilai Tugas"
            min="0"
            max="100"
            value="<?= $tugas ?>"
            required>

        <input
            type="number"
            name="uts"
            placeholder="Nilai UTS"
            min="0"
            max="100"
            value="<?= $uts ?>"
            required>

        <input
            type="number"
            name="uas"
            placeholder="Nilai UAS"
            min="0"
            max="100"
            value="<?= $uas ?>"
            required>

        <div class="button-group">

            <button
                type="submit"
                name="hitung"
                class="btn-primary">
                Hitung
            </button>

            <button
                type="button"
                class="btn-secondary"
                onclick="window.location.href='index.php'">
                Reset
            </button>

        </div>

    </form>

    <?php if($hasil): ?>

        <div class="result">

            <h2>📊 Hasil Perhitungan</h2>

            <div class="item">
                <span>Nama</span>
                <strong><?= htmlspecialchars($nama) ?></strong>
            </div>

            <div class="item">
                <span>Nilai Akhir</span>
                <strong><?= round($nilaiAkhir,2) ?></strong>
            </div>

            <div class="item">
                <span>Grade</span>
                <span class="grade-badge">
                    <?= $grade ?>
                </span>
            </div>

            <div class="item">
                <span>Status</span>

                <span class="<?= ($status == 'LULUS')
                    ? 'success'
                    : 'danger'; ?>">

                    <?= $status ?>

                </span>
            </div>

        </div>

    <?php endif; ?>

</div>

</body>
</html>