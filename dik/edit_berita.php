<?php
require_once("./konek.php");
require_once("./header.php");

$action = isset($_GET['action']) ? $_GET['action'] : '' ;
if ($action == 'edit') {
  $id = $_GET['id'];
  $sql = "SELECT * from berita where id='$id'";
  $result = $conn->query($sql);
  
  $article = $result->fetch(PDO::FETCH_ASSOC);
}else{

  $article = [
    'id' => '',
    'judul' => '',
    'isi' => '',
    'tgl' => '',
    'penulis' => '',
    'kategori' => ''

  ];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul_berita'];
    $isi = $_POST['isi'];
    $tglpublish = $_POST['tgl'];
    $penulis = $_POST['penulis'];
    $kategori = $_POST['kategori'];

    $gambar = $_FILES['gambar'];
    $gmbrlama = $_POST['gambarLama'];

    $namafile = $_FILES['gambar']["name"];
    $ext = pathinfo($namafile, PATHINFO_EXTENSION);
    $tipe = array("jpg", "png", "jpeg");
    $tempname = $_FILES['gambar']["tmp_name"];
    $targetpath = "./gambar/".$namafile;
    $simpan = uniqid() . '.' . $ext;
    echo $gambar['size'];
    if($gambar['size'] === 0){
        $simpan = $gmbrlama;
    }else{
        if($ext !== 'jpg' && $ext !== 'jpeg' && $ext !== 'png') {
            die('File harus berupa gambar');
          }
          
          if(!move_uploaded_file($tempname, './gambar/' . $simpan)) {
            die('Gagal upload gambar');
          } 
    }

        $sql = "update berita set judul = '$judul',  isi = '$isi', tgl = '$tglpublish', id_penulis = '$penulis', id_kategori = '$kategori', gambar = '$simpan' where id = '".$_POST['id']."' ";
        $result = $conn->query($sql);

        header("Location:./tampil_berita.php");    
        // echo "edit";
  }
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
    <h2 class='py-3'>Edit Berita</h2>
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="edit_berita.php" class="form-horizontal form-material" enctype="multipart/form-data" >
                                    <div class="form-group">
                                        <div class="col-md-12 p-0">
                                            <input type="hidden" maxlength="3" name="id" placeholder="ID Berita"
                                                class="form-control p-0 border-0" value="<?php echo $article['id'] ?>"> 
                                                <input type="hidden" name="gambarLama" value="<?= $article['gambar'] ?>">
                                                </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0 pb-1 fw-bold mb-2">Judul Berita</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <input type="text" name="judul_berita" placeholder="Judul berita"
                                                class="form-control p-0 border-0" value="<?php echo $article['judul'] ?>"
                                               >
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="col-md-12 p-0 pb-1 fw-bold mb-2">Isi Berita</label>
                                        <div class="col-md-12 border-bottom p-0">
                                            <textarea name="isi" placeholder="Isi Berita"
                                                class="form-control p-0 border-0"
                                               ><?php echo $article['isi'] ?></textarea>
                                        </div>
                                        <div class="form-group">
                                        <div class="control-group">
                                            <label class="control-label pb-1 fw-bold">Tanggal Terbit</label>
                                            <div class="controls">
                                                <input name="tgl" class="form-control" type="date" id="receiving_date" value="<?php echo date('Y-m-d',strtotime($article["tgl"])) ?>" required
                                                class="input-xlarge"/>
                                                <!-- <a href="javascript:showCalendar('date')"><img src="date.gif" width="19" height="17" border="0"></a> -->
                                            </div>
                                        </div>
                                    <div class="form-group mt-4">
                                        <label class="col-md-12 p-0 pb-1 fw-bold mb-2">Penulis</label>
                                        <select name="penulis" id="select" class="form-select" value="<?php echo $article['id_penulis'] ?>">
                                        <option value="" hidden>Pilih Penulis

                                          <?php
                                           
                                              $sql = "SELECT * FROM penulis";
                                              $data = $conn->query($sql);
      
                                          ?>
                                            <?php foreach ($data as $row): 
                                            $selected = $row['id_penulis'] == $article["id_penulis"] ? "selected" : "";
                                            ?>
                                            <option value='<?= $selected = $row['id_penulis']?>' <?= $selected ?> ><?= $row['nama']?></option>
                                            <?php endforeach ?>
                                        </select>
                                        </br>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 p-0 pb-1 fw-bold mb-2">Kategori</label>
                                        <select name="kategori" id="select" class="form-select">
                                        <option value="" hidden>Pilih Kategori
                                          <?php
                                             $sql = "SELECT * FROM kategori";
                                             $data = $conn->query($sql);
                                             
                                             ?>
                                             <?php foreach ($data as $row): 
                                               $selected = $row['id_kategori'] == $row["id_kategori"] ? "selected" : "";
                                               ?>
                                             <option value='<?= $selected = $row['id_kategori']?>' <?= $selected ?> ><?= $row['nama_kategori']?></option>
                                             <?php endforeach ?>
                                        </select>
                                        </br>
                                    </div>
                                    <div class="form-group">
                                        <div class="control-group">
                                            <label class="control-label pb-1 fw-bold mb-2">Gambar</label>
                                            <div class="controls">
                                            <input type="file" name="gambar"
                                                class="form-control p-0 border-0" accept="gambar/*"></input>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="col-sm-12">
                                        <button type="submit" class="mt-4 btn btn-primary d-flex justify-content-center align-items-center" name="submit">Edit Berita</button>
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