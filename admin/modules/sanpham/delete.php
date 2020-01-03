<?php
    $open = "danhmucsanpham";

    require_once __DIR__. "/../../autoload/autoload.php";

    // intval chuyển đổi sang kiếu số nguyên
    $id = intval(getInput('id'));
    
    // fetchID($table, $id) lấy tất cả các dữ liệu mà id được chọn (Database.php)
    $Editsanpham = $db -> fetchID("sanpham", $id);
    
    // Kiểm tra nếu trang xóa danh mục trống thì in ra lỗi 
    if( empty( $Editsanpham ) )
    {
        $_SESSION['error'] = " Dữ liệu không tồn tại ";
        redirectAdmin("sanpham");
    }
    // Kiểm tra xem danh mục có sản phẩm chưa

    $num = $db -> delete("sanpham", $id);
    if($num > 0)
    {
        $_SESSION['success'] = " Xóa danh mục thành công ";
        redirectAdmin("sanpham");
    }
    else
    {
        $_SESSION['error'] = " Xóa danh mục thất bại ";
        redirectAdmin("sanpham");
    }
?>
