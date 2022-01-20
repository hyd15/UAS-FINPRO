<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

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
</nav>
<div class="d-flex justify-content-center">
<div style="width: 900px">
<table class="table table-borderless">
  <?php 
    $conn = mysqli_connect("localhost","root","","fp");
    if(isset($_GET['judul']) ) {
      $judul = $_GET['judul'];
    }
    $artikel = "SELECT * FROM artikel WHERE judul= '$judul'";
    $result = mysqli_query($conn,$artikel);
    if(mysqli_num_rows($result)){
      while ($row=mysqli_fetch_assoc($result)) {
       
      

   ?>
  <tbody>
    <tr>
      <th scope="row" style="text-align: center;"><?=$row["judul"] ?></th>
      </tr>
      <tr>
      <td style="text-align: center;"><img style="width: 200px; height: 200px"  src="img/<?= $row["gambar"] ?>"></td>
      </tr>
      <tr >
        <div>
      <td ><?php foreach (explode('.', $row["isi"])as $perArtikel){ ?><p style="margin-left: 100px; text-align: justify;"><?= htmlspecialchars($perArtikel); ?></p> <?php }  ?></td>
      </div>
      </tr>
  </tbody>
  <?php 
  }
    }

   ?>
</table>
</div>
</div>
 
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
