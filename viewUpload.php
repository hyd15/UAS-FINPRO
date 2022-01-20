<?php 
require 'db_conn.php';
session_start();
  if( !isset($_SESSION['username']) ){
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
  }
$artikel = query("SELECT * FROM artikel WHERE username='$_SESSION[username]'"); 

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="profil.css">

    <title>View Hasil Upload</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="Image/dark.jpg" alt="" width="50" height="50" class="d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        <a class="nav-link" href="profil.php">MyAccount</a>
        <a class="nav-link" href="viewUpload.php">Buat Cerita</a>
        <a class="nav-link" href="kategori.php">Genre</a>
      </div>
    </div>
  </div>
</nav>
  <section id="box-profile">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Judul</th>
      <th scope="col">Genre</th>
      <th scope="col">Sinopsis</th>
      <th scope="col">Isi</th>
      <th scope="col">Gambar</th>
    </tr>
  </thead>
  <?php $i=1 ?>
  <?php foreach ($artikel as $row ):  ?>
  <tbody>
  	
    <tr>
      <th scope="row"><?= $i; ?></th>
      <td><?= $row["judul"] ?></td>
      <td><?= $row["genre"] ?></td>
      <td><?= $row["sinopsis"] ?></td>
      <td><?= $row["isi"] ?></td>
      <td><img style="width: 40px" src="img/<?= $row["gambar"] ?>"></td>
      <td><a href="hapus.php?key=<?=$row["id_artikel"] ?>" onclick= "return confirm('Apakah anda ingin menghapus cerita?');">hapus</a><br>
        <a href="edit.php?key=<?=$row["id_artikel"] ?>">edit</a></td>
    </tr>

   
  </tbody>
  <?php $i++ ?>
  <?php endforeach; ?>

</table>
 <button type="button" class="btn btn-primary" style="border-radius: 10px; margin-left: 30px"><a href="buat.php" style="color: white">Buat Cerita</a></button>
 </section>
    <!-- Optional JavaScript; choose one of the two! -->

  <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

  </body>
</html>