<?php
session_start();
require "../koneksi.php";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$password = (isset($_POST['password'])) ? htmlentities($_POST['password']) : "";
if (!empty($_POST['submit_validate'])) {
    $query = mysqli_query($terhubung, "SELECT * FROM admin WHERE username = '$username' && password = '$password'");
    $hasil = mysqli_fetch_array($query);
    if ($hasil){
        $_SESSION["username_admin"] = $username;
        header('Location:../menu.php');
    } else {
        ?>
        <script>
            alert('Username atau password yang Anda masukkan salah');
            window.location='../loginAdmin.php';
        </script>
        <?php
    }
}
?>


