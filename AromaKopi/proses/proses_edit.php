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

    if (!empty($_FILES['gambar']['name'])) {
      
        $gambar = $_FILES['gambar'];
        $gambar_nama = $gambar['name'];
        $gambar_tmp = $gambar['tmp_name'];
        $gambar_folder = "../assets/png/" . $gambar_nama;

        
        if (move_uploaded_file($gambar_tmp, $gambar_folder)) {
         
            $query = "UPDATE produk 
                      SET nama_produk='$nama', harga='$harga', deskripsi='$deskripsi', gambar='$gambar_nama'
                      WHERE id_produk = '$id'";
        } else {
            echo '<script>alert("Gagal mengupload gambar!");</script>';
            exit();
        }
    } else {
       
        $query = "UPDATE produk 
                  SET nama_produk='$nama', harga='$harga', deskripsi='$deskripsi'
                  WHERE id_produk = '$id'";
    }

   
    if (mysqli_query($terhubung, $query)) {
        echo '<script>
                alert("Data berhasil diupdate!");
              </script>';
              header('Location: ../menu.php');  
    } else {
        echo '<script>
                alert("Data gagal diupdate: ' . mysqli_error($terhubung) . '");
               
              </script>';
              header('Location: ../menu.php');
    }
}
?>
