<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
<link rel="stylesheet" href="../sushiweb/public/frontend/css/style.css">
<title>NAGIKI SUSHI</title>
</head>
<body>
    <div class="wall">
        <!-- HEADER -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand logo" href="index.php">NAGIKI SUSHI</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end menu" id="navbarNavDropdown">
                <ul class="nav menu-item_list">
                    <li class="nav-item menu-item">
                        <a class="nav-link" href="#">Giới thiệu</a>
                    </li>
                    <li class="nav-item dropdown menu-item">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Danh mục sản phẩm
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach($danhmucsanpham as $item) : ?>
                                <a class="dropdown-item" href="danh-muc-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['tendanhmuc'] ?></a>
                            <?php endforeach; ?> 
                        </div>
                    </li>
                    <li class="nav-item menu-item">
                        <a class="nav-link" href="#">Hỗ trợ</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- END HEADER -->