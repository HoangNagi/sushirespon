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
   
    $trangthai = $EditDanhmucsanpham['trangthai'] == 0 ? 1 : 0;
    $update = $db -> update("danhmucsp", array("trangthai"=>$trangthai), array("id"=>$id));
    
    // Nếu thêm được danh mục thì điều hướng về lại trang quản trị
    if($update > 0)
    {
        $_SESSION['success'] = "Cập nhập thành công";
        redirectAdmin("danhmucsanpham");
    }
    else
    {
        $_SESSION['error'] = "Dữ liệu không thay đổi";
        redirectAdmin("danhmucsanpham");
    }
?>