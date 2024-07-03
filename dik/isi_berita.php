<?php
ob_start();
require_once("./konek.php");
require_once("./header.php");

$action = isset($_GET['action']) ? $_GET['action'] : '' ;
// echo $action;
if ($action == 'view') {
  $id = $_GET['id'];
  $sql = "SELECT * from berita where id= '".$id."'";
  $result = $conn->query($sql);
  
  $article = $result->fetch(PDO::FETCH_ASSOC);

}else{
    
echo "Not Found";
}
$sql = "SELECT * from berita";
       $result = $conn->query($sql);
       
       $articles = $result->fetchAll(PDO::FETCH_ASSOC);

       $kat = "SELECT * from kategori";
        $hasil = $conn->query($kat);
        
        $kategori = $hasil->fetchAll(PDO::FETCH_ASSOC);
       if($articles){
        
?>
  <div class="row g-5 px-5 mx-5 my-3">
  <input type="hidden" name="id" value="<?php echo $article['id'] ?>"/>
    <div class="col-md-8">
      <article class="blog-post">
        <img class="rounded  text-body-emphasis bg-image align-items-left h-5 w-5 object-fit-cover" src="gambar/<?php echo $article['gambar'];?>" width="100%" height="500" ></img>
        <h2 class="display-5 link-body-emphasis mb-1 fw-bold py-3"><?php echo $article['judul'] ?></h2>
        <p class="blog-post-meta"><?php echo $article['tgl'] ?><h6>Ditulis oleh <?php echo $article['id_penulis'];?></h6></p>
        <p style="text-align: justify;"class="h4"><?php echo nl2br($article['isi']);?></p>
      </article>
    </div>

    <!-- Side widgets-->
    <div class="col-lg-4">
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
        <?php
       }
       
        ?>
</div>
 <?php
require_once("footer.php");
?>