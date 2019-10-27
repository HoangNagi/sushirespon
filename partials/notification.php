<!-- Nếu danh mục sản phẩm được thêm thành công thì in ra đoạn text báo thành công $_SESSION['success'] trong add.php -->
<?php if(isset($_SESSION['success'])) : ?>
    <div class="alert alert-success">
        <?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
    </div>
 <?php endif ?>

<!-- Nếu danh mục sản phẩm sửa thất bại thì in ra đoạn text báo lỗi $_SESSION['success'] trong add.php -->
<?php if(isset($_SESSION['error'])) : ?>
    <div class="alert alert-danger">
        <?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
    </div>
<?php endif ?>