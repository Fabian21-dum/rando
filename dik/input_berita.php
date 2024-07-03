<?php
require_once("./konek.php");
require_once("./header.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul_berita'];
    $isi = $_POST['isi'];
    $tglpublish = $_POST['tgl'];
    $penulis = $_POST['penulis'];
    $kategori = $_POST['kategori'];

    $namafile = $_FILES['gambar']["name"];
    $ext = pathinfo($namafile, PATHINFO_EXTENSION);
    $tipe = array("jpg", "png", "jpeg");
    $tempname = $_FILES['gambar']["tmp_name"];
    $targetpath = "./gambar/".$namafile;
    if(in_array($ext, $tipe)){
      if(move_uploaded_file($tempname, $targetpath)){
        $sql = "insert into berita(judul, isi, tgl, id_penulis, id_kategori, gambar) values ('$judul','$isi','$tglpublish', '$penulis', '$kategori', '$namafile') ";
        if($result = $conn->query($sql)){
        header("Location:./tampil_berita.php");
  
        }else{
          echo "Terjadi Kesalahan";
        }
  
      }else{
        echo "File tidak terupload";
      }
    }else{
      echo "Tipe gambar tidak dapat diupload";
    }
  
    
  }
  echo "<br />";
  $month = date('m');
  $day = date('d');
  $year = date('Y');
  
  $today = $year . '-' . $month . '-' . $day;
  
  
  
  $sql = "SELECT * from berita";
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
    <h2 class='py-3'>Tambah Berita</h2>
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="input_berita.php" class="form-horizontal form-material" enctype="multipart/form-data" >
                                    <div class="form-group">
                                        <div class="col-md-12 p-0">
                                            <input type="hidden" maxlength="3" name="id_berita" placeholder="ID Berita"
                                                class="form-control p-0 border-0"> </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0 pb-1 fw-bold mb-2">Judul Berita</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="judul_berita" placeholder="Judul berita"
                                                class="form-control p-0 border-0"
                                               >
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0 pb-1 fw-bold mb-2">Isi Berita</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <textarea name="isi" placeholder="Isi Berita"
                                                class="form-control p-0 border-0"
                                               ></textarea>
                                        </div>
                                        <div class="form-group">
                                        <div class="control-group">
                                            <label class="control-label pb-1 fw-bold">Tanggal Terbit</label>
                                            <div class="controls">
                                                <input name="tgl" class="form-control" type="date" id="receiving_date" value="<?php echo $today; ?>" required
                                                class="input-xlarge"/>
                                                <!-- <a href="javascript:showCalendar('date')"><img src="date.gif" width="19" height="17" border="0"></a> -->
                                            </div>
                                        </div>
                                    <div class="form-group mt-4">
                                        <label class="col-md-12 p-0 pb-1 fw-bold mb-2">Penulis</label>
                                        <select name="penulis" id="select" class="form-select">
                                        <option value="">
                                          <?php
                                            $sql = "SELECT * FROM penulis";
                                            $data = $conn->query($sql);
      
                                          ?>
                                          <?php foreach ($data as $row): ?>
                                            <option value="<?= $row['id_penulis']?>">
                                          <?= $row['nama'] ?>
                                        </option>
                                          <?php endforeach ?>
                                        </select>
                                        </br>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 p-0 pb-1 fw-bold mb-2">Kategori</label>
                                        <select name="kategori" id="select" class="form-select">
                                        <option value="">
                                          <?php
                                            $sql = "SELECT * FROM kategori";
                                            $data = $conn->query($sql);
      
                                          ?>
                                          <?php foreach ($data as $row): ?>
                                            <option value="<?= $row['id_kategori']?>">
                                          <?= $row['nama_kategori'] ?>
                                        </option>
                                          <?php endforeach ?>
                                        </select>
                                        </br>
                                    </div>
                                    <div class="form-group">
                                        <div class="control-group">
                                            <label class="control-label pb-1 fw-bold mb-2">Gambar</label>
                                            <div class="controls">
                                            <input type="file" name="gambar"
                                                class="form-control p-0 border-0"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                        <button type="submit" class="mt-4 btn btn-primary d-flex justify-content-center align-items-center" name="submit">Tambah Berita</button>
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
