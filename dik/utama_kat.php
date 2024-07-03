<?php
require_once("konek.php");
require_once("header.php");

$action = isset($_GET['action']) ? $_GET['action'] : '' ;
if ($action == 'kat') {
$id=$_GET['id_kat'];
$sql = "SELECT * from berita where id_kategori= '".$id."'";
$result = $conn->query($sql);
        
        $articles = $result->fetchAll(PDO::FETCH_ASSOC);

        $kat = "SELECT * from kategori";
        $hasil = $conn->query($kat);
        
        $kategori = $hasil->fetchAll(PDO::FETCH_ASSOC);
}
        if($articles){
          ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="blog.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>
<div class="container">
            <div class="row pt-5">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <h1 class="pb-3">Berita Trending</h1>
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <a href="#!"><img class="card-img-top" src="gambar/<?php echo $article['gambar'];?>" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted"><?php echo $article['id_kategori'] ?> <?php echo $article['tgl'] ?></div>
                            <h2 class="card-title"><?php echo $article['judul'] ?></h2>
                            <p class="fifty-chars"><?php echo $article['isi'] ?></p>
                            <a class="btn btn-primary" href="isi_berita.php?action=view&id=<?php echo $article['id']?>">Read more →</a>
                        </div>
                    </div>
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">   
                    <h1 class="pb-3">Berita Terkini</h1>
                        <?php
        foreach($articles as $article){
            ?>
                        <div class="col-md-6">
                        
                            <!-- Blog post-->
                            <div class="card mb-4">
                         
                                <a href="#!"><img class="card-img-top object-fit-cover" height="200" src="gambar/<?php echo $article['gambar'];?>" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted"><?php echo $article['id_kategori'] ?> <?php echo $article['tgl'] ?></div>
                                    <h2 class="card-title h4"><?php echo $article['judul'] ?></h2>
                                    <p class="fifty-chars"><?php echo $article['isi'] ?></p>
                                    <a class="btn btn-primary" href="isi_berita.php?action=view&id=<?php echo $article['id']?>">Read more →</a>
                                </div>
                       
                            </div>
                            
                        </div>
                        <?php 
        }
      }
    ?>      
                    </div>
                   
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4 py-5 my-4">
                    <!-- Categories widget-->
                    <div class="card mb-4">
                        <div class="card-header fw-bold h5 py-3">Kategori</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                    <?php
                                        if ($kategori) {
                                        foreach ($kategori as $kats) {
                                    ?>
                                        <li><a class="nav-item nav-link link-body-emphasis text-primary text-decoration-underline" href="utama_kat.php?action=kat&id_kat=<?php echo $kats['id_kategori']?>"><?php echo $kats['nama_kategori']?></a></li>
                                    <?php
                                    }
                                }
                                ?>                                    
                                </ul>
                            </div>
                        </div>
                    </div>
    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header fw-bold h5 py-3">Tentang Kami</div>
                        <div class="card-body">Melati web merupakan portal berita internasional yang memberikan semua kabar terkini dari berbagai dunia</div>
                    </div>
                </div>
            </div>
        </div>
                            </body>

<?php
require_once("footer.php");


?>
