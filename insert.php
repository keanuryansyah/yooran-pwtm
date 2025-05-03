<?php
require('database.php');
if(isset($_POST['submit'])) {
    global $conn;
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn, "INSERT INTO mahasiswa (id, nama_mhs, nim_mhs, prodi_mhs, alamat_mhs) VALUES (null, '$nama', '$nim', '$prodi', '$alamat')");

    header('Location: tugas3.php');
    exit;
}

?>