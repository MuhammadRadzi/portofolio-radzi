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

// fungsi tambah
function tambah($data)
{
    global $conn;
    // ambil data dari tiap elemen dalam form
    $nama = htmlspecialchars($data['nama']);
    $nis = htmlspecialchars($data['nis']);
    $email = htmlspecialchars($data['email']);
    $jurusan = htmlspecialchars($data['jurusan']);
    $gambar = htmlspecialchars($data['gambar']);

    // cek apakah user tidak pilih gambar
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

    // query insert data ke database
    $query = "INSERT INTO siswa VALUES ('', '$nama', '$nis', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query);

    // mengembalikan jumlah baris yang terpengaruh oleh query
    return mysqli_affected_rows($conn);
}

// fungsi hapus
function hapus($id)
{
    global $conn;

    // ambil nama file gambar dari database
    $result = mysqli_query($conn, "SELECT gambar FROM siswa WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // kalau bukan default.jpg, hapus file dari folder
    if ($row['gambar'] !== 'default.jpg') {
        $filePath = "image/cache/" . $row['gambar'];
        // jika file foto ada, hapus file tersebut
        if (file_exists($filePath)) {
            unlink($filePath); // hapus file
        }
    }

    // query hapus data dari database
    mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

// fungsi ubah
function ubah($data)
{
    global $conn;

    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nis = htmlspecialchars($data["nis"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data['gambar']);

    // ambil gambar lama
    $gambarLama = $data["gambarLama"];

    // cek apakah user upload gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama; // tidak upload → pakai gambar lama
    } else {
        $gambar = $_FILES['gambar']['name'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        // hapus gambar lama (kecuali default.jpg)
        if ($gambarLama !== "default.jpg" && file_exists("image/cache/" . $gambarLama)) {
            unlink("image/cache/" . $gambarLama);
        }

        // simpan file ke folder image/
        move_uploaded_file($tmpName, "image/cache/" . $gambar);
    }

    // query ubah data di database
    $query = "UPDATE siswa SET 
                nama = '$nama',
                nis = '$nis',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
                WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
