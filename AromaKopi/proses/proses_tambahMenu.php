<?php
// Aktifkan error reporting untuk debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "../koneksi.php";

if (isset($_POST['input_menu_validate'])) {
    // Ambil data dari form
    $id = htmlentities($_POST['id_produk']);
    $nama = htmlentities($_POST['nama_produk']);
    $harga = htmlentities($_POST['harga']);
    $deskripsi = htmlentities($_POST['deskripsi']);

    // Upload gambar
    $gambar = $_FILES['gambar'];
    $gambar_nama = $gambar['name'];
    $gambar_tmp = $gambar['tmp_name']; // Define the temporary file name
    $gambar_folder = "../assets/png/" . $gambar_nama; // Ensure there's a trailing slash for the folder

    // Cek apakah gambar berhasil diupload
    if (is_uploaded_file($gambar_tmp)) {
        // Pindahkan file gambar ke folder yang telah ditentukan
        if (move_uploaded_file($gambar_tmp, $gambar_folder)) {
            // Query insert data ke database
            $query = "INSERT INTO produk (id_produk, nama_produk, harga, deskripsi, gambar)
                      VALUES ('$id', '$nama', '$harga', '$deskripsi', '$gambar_nama')";

            if (mysqli_query($terhubung, $query)) {
                echo '<script>
                        alert("Data berhasil disimpan!");
                      </script>';
                       header('Location: ../menu.php');  
            } else {
                echo '<script>
                        alert("Data gagal disimpan: ' . mysqli_error($terhubung) . '");
                      </script>';
                      header('Location: ../menu.php');  
            }
        } else {
            echo '<script>alert("Gagal mengupload gambar!");</script>';
            header('Location: ../menu.php');  
        }
    } else {
        echo '<script>alert("Gambar tidak valid!");</script>';
        header('Location: ../menu.php');  
    }
}
?>
