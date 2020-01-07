<?php
    require_once __DIR__. "/autoload/autoload.php";

    $danhmucsanpham = $db->fetchAll("danhmucsp");
     
?>

<?php require_once __DIR__. "/layouts/header.php";  ?>

<div id="content-wrapper">
    <div class="container-fluid">

    <h1>trang quản trị của admin</h1>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Quản trị</li>
        </ol>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->

<?php require_once __DIR__. "/layouts/footer.php";  ?>


 