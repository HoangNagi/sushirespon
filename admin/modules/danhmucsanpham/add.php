<?php
    $open = "danhmucsanpham";

    require_once __DIR__. "/../../autoload/autoload.php";
    
    // Kiểm tra xem phương thức POST có tồn tại hay ko 
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data =
        [
            "tendanhmuc" => postInput('tendanhmuc'),
        ];

        $error = [];

        // Kiểm tra nếu input rỗng
        if(postInput('tendanhmuc') == '')
        {
            $error['tendanhmuc'] = "Bạn hãy nhập đầy đủ tên danh mục";
        }

        // Nếu error trống có nghĩa là không có lỗi
        if(empty($error))
        {
            $isset = $db -> fetchOne("danhmucsp", "tendanhmuc = '".$data['name']."' ");
            if( count($isset) > 0 )
            {
                $_SESSION['error'] = "Tên danh mục đã tồn tại";
            }
            else
            {
                $id_insert = $db -> insert("danhmucsp", $data);
                // print_r($id_insert);
    
                // Nếu thêm được danh mục thì điều hướng về lại trang quản trị
                if($id_insert > 0)
                {
                    $_SESSION['success'] = "Thêm mới danh mục thành công";
                    redirectAdmin("danhmucsanpham");
                }
                else
                {
                    $_SESSION['error'] = "Thêm mới danh mục thất bại";
                }
            }
        }
    }
?>

<?php require_once __DIR__. "/../../layouts/header.php";?>
<div id="content-wrapper">
    <div class="container-fluid">

        <h1>thêm mới danh mục</h1>

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Danh mục</a></li>
            <li class="breadcrumb-item active">Thêm mới</li>
        </ol>

        <div class="clearfix"></div>
         <!-- Thông báo lỗi -->
         <?php require_once __DIR__. "/../../../partials/notification.php";?>
         <?php if(isset($_SESSION['error'])) : ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
            </div>
        <?php endif ?>

        <form class="form" action="" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên danh mục</label>
                <div class="col">
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục" name="tendanhmuc">
                    <?php if(isset($error['tendanhmuc'])) : ?>
                        <p class="text-danger ml-3"> <?php echo $error['tendanhmuc'] ?></p>
                    <?php endif ?>
                </div>
            </div>

            <button type="submit" class="btn btn-success ml-3 pl-2">Lưu</button>
        </form>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->

<?php require_once __DIR__. "/../../layouts/footer.php";  ?>


 