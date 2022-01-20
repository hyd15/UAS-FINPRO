<!doctype html>
<html lang="en">
  <head> 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <title>Beranda</title>


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
    <div class="container">
    <div class="row" id="load_data">
      <?php
        include 'dbconn.php';
        $query = "SELECT * FROM artikel ORDER BY id_artikel DESC";
        $dewan1 = $conn->prepare($query);
        $dewan1->execute();
        $res1 = $dewan1->get_result();
        while ($row = $res1->fetch_assoc()) {
          $id = $row["id_artikel"];
          $foto = $row["gambar"];
        $genre = $row["genre"];
          $judul = $row["judul"];
          if (strlen($judul) > 60) {
            $judul = substr($judul, 0, 60) . "...";
          }
          $deskripsi = $row["sinopsis"];
          if (strlen($deskripsi) > 100) {
            $deskripsi = substr($deskripsi, 0, 100) . "...";
          }
      ?>
      <div class="col-sm-3 mb-3">
          <div class="card" style="margin-top: 10px;">
          <img class="card-img-top" src="img/<?= $row["gambar"] ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title" style="min-height: 10px;"><?php echo $judul; ?></a></h5>
              <p class="card-text" style="min-height: 120px;"><?php echo $deskripsi; ?></p>
              <a href="viewBaca.php?judul=<?=$row["judul"] ?>" class="btn btn-primary">Read More</a> 
            </div>
            <div class="card-footer">
                <small class="text-muted">Genre : <?php echo $genre; ?></small>
              </div>
          </div>
        </div>
      <?php } ?>
    </div>
    </div>
  
  


















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