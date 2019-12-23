<?php 
    require_once __DIR__. "/autoload/autoload.php"; 
    
    // intval chuyển đổi sang kiếu số nguyên
    $id = intval(getInput('id'));

    // fetchID($table, $id) lấy tất cả các dữ liệu mà id được chọn (Database.php)
    $sanpham = $db -> fetchID("sanpham", $id);

    
?>

    <?php require_once __DIR__. "/layouts/header.php";  ?>

        <div class="product mt-4">
            <div class="container">
                <h1 class="text-center pt-4 pb-4">chi tiết sản phẩm</h1>
                <div class="row">
                    <div class="col-md-12 col-lg-6 image-product">
                    <img class="card-img-top"
                                src="../sushiweb/public/frontend/img/<?php echo $sanpham['anhsanpham'] ?>" width="100%"
                                height="100%" alt="Card image cap">
                    </div>        
                    <div class="col-md-12 col-lg-6 info-product pt-2">    
                        <h2><?php echo $sanpham['tensanpham'] ?></h2>
                        <div class="row mt-4">
                            <div class="col-12 tab-list">
                                <div class="tab">
                                    <button id="first_tab" class="tablinks" onclick="openCity(event, 'mota')">Mô tả</button>
                                    <button class="tablinks" onclick="openCity(event, 'nguyenlieu')">Nguyên liệu</button>
                                    <button class="tablinks" onclick="openCity(event, 'congthuc')">Công thức</button>
                                </div>
                            </div>
                            <div class="col-12 tab-list_show">
                                <div id="mota" class="tabcontent">
                                    <p><?php echo $sanpham['mota'] ?></p>
                                </div>
                                <div id="nguyenlieu" class="tabcontent">
                                    <p><?php echo $sanpham['nguyenlieu'] ?></p>
                                </div>

                                <div id="congthuc" class="tabcontent">
                                    <p><?php echo $sanpham['congthuc'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php require_once __DIR__. "/layouts/footer.php";  ?>
