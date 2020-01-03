<?php
    $open = "sanpham";
    require_once __DIR__. "/../../autoload/autoload.php";

    // Lấy tất cả thông tin danh mục sản phẩm trong DB
    // Hàm fetchAll để coi chi tiết "Database.php"
    $sanpham = $db -> fetchAll("sanpham");

    if( isset($_GET['page']) )
    {
        $p = $_GET['page'];
    }
    else
    {
        $p = 1;
    }

    $sql = "SELECT sanpham.*, danhmucsp.tendanhmuc as namecate FROM sanpham LEFT JOIN danhmucsp on danhmucsp.id = sanpham.danhmuc_id";
    $sanpham = $db -> fetchJone('sanpham', $sql, $p, 3, true);

    if( isset($sanpham['page']) )
    {
        $sotrang = $sanpham['page'];
        unset( $sanpham['page'] );
    }
     
?>

<?php require_once __DIR__. "/../../layouts/header.php";?>
<div id="content-wrapper">
    <div class="container-fluid">

        <h1>sản phẩm</h1>

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Sản phẩm</li>
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
                                <th>Hình ảnh</th>
                                <th>Danh mục</th>
                                <th>Mô tả</th>
                                <th>Công thức</th>
                                <th>Nguyên liệu</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1; foreach($sanpham as $item) : ?>
                                <tr>
                                    <td><?php echo $stt ?></td>
                                    <td><?php echo $item['tensanpham'] ?></td>
                                    <td>
                                        <img src="<?php echo duongdan() ?>/public/frontend/img/<?php echo $item['anhsanpham'] ?>" width="150px" height="150px">
                                    </td>
                                    <td><?php echo $item['namecate'] ?></td>
                                    <td><textarea id="" cols="60" rows="5"><?php echo $item['mota'] ?></textarea></td>
                                    <td><textarea id="" cols="60" rows="5"><?php echo $item['congthuc'] ?></textarea></td>
                                    <td><textarea id="" cols="60" rows="5"><?php echo $item['nguyenlieu'] ?></textarea></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $item['id'] ?>" class="btn btn-success">Sửa</a>
                                        <a href="delete.php?id=<?php echo $item['id'] ?>" class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            <?php $stt++; endforeach ?>
                        </tbody>
                    </table>
                    <div class="float-right">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <?php for( $i = 1; $i <= $sotrang; $i++ ) : ?>
                                    <?php 
                                        if( isset($_GET['page']) )
                                        {
                                            $p = $_GET['page'];
                                        }
                                        else
                                        {
                                            $p = 1;
                                        }
                                    ?>
                                    <li class="<?php echo ($i == $p) ? 'active' : '' ?> page-item">
                                        <a href="?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->

<?php require_once __DIR__. "/../../layouts/footer.php";  ?>


 