<?php
// ob_start();
require_once("./konek.php");
require_once("./header.php");

$action = isset($_GET['action']) ? $_GET['action'] : '' ;
// echo $action;
if ($action == 'edit') {
  $id = $_GET['id'];
  $sql = "SELECT * from kategori where id_kategori= '".$id."'";
  $result = $conn->query($sql);
  
  $article = $result->fetch(PDO::FETCH_ASSOC);

}else{

  $article = [
    'id_kategori' => '',
    'nama_kategori' => '',
    
  ];

}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //jalankan perintah untuk insert ke database
  $id = $_POST['id_kategori'];
  $nama   = $_POST['nama_kategori'];
  
  $sql = "update kategori set id_kategori = '$id', nama_kategori = '$nama' where id_kategori = '".$_POST['id_kat']."' ";
  $result = $conn->query($sql);
  header("Location:./tampil_kategori.php");
// echo "input";
}
echo "<br />";



$sql = "SELECT * from kategori";
$result = $conn->query($sql);

$articles = $result->fetchAll(PDO::FETCH_ASSOC);
	?>
  <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </head>
  <body>
  <div class="col-lg-12 col-xlg-9 col-md-12 p-5">
    <h2 class='py-3'>Edit Kategori</h2>
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="edit_kategori.php" class="form-horizontal form-material" >
                                    <div class="form-group mb-4">
                                    <input type="hidden" maxlength="3" name="id_kat" placeholder="ID Kategori"
                                    class="form-control p-0 border-0" value="<?php echo $article['id_kategori'] ?>">
                                        <label class="col-md-12 p-0 pb-1 fw-bold">ID Kategori (Max 3 Karakter)</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            
                                            <input type="text" maxlength="3" name="id_kategori" placeholder="ID Kategori"
                                                class="form-control p-0 border-0" value="<?php echo $article['id_kategori'] ?>"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="username" class="col-md-12 p-0 pb-1 fw-bold">Nama Kategori</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="nama_kategori" placeholder="Nama Kategori"
                                                class="form-control p-0 border-0" value="<?php echo $article['nama_kategori'] ?>"
                                               >
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                        <button type="submit" class="mt-4 btn btn-primary d-flex justify-content-center align-items-center" name="submit">Edit Kategori</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
</div>
<!-- <?php
require_once("./footer.php");
?> -->
  </body>
</html>
