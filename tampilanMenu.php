<?php
require "koneksi.php";
$query = mysqli_query($terhubung, "SELECT * FROM produk");
while ($RECORD = mysqli_fetch_array($query)) {
  $result[] = $RECORD;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampilan</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5 mb-5">
    <h2 class="text-center mb-4">MENU</h2>
    <?php if (empty($result)) { ?>
        <p class="text-center text-muted">Data produk tidak tersedia.</p>
    <?php } else { ?>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($result as $row) { ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="assets/png/<?php echo $row['gambar']; ?>" class="card-img-top" alt="<?php echo $row['nama_produk']; ?>" style="height: 270px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nama_produk']; ?></h5>
                            <p class="card-text"><?php echo $row['deskripsi']; ?></p>
                            <p class="card-text"><strong>Harga:</strong> Rp<?php echo number_format($row['harga'], 0, ',', '.'); ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>  
</body>
</html>


