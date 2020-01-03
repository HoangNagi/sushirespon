<?php
    $open = "danhmucsanpham";

    require_once __DIR__. "/../../autoload/autoload.php";

    // Danh sách danh mục sản phẩm
    $danhmucsanpham = $db -> fetchAll("danhmucsp");
    
    // Kiểm tra xem phương thức POST có tồn tại hay ko 
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $data =
        [
            "tensanpham"        => postInput('tensanpham'),
            "danhmuc_id"        => postInput('danhmuc_id'),
            "anhsanpham"        => postInput('anhsanpham'),
            "mota"              => postInput('mota'),
            "nguyenlieu"         => postInput('nguyenlieu'),
            "congthuc"          => postInput('congthuc')
        ];

        $error = [];

        // Kiểm tra nếu input rỗng
        
        if(postInput('danhmuc_id') == '')
        {
            $error['danhmuc_id'] = "Bạn hãy chọn tên danh mục";
        }

        if(postInput('tensanpham') == '')
        {
            $error['tensanpham'] = "Bạn hãy nhập đầy đủ tên sản phẩm";
        }

        if( ! isset($_FILES['anhsanpham']) )
        {
            $error['anhsanpham'] = "Bạn hãy chọn ảnh sản phẩm";
        }

        if(postInput('mota') == '')
        {
            $error['mota'] = "Bạn hãy nhập mô tả về sản phẩm";
        }

        if(postInput('nguyenlieu') == '')
        {
            $error['nguyenlieu'] = "Bạn hãy nhập nguyên liệu sản phẩm";
        }

        if(postInput('congthuc') == '')
        {
            $error['congthuc'] = "Bạn hãy nhập công thức sản phẩm";
        }

        // Nếu error trống có nghĩa là không có lỗi
        if(empty($error))
        {
            if( isset($_FILES['anhsanpham']) )
            {
                $file_name = $_FILES['anhsanpham']['name'];
                $file_tmp  = $_FILES['anhsanpham']['tmp_name'];
                $file_type = $_FILES['anhsanpham']['type'];
                $file_erro = $_FILES['anhsanpham']['error'];

                if( $file_erro == 0 )
                {
                    $part = ROOT ."sanpham/";
                    $data['anhsanpham'] = $file_name;
                }
            }
            $id_insert = $db -> insert("sanpham", $data);
            if( $id_insert )
            { 
                move_uploaded_file($file_tmp, $part.$file_name);
                $_SESSION["success"] = "Thêm mới sản phẩm thành công";
                redirectAdmin("sanpham");
            }
            else
            {
                $_SESSION["error"] = "Thêm mới sản phẩm thất bại";
            }
        }
    }
?>

<?php require_once __DIR__. "/../../layouts/header.php";?>
<div id="content-wrapper">
    <div class="container-fluid">

        <h1>thêm mới sản phẩm</h1>

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
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

        <form class="form" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <div class="col">
                    <label for="exampleInputEmail1">Danh mục sản phẩm</label>
                    <select class="form-control col-md-8" name="danhmuc_id">
                        <option value=""> - Hãy chọn danh mục sản phẩm - </option>
                        <?php foreach( $danhmucsanpham as $item ): ?>
                            <option value="<?php echo $item['id'] ?>"> <?php echo $item['tendanhmuc'] ?> </option>
                        <?php endforeach ?>
                    </select>
                    <?php if(isset($error['danhmuc_id'])) : ?>
                        <p class="text-danger ml-3"> <?php echo $error['danhmuc_id'] ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col">
                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên sản phẩm" name="tensanpham">
                    <?php if(isset($error['tensanpham'])) : ?>
                        <p class="text-danger ml-3"> <?php echo $error['tensanpham'] ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col">
                    <label for="exampleInputEmail1">Mô tả</label>
                    <textarea name="mota" class="form-control" id="" cols="20" rows="5"></textarea>
                    <?php if(isset($error['mota'])) : ?>
                        <p class="text-danger ml-3"> <?php echo $error['mota'] ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col">
                    <label for="exampleInputEmail1">Nguyên liệu</label>
                    <textarea name="nguyenlieu" class="form-control" id="" cols="20" rows="5"></textarea>
                    <?php if(isset($error['nguyenlieu'])) : ?>
                        <p class="text-danger ml-3"> <?php echo $error['nguyenlieu'] ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group d-flex">
                <div class="col-sm-6">
                    <label for="exampleInputEmail1">Công thức</label>
                    <textarea name="congthuc" class="form-control" id="" cols="20" rows="5"></textarea>
                    <?php if(isset($error['congthuc'])) : ?>
                        <p class="text-danger ml-3"> <?php echo $error['congthuc'] ?></p>
                    <?php endif ?>
                </div>
                 
                <div class="col-sm-5">
                    <label for="exampleInputEmail1">Hình ảnh</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" name="anhsanpham">
                    <?php if(isset($error['anhsanpham'])) : ?>
                        <p class="text-danger ml-3"> <?php echo $error['anhsanpham'] ?></p>
                    <?php endif ?>
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-4 ml-3">Lưu</button>
        </form>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->

<?php require_once __DIR__. "/../../layouts/footer.php";  ?>


 