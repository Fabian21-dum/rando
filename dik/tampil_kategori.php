<?php
// ob_start();
require_once("./konek.php");
require_once("./header.php");


$sql = "SELECT * from kategori";
$result = $conn->query($sql);

$articles = $result->fetchAll(PDO::FETCH_ASSOC);


if ($articles) {
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
    <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 p-5">
                    <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Data Kategori</h3>
                  <a href="input_kategori.php"><button class='btn btn-primary px-2'>Tambah Kategori</button></a><br/><br/>
                  <div class="table-responsive">
                    <table class="table">
                    <theader>
                      <tr>
                        <th> ID Kategori</th>
                        <th> Nama Kategori </th>
                        <th> Aksi </th>
                      </tr>
                    </theader>
                      <tbody>
                      <?php
                         foreach ($articles as $article) {
                      ?>
                        <tr>
                          <td><?php echo $article['id_kategori'] ?></td>
                          <td><?php echo $article['nama_kategori'] ?></td>
                          <td><a href="edit_kategori.php?action=edit&id=<?php echo $article['id_kategori']?>"><button class='btn btn-info text-white px-3'>Edit </button></a>
                          <a href="hapus_kategori.php?action=hapus&id=<?php echo $article['id_kategori']?>"><button class='btn btn-danger px-2'>Hapus</button></a>
                        </tr>
                      <?php
                          }
                        }
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
                    </div>
                </div>
<br />
    </body>
    
 
<?php
require_once("./footer.php");
?>