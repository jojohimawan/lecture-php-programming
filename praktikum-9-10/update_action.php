<?php
    require_once("conn.php");
    $id = $_POST['id'];
    $nrp = $_POST['nrp'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    $sql = "UPDATE mahasiswa SET id = '$id', nrp = '$nrp', nama = '$nama',jenis_kelamin = '$jenis_kelamin' WHERE id = '$id'";
    mysqli_query($conn, $sql);
    header('location:index.php?$pesan=update');
?>