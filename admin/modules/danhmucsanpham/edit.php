<?php
    $open = "danhmucsanpham";

    require_once __DIR__. "/../../autoload/autoload.php";

    // intval chuyển đổi sang kiếu số nguyên
    $id = intval(getInput('id'));
    
    // fetchID($table, $id) lấy tất cả các dữ liệu mà id được chọn (Database.php)
    $EditDanhmucsanpham = $db -> fetchID("danhmucsp", $id);
    
    // Kiểm tra nếu trang caahp nhập danh mục trống thì in ra lỗi 
    if( empty( $EditDanhmucsanpham ) )
    {
        $_SESSION['error'] = " Dữ liệu không tồn tại ";
        redirectAdmin("danhmucsanpham");
    }

    // Kiểm tra xem phương thức POST có tồn tại hay ko 
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data =
        [
            "tendanhmuc" => postInput('name'),
        ];

        $error = [];

        // Kiểm tra nếu input rỗng
        if(postInput('name') == '')
        {
            $error['name'] = "Bạn hãy nhập đầy đủ tên danh mục";
        }

        // Nếu error trống có nghĩa là không có lỗi
        if(empty($error))
        {
            $id_update = $db -> update("danhmucsp", $data, array("id" => $id));
            // print_r($id_insert);

            // Nếu thêm được danh mục thì điều hướng về lại trang quản trị
            if($id_update > 0)
            {
                $_SESSION['success'] = "Cập nhập danh mục thành công";
                redirectAdmin("danhmucsanpham");
            }
            else
            {
                $_SESSION['error'] = "Dữ liệu không thay đổi hoặc cập nhập danh mục thất bại";
                redirectAdmin("danhmucsanpham");
            }
        }
    }
?>

<?php require_once __DIR__. "/../../layouts/header.php";?>
<div id="content-wrapper">
    <div class="container-fluid">

        <h1>cập nhập danh mục</h1>

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Danh mục</a></li>
            <li class="breadcrumb-item active">Cập nhập</li>
        </ol>

        <div class="clearfix"></div>
        <!-- Thông báo lỗi -->
        <?php require_once __DIR__. "/../../../partials/notification.php";?>

        <form class="form" action="" method="POST">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên danh mục</label>
                <div class="col">
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục" name="name" value="<?php echo $EditDanhmucsanpham['tendanhmuc'] ?>">
                </div>
            </div>
            <?php if(isset($error['name'])) : ?>
                <p class="text-danger ml-3"> <?php echo $error['name'] ?></p>
            <?php endif ?>
            <button type="submit" class="btn btn-success ml-3 pl-2">Lưu</button>
        </form>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->

<?php require_once __DIR__. "/../../layouts/footer.php";  ?>


 