<?php
//koneksi database
$conn = mysqli_connect("localhost", "root", "", "ustadzrajie" );
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query) ;

    // menyediakan wadahnya
    $rows =[];

    // yg akan di ambil setiap data
    while ( $row = mysqli_fetch_assoc($result)) {
    echo '<img src="iamge/' . $row['gambar'] . '" width="100">';
    // menambahkan elemen baru setiap array
        $rows[] = $row;
    }

    //mengembalikan data, rows bentuknya sudah array assosiatif
    return $rows;
}

function tambah ($data) {
global $conn;

$nama = htmlspecialchars($data['nama']);
$nis = htmlspecialchars($data['nis']);
$email = htmlspecialchars($data['email']);
$jurusan = htmlspecialchars($data['jurusan']);
$gambar = htmlspecialchars($data['gambar']);

$query = "INSERT INTO siswa VALUES ('', '$nama', '$nis', '$email', '$jurusan', '$gambar')";
mysqli_query($conn, $query);

return mysqli_affected_rows($conn);
}
?>