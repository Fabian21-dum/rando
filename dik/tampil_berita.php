<?php
// ob_start();
require_once("./konek.php");
require_once("./header.php");


$sql = "SELECT * from berita";
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
                  <h3 class="card-title">Data Berita</h3>
                  <a href="input_berita.php"><button class='btn btn-primary px-2'>Tambah Berita</button></a><br/><br/>
                  <div class="table-responsive">
                    <table class="table">
                    <theader>
                      <tr>
                        <th> ID Berita</th>
                        <th> Judul Berita </th>
                        <th> Isi Berita </th>
                        <th> Tanggal Terbit </th>
                        <th> Penulis </th>
                        <th> Kategori </th>
                        <th> Gambar </th>
                        <th> Aksi </th>
                      </tr>
                    </theader>
                      <tbody>
                      <?php
                         foreach ($articles as $article) {
                      ?>
                        <tr>
                          <td><?php echo $article['id'] ?></td>
                          <td><?php echo $article['judul'] ?></td>
                          <td><?php echo $article['isi'] ?></td>
                          <td><?php echo $article['tgl'] ?></td>
                          <td><?php echo $article['id_penulis'] ?></td>
                          <td><?php echo $article['id_kategori'] ?></td>
                          <td><img class="object-fit-cover" src="./gambar/<?php echo $article['gambar'];?>" height="100" width="100"></td>
                          <td><a href="edit_berita.php?action=edit&id=<?php echo $article['id']?>"><button class='btn btn-info text-white px-3'>Edit </button></a>
                          <a href="hapus_berita.php?action=hapus&id=<?php echo $article['id']?>"><button class='btn btn-danger px-2'>Hapus</button></a>
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
<?php
require_once("./footer.php");
?>
    </body>
    </html>
