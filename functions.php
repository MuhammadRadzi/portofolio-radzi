<?php
//koneksi database
$conn = mysqli_connect("localhost", "root", "", "ustadzrajie");
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);

    // menyediakan wadahnya
    $rows = [];

    // yg akan di ambil setiap data
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<img src="image/' . $row['gambar'] . '" width="100">';
        // menambahkan elemen baru setiap array
        $rows[] = $row;
    }

    //mengembalikan data, rows bentuknya sudah array assosiatif
    return $rows;
}

function tambah($data)
{
    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $nis = htmlspecialchars($data['nis']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambar = htmlspecialchars($data['gambar']);

    if ($_FILES['gambar']['error'] === 4) {
        // 4 = UPLOAD_ERR_NO_FILE → tidak ada file diupload
        $gambar = "default.jpg";
    } else {
        // upload gambar
        $gambar = $_FILES['gambar']['name'];
        $tmpName = $_FILES['gambar']['tmp_name'];
        
        // simpan file ke folder image/
        $targetDir = "image/cache/";
        $targetFile = $targetDir . basename($gambar);
        move_uploaded_file($tmpName, $targetFile);
    }

    $query = "INSERT INTO siswa VALUES ('', '$nama', '$nis', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
