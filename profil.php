<?php
  session_start();
  if( !isset($_SESSION['username']) ){
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
  }
?> 
<?php
  include 'dbconn.php';
  $query = ("SELECT * FROM users WHERE username='$_SESSION[username]'");
  $res = mysqli_query($conn,$query) or die(mysqli_error($conn));
  $tampil = $res->fetch_assoc();



?>

 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="profil.css">

    <title>Hello, world!</title>

</head>
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
  <body>
    <section id="box-profile" >
      <div class="img-profile">
        <div class="photo" style="background-image: url(Image/dark.jpg);"></div>
      </div>
      <div class="description">
        <h1><?=$tampil['name']?></h1>
        <p><?=$tampil['username']?></p>
        <button type="button" class="btn btn-outline-danger"><a href="logout.php" >Logout</a></button>
      </div>
      <div class="information">
        <div class="data">
          <p class="field">Location&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><?=$tampil['lokasi']?></span></p>
          <p class="text-gray"></p>
        </div>
        <div class="data">
          <p class="field">Age&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><?=$tampil['umur']?></span></p>
          <p class="text-gray"></p>
        </div>
        <div class="data">
          <p class="field">Total Project&nbsp;&nbsp;&nbsp;<span>3</span></p>
          <p class="text-gray"></p>
        </div>
      </div>
    </section>
       <section id="box-project">

      <h2 style="text-align:center;margin-top:30px;">Recent project</h2>
      <div class="container">
    <div class="row" id="load_data">
       <?php
        include 'dbconn.php';
        $query = "SELECT * FROM artikel WHERE username='$_SESSION[username]' ORDER BY id_artikel DESC ";
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
              <h5 class="card-title" style="min-height: 10px;"><?php echo $judul; ?></h5>
              <p class="card-text" style="min-height: 120px;"><?php echo $deskripsi; ?></p>
              <a href="viewBaca.php?judul=<?=$row["judul"] ?>" class="btn btn-primary">Read More</a> 
            </div>
            <div class="card-footer">
                <small class="text-muted">Genre : <?php echo $genre; ?></small>
              </div>
          </div>
        </div>
      <?php } ?>

    </section>
     



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

