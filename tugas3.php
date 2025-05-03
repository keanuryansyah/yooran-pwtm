<?php
require('database.php');

function ambilData($sql)
{
    global $conn;
    $allDatas = mysqli_query($conn, $sql);
    $rows = [];
    while ($row = mysqli_fetch_assoc($allDatas)) {
        $rows[] = $row;
    }

    return $rows;
}

$data = ambilData("SELECT * FROM mahasiswa");

if (isset($_GET['remove'])) {
    $nim = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE nim_mhs = '$nim' ");
    header('Location: tugas3.php');
    exit;
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header id="header-section" class="section">
        <div class="container">
            <div id="header-content" class="w100 h100">
                <div id="hc-col1" class="hc-col">
                    Biodata
                </div>
                <div id="hc-col2" class="hc-col">
                    <a href="Biodata.html">Tugas 1</a>
                    <a href="Tugas2.html">Tugas 2</a>
                    <a href="tugas3.php">Tugas 3</a>
                </div>
            </div>
        </div>
    </header>
    <div id="form-wrapper">
        <div id="form-content-col1" class="fc">
            <div id="form-1" class="form">
                <form action="insert.php" method="post">
                    <h2>Masukkan data</h2>
                    <div class="fm-row1 fm-row">
                        <label for="nama" name="nama">Nama:</label>
                        <input type="text" id="nama" name="nama" required>
                    </div>
                    <div class="fm-row2 fm-row">
                        <label for="nim" name="nim">Nim:</label>
                        <input type="text" id="nim" name="nim" required>
                    </div>
                    <div class="fm-row3 fm-row">
                        <label for="prodi" name="prodi">Prodi:</label>
                        <input type="text" id="prodi" name="prodi" required>
                    </div>
                    <div class="fm-row4 fm-row">
                        <label for="alamat" name="alamat">Alamat:</label>
                        <textarea name="alamat" id="alamat" required></textarea>
                    </div>
                    <button type="submit" name="submit">Submit</button>
                </form>
            </div>

        </div>
        <div id="form-content-col2" class="fc">
            <div class="table-wrapper">
                <table border="1" cellpadding="10" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Prodi</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- kalo data tidak di temukan -->
                        <?php
                        if (!$data) {
                            echo '<tr><td colspan="5" style="text-align:center;">Tidak ada data.</td></tr>';
                        } else {
                            foreach ($data as $data) {
                        ?>
                                <tr>

                                    <td><?php echo $data['nama_mhs']; ?></td>
                                    <td><?php echo $data['nim_mhs']; ?></td>
                                    <td><?php echo $data['prodi_mhs']; ?></td>
                                    <td><?php echo $data['alamat_mhs'] ?></td>

                                    <td>
                                        <a href="tugas3.php?remove=<?php echo $data['nim_mhs']; ?>" class="tombol-hapus" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                                    </td>
                                </tr>
                        <?php

                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>
            <div id="form-2" class="form">
                <form action="edit.php" method="post">
                    <h2>Edit data</h2>
                    <div class="fm-row2 fm-row">
                        <label for="nim-we" name="nim-we">Nim:</label>
                        <input type="text" id="nim-we" name="nim-we" required>
                        <?php
                        if (isset($_GET['nodata'])) {
                            echo '<p class="nodata">Nim tidak ditemukan.</p>';
                        }

                        ?>
                    </div>
                    <div class="fm-row1 fm-row">
                        <label for="nama-we" name="nama-we">Nama:</label>
                        <input type="text" id="nama-we" name="nama-we">
                    </div>
                    <div class="fm-row3 fm-row">
                        <label for="prodi-we" name="prodi-we">Prodi:</label>
                        <input type="text" id="prodi-we" name="prodi-we">
                    </div>
                    <div class="fm-row4 fm-row">
                        <label for="alamat-we" name="alamat-we">Alamat:</label>
                        <textarea name="alamat-we" id="alamat-we"></textarea>
                    </div>
                    <button type="submit" name="submit-we">Submit</button>
                </form>
            </div>

        </div>
    </div>
</body>

</html>