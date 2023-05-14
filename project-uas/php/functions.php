<?php 
require_once "conn.php";

function queryRead($query)
{
    global $conn;
    
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    
    return $rows;
}

function handleUpload()
{
    $nama_berkas = $_FILES['berkas']['name'];
    $ukuran_berkas = $_FILES['berkas']['size'];
    $error = $_FILES['berkas']['error'];
    $tmpname = $_FILES['berkas']['tmp_name'];

    if( $error === 4) {
        echo 
                '<script> 
                alert("Silahkan upload file")
                document.location.href = "../index.php"
                </script>
            ';
        return false;
    }

    $valid_extension = ['jpg', 'png', 'jpeg'];
    $berkas_extension = explode('.', $nama_berkas);
    $berkas_extension = strtolower(end($berkas_extension));

    if( !in_array($berkas_extension, $valid_extension) ) {
        echo 
                '<script> 
                alert("File harus berupa gambar")
                document.location.href = "../index.php"
                </script>
            ';
        return false;
    }

    if( $ukuran_berkas > 2000000 ) {
        echo 
                '<script> 
                alert("File terlalu besar")
                document.location.href = "../index.php"
                </script>
            ';
        return false;
    }

    $nama_berkas_baru = uniqid();
    $nama_berkas_baru .= '.'; $nama_berkas_baru .= $berkas_extension;

    move_uploaded_file( $tmpname, '../berkas/' . $nama_berkas_baru );

    return $nama_berkas_baru;

}

function queryCreate($data)
{
    global $conn;

    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $semester = htmlspecialchars($data["semester"]);
    $jenjang = htmlspecialchars($data["jenjang"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $berkas = handleUpload();

    if( !$berkas ) {
        return false;
    }

    $query = "INSERT INTO mahasiswa( berkas, nrp, nama, jenis_kelamin, semester, jenjang, prodi, kelas ) VALUES( '$berkas', '$nrp', '$nama', '$jenis_kelamin', '$semester', '$jenjang', '$prodi', '$kelas' )";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function queryDelete($id)
{
    global $conn;
    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id = $id"));

    unlink( './../berkas/' . $row['berkas'] );
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function queryUpdate($data)
{
    global $conn;

    $id = $data["id"];
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $semester = htmlspecialchars($data["semester"]);
    $jenjang = htmlspecialchars($data["jenjang"]);
    $prodi = htmlspecialchars($data["prodi"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $berkas_lama = $data["berkaslama"];
    
    if( $_FILES['berkas']['error'] === 4 ) {
        $berkas = $berkas_lama;
    } else {
        $berkas = handleUpload();
    }

    $query = "UPDATE mahasiswa SET berkas='$berkas', nrp='$nrp', nama='$nama', jenis_kelamin='$jenis_kelamin', semester='$semester', jenjang='$jenjang', prodi='$prodi', kelas='$kelas' WHERE id='$id' ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function userRegister($data)
{
    global $conn;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username sudah terdaftar');
            </script>";
        return false;
    }

    if($password !== $password2) {
        echo "<script>
                alert('Pastikan konfirmasi password sesuai');
            </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users( username, password, role ) VALUES( '$username', '$password', '' )";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

?>