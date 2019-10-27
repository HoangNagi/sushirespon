<?php 
    require_once __DIR__. "/autoload/autoload.php"; 
    
    $sqlHomeCate = "SELECT tendm, id FROM danhmucsp WHERE trangthai = 1 ORDER BY tendm";
    $TrangthaiDanhMuc = $db -> fetchsql($sqlHomeCate);

    $data = [];

    foreach ($TrangthaiDanhMuc as $item)
    {
        $IDdanhmuc = intval($item['id']);
        $sql = "SELECT * FROM sanpham WHERE id_dm = $IDdanhmuc";
        $TrangThaiSP = $db -> fetchsql($sql);
        $data[$item['tendm']] = $TrangThaiSP;
    }
?>

<?php require_once __DIR__. "/layouts/header.php";  ?>

        <!-- CAROUSEL -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" style="height: 600px">
                <div class="carousel-item active">
                    <img class="d-block carousel-img float-right" src="../sushiweb/public/frontend/img/bg1.png" alt="">
                    <div class="d-flex align-items-center ftco-animate">
                        <div class="text">
                            <span class="subheading">#Nigiri sushi</span>
                            <div class="horizontal">
                                <h1 class="mb-4 mt-3"> Nigiri sushi </h1>
                                <p class="mb-4 horizontal-review">
                                    Nigiri sushi là loại sushi nắm gồm cơm trộn với giấm, phía trên được đắp bằng hải sản và có thể có thêm 1 ít gừng hoặc vài cọng hành xay nhỏ.
                                 </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block carousel-img float-right" src="../sushiweb/public/frontend/img/bg2.png" alt="">
                    <div class="d-flex align-items-center ftco-animate">
                        <div class="text">
                            <span class="subheading">#Chirashi sushi</span>
                            <div class="horizontal">
                                <h1 class="mb-4 mt-3"> Chirashi sushi</h1>
                                <p class="mb-4 horizontal-review">
                                Chirashi sushi là một loại sushi rất được yêu thích ở Nhật Bản với phần cơm được để trong tô, sau đó được rượu, gia vị mirin, hạt vừng và phía trên sẽ được sắp xếp các nguyên liệu như cá hồi, cá ngừ, trứng cá, sò điệp, tôm, cua, trứng rán, rong biển…
                                 </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block carousel-img float-right" src="../sushiweb/public/frontend/img/bg4.png" alt="">
                    <div class="d-flex align-items-center ftco-animate">
                        <div class="text">
                            <span class="subheading">#Maki sushi</span>
                            <div class="horizontal">
                                <h1 class="mb-4 mt-3"> Maki sushi </h1>
                                <p class="mb-4 horizontal-review">
                                Maki trong tiếng Nhật có nghĩa “cuộn” nên maki sushi chính là loại sushi cuộn – lớp cơm được đặt trên 1 tấm rong biển nori, phía trên cùng 1 lớp hải sản hay rau củ, sau đó được cuốn lại và cắt thành từng miếng vừa miệng.
                                 </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CAROUSEL -->

        <div class="product">
            <div class="container">
                <?php foreach($data as $key => $value) : ?>
                    <div class="product-content">
                        <h1 class="text-center"><?php echo $key ?></h1>
                        <div class="row">
                            <?php foreach($value as $item) : ?>
                                <div class="col-md-12 col-lg-4 list-product text-center">
                                    <div class="card list-product_item" style="width: 18rem;">
                                        <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                                            <img class="card-img-top" src="<?php echo duongdan() ?>/public/uploads/sanpham/<?php echo $item['anhsp'] ?>" width="100%" height="400px" alt="Card image cap">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $item['tensp'] ?></h5>
                                            <p class="card-text"><?php echo $item['mota'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div> 
                    </div>   
                <?php endforeach; ?>   
            </div>
        </div>




<?php require_once __DIR__. "/layouts/footer.php";  ?>
