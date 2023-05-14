<?php
    require_once("conn.php");
    $id = date_timestamp_get(date_create());
    $nrp = $_POST['nrp'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];

    $sql = "INSERT INTO mahasiswa VALUES('$id','$nrp','$nama','$jenis_kelamin')";
    $result = mysqli_query($conn, $sql);
    header('location:index.php?$pesan=input');
?>