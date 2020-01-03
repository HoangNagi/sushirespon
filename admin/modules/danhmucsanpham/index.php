<?php
    require_once __DIR__. "/../../autoload/autoload.php";

    // Lấy tất cả thông tin danh mục sản phẩm trong DB
    // Hàm fetchAll để coi chi tiết "Database.php"
    $danhmucsanpham = $db->fetchAll("danhmucsp");
     
?>

<?php require_once __DIR__. "/../../layouts/header.php";?>
<div id="content-wrapper">
    <div class="container-fluid">

        <h1>danh mục sản phẩm</h1>

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Danh mục</li>
        </ol>

        <div class="row mb-3 ml-2">
            <a href="add.php" class="btn btn-primary">Thêm mới</a>
        </div>

        <div class="clearfix"></div>
        <!-- Thông báo lỗi -->
        <?php require_once __DIR__. "/../../../partials/notification.php";?>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên danh mục</th>
                                <th>Trạng thái hoạt động</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1; foreach($danhmucsanpham as $item) : ?>
                                <tr>
                                    <td><?php echo $stt ?></td>
                                    <td><?php echo $item['tendanhmuc'] ?></td>
                                    <td>
                                        <a class="btn <?php echo $item['trangthai'] == 1 ? 'btn-success' : 'btn-danger' ?>" href="trangthai.php?id=<?php echo $item['id'] ?>">
                                            <?php echo $item['trangthai'] == 1 ? 'Hiển thị' : 'Ẩn' ?>
                                        </a>    
                                    </td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $item['id'] ?>" class="btn btn-success">Sửa</a>
                                        <a href="delete.php?id=<?php echo $item['id'] ?>" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            <?php $stt++; endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->

<?php require_once __DIR__. "/../../layouts/footer.php";  ?>


 