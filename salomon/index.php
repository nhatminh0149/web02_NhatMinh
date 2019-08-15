<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="public/vendor/bootstrap/css/bootstrap.min.css" type="text/css" />

    <link rel="stylesheet" href="public/vendor/font-awesome-4.7.0/css/font-awesome.min.css">
    <style>
        div{
            border: pink solid 1px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="row">
            <div class="col-md-6 col-8 col-xl-7">LOGO</div>
            <div class="col-md-6 col-4 col-xl-5">Tên CTY</div>
        </div>

        <!-- Main content -->
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item"><a href="?page=loaisanpham_danhsach">Danh sách Loại sản phẩm</a></li>
                    <li class="list-group-item"><a href="?page=sanpham_danhsach">Danh sách Sản phẩm</a></li>
                    <li class="list-group-item"><a href="?page=nhasanxuat_danhsach">Danh sách Nhà sản xuất</a></li>
                    <li class="list-group-item"><a href="?page=hinhthucthanhtoan_danhsach">Danh sách Hình thức thanh toán</a></li>
                    <li class="list-group-item"><a href="?page=khuyenmai_danhsach">Danh sách Khuyến mãi</a></li>
                    <li class="list-group-item"><a href="?page=chudegopy_danhsach">Danh sách Chủ đề góp ý</a></li>
                </ul>
            </div>
            <div class="col-md-9">
                <?php
                    $page = isset($_GET['page']) ? $_GET['page'] : 'sanpham_danhsach';
                    if($page == 'loaisanpham_danhsach'){
                        include('loaisanpham/danhsach.php');
                    }
                    else if($page =='sanpham_danhsach'){
                        include('sanpham/danhsach.php');
                    }
                    else if($page =='nhasanxuat_danhsach'){
                        include('nhasanxuat/danhsach.php');
                    }
                    else if($page =='hinhthucthanhtoan_danhsach'){
                        include('hinhthucthanhtoan/danhsach.php');
                    }
                    else if($page =='khuyenmai_danhsach'){
                        include('khuyenmai/danhsach.php');
                    }
                    else if($page =='chudegopy_danhsach'){
                        include('chudegopy/danhsach.php');
                    }
                    else if($page =='sanpham_them'){
                        include('sanpham/them.php');
                    }
                    else if($page =='sanpham_sua'){
                        include('sanpham/sua.php');
                    }
                    else if($page =='loaisanpham_themmoi'){
                        include('loaisanpham/themmoi.php');
                    }
                ?>
            </div>
        </div>

        <!-- Footer -->
        <div class="row">
            <div class="col-md-3">About us</div>
            <div class="col-md-3">Link</div>
            <div class="col-md-3">News</div>
            <div class="col-md-3">Google Maps</div>
        </div>

    </div>
    
    <script src="public/vendor/jquery/jquery.min.js"></script>
    <script src="public/vendor/popper/popper.min.js"></script>
    <script src="public/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

