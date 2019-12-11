<?php 
    require_once __DIR__. "/autoload/autoload.php"; 
    
    // intval chuyển đổi sang kiếu số nguyên
    $id = intval(getInput('id'));

    // fetchID($table, $id) lấy tất cả các dữ liệu mà id được chọn (Database.php)
    $EditDanhmucsanpham = $db -> fetchID("danhmucsp", $id);

    // Kiểm tra xem ở trang bao nhiêu
    if(isset($_GET['p']))
    {
        $p = $_GET['p'];
    }
    else
    {
        // Còn nều ko thì sẽ mặc định trang đầu tiên
        $p = 1;
    }

    $sql = "SELECT * FROM sanpham WHERE danhmuc_id = $id";

    $total = count($db -> fetchsql($sql));    
    $sanpham = $db -> fetchJones("sanpham", $sql, $total, $p, 3, true);
    $sotrang = $sanpham['page'];

    unset($sanpham['page']);

    //Lấy server name hiện tại
    // => /ShoppingTree/danh-muc-san-pham.php
    $path = $_SERVER['SCRIPT_NAME'];
?>

<?php require_once __DIR__. "/layouts/header.php";  ?>

<div class="product mt-4">
    <div class="container">
        <div class="product-content">
            <h1 class="text-center"><?php echo $EditDanhmucsanpham['tendanhmuc'] ?></h1>
            <div class="row">
                <?php foreach($sanpham as $item) : ?>
                <div class="col-md-12 col-lg-4 list-product text-center">
                    <div class="card list-product_item" style="width: 18rem;">
                        <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                            <img class="card-img-top"
                                src="../sushiweb/public/frontend/img/<?php echo $item['anhsanpham'] ?>" width="100%"
                                height="100%" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $item['tensanpham'] ?></h5>
                            <p class="card-text"><?php echo $item['mota'] ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <nav>
            <ul class="pagination justify-content-center mt-4">
                <?php for($i = 1; $i <= $sotrang; $i++) : ?>
                <li class="page-item <?php echo isset($_GET['p']) && $_GET['p'] == $i ? 'active' : '' ?>">
                    <a class="page-link" href="<?php echo $path; ?>?id=<?php echo $id ?>&&p=<?php echo $i; ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>

</div>
</div>
<?php require_once __DIR__. "/layouts/footer.php";  ?>