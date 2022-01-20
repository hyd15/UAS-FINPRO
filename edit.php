<?php 
require 'db_conn.php';
require 'edit_fungsi.php';
$key=$_GET["key"];
$artikel = query("SELECT * FROM artikel WHERE id_artikel = $key")[0]; 




if(isset($_POST["submit"])) {
	if(edit($_POST)>0){
		echo "data berhasil diedit";
	}else{
		echo "data gagal diedit";
	}

}
?>
 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Edit</title>
  </head>
  <body>

  <form action="" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <input type="hidden" name="id_artikel" value="<?=$artikel["id_artikel"] ?>"><br>


    <label for="judul">Judul</label>
    <input type="text" class="form-control" id="judul" name="judul" placeholder="inputkan judul anda disini" value="<?=$artikel["judul"]; ?>"> 
  </div>
   <div class="form-group">
    <label for="genre">Genre</label>
    <input type="text" class="form-control" id="genre" name="genre" placeholder="inputkan genre anda disini" value="<?=$artikel["genre"]; ?>"> 
  </div>
   <div class="form-group">
    <label for="sinopsis">Sinopsis</label>
    <input type="text" class="form-control" id="sinopsis" name="sinopsis" placeholder="inputkan sinopsis anda disini" value="<?=$artikel["sinopsis"]; ?>"> 
  </div>
   
    <div class="form-group">
    <label for="isi">Isi Cerita</label>
    <textarea class="form-control" id="isi" rows="3" name="isi" placeholder="inputkan isi cerita anda disini"><?= $artikel['isi'] ?></textarea>
  </div>
 

  <label for="gambar">Gambar Cover</label>
  <div class="input-group">
  <input type="file" class="form-control" id="gambar" name="gambar" value="<?=$artikel["gambar"];?>">
 
</div>

<button type="submit" class="btn btn-primary" name="submit">Submit</button>
<button type="button" class="btn btn-primary"><a href="viewUpload.php" style="color: white">Back</a></button>
<input type="hidden" name="username" value="<?=$artikel["username"] ?>"><br>


</form>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>


