<?php
    $open = "danhmucsanpham";
    require_once __DIR__. "/../../autoload/autoload.php";

    // intval chuyển đổi sang kiếu số nguyên
    $id = intval(getInput('id'));

    // fetchID($table, $id) lấy tất cả các dữ liệu mà id được chọn (Database.php)
    $EditDanhmucsanpham = $db -> fetchID("danhmucsp", $id);
    
    // Kiểm tra nếu trang xóa danh mục trống thì in ra lỗi 
    if( empty( $EditDanhmucsanpham ) )
    {
        $_SESSION['error'] = " Dữ liệu không tồn tại ";
        redirectAdmin("danhmucsanpham");
    }
    // Kiểm tra xem danh mục có sản phẩm chưa
    $co_sanpham = $db -> fetchOne("sanpham", " danhmuc_id = $id ");
    if($co_sanpham == NULL)
    {
        $num = $db -> delete("danhmucsp", $id);
        if($num > 0)
        {
            $_SESSION['success'] = " Xóa danh mục thành công ";
            redirectAdmin("danhmucsanpham");
        }
        else
        {
            $_SESSION['error'] = " Xóa danh mục thất bại ";
            redirectAdmin("danhmucsanpham");
        }
    }
    else
    {
        $_SESSION['error'] = " Danh mục có sản phẩm. Ko thể xóa ";
        redirectAdmin("danhmucsanpham");
    }
?>
