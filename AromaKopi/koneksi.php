<?php
$server = "127.0.0.1:3308";
$user = "root";
$sandi = "";
$basisdata = "aromakopi";
$terhubung = mysqli_connect($server, $user, $sandi, $basisdata);

if (!$terhubung)
    echo "database tidak terhubung";
?>
