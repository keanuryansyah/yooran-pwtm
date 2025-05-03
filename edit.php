<?php
require('database.php');
if (isset($_POST['submit-we'])) {
    $nim = $_POST['nim-we'];
    $nama = $_POST['nama-we'];
    $prodi = $_POST['prodi-we'];
    $alamat = $_POST['alamat-we'];

    $getNim = mysqli_query($conn, "SELECT nim_mhs FROM mahasiswa WHERE nim_mhs = '$nim' ");

    if (mysqli_num_rows($getNim) > 0) {

        $getRow = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim_mhs = '$nim' ");
        $thisRow = mysqli_fetch_assoc($getRow);

        if (strlen($nama) > 0) {
            $nama = $nama;
        } else {
            $nama = $thisRow['nama_mhs'];
        }

        if (strlen($prodi) > 0) {
            $prodi = $prodi;
        } else {
            $prodi = $thisRow['prodi_mhs'];
        }

        if (strlen($alamat) > 0) {
            $alamat = $alamat;
        } else {
            $alamat = $thisRow['alamat_mhs'];
        }

        mysqli_query($conn, "UPDATE mahasiswa SET nama_mhs = '$nama', prodi_mhs = '$prodi', alamat_mhs = '$alamat' WHERE nim_mhs = '$nim' ");

        header('Location: tugas3.php');
        exit;

        exit;
    } else {
        header('Location: tugas3.php?nodata');
        exit;
    }
}
