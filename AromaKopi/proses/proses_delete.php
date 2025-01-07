<?php
// Aktifkan error reporting untuk debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "../koneksi.php";

if (isset($_POST['input_menu_validate'])) {
    // Ambil data dari form
    $id = htmlentities($_POST['id_produk']);

    // Hapus data produk dari database
    $query = "DELETE FROM produk WHERE id_produk = '$id'";

    // Eksekusi query
    if (mysqli_query($terhubung, $query)) {
        echo '<script>
                alert("Data berhasil dihapus!");
              </script>';
        header('Location: ../menu.php');  
         exit(); 
    } else {
        echo '<script>
                alert("Data gagal dihapus: ' . mysqli_error($terhubung) . '");
              </script>';
              header('Location: ../menu.php');
    }
}
?>
  