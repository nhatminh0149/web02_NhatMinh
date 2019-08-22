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
      
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="row">
            <div class="col-md-3">
                <img src="/web02_NhatMinh/salomon/hinhanh/logo.jpg" alt="logo" width="100%" height="100">
            </div>
            <div class="col-md-9">Tên CTY</div>
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
                    //tạo biến page, nếu tồn tại biến page thì hiện page, nếu chưa có thì xuất hiện trang danh sách sản phẩm
                    $page = isset($_GET['page']) ? $_GET['page'] : 'sanpham_danhsach';

                    //page loaisanpham
                    if($page == 'loaisanpham_danhsach'){
                        include('loaisanpham/danhsach.php');
                    }
                    else if($page =='loaisanpham_themmoi'){
                        include('loaisanpham/themmoi.php');
                    }
                    else if($page =='loaisanpham_sua'){
                        include('loaisanpham/sua.php');
                    }
                    else if($page =='loaisanpham_xoa'){
                        include('loaisanpham/xoa.php');
                    }

                    //page sanpham
                    else if($page =='sanpham_danhsach'){
                        include('sanpham/danhsach.php');
                    }
                    else if($page =='sanpham_them'){
                        include('sanpham/them.php');
                    }
                    else if($page =='sanpham_sua'){
                        include('sanpham/sua.php');
                    }
                    else if($page =='sanpham_xoa'){
                        include('sanpham/xoa.php');
                    }
                    

                    // page nhasanxuat
                    else if($page =='nhasanxuat_danhsach'){
                        include('nhasanxuat/danhsach.php');
                    }
                    else if($page =='nhasanxuat_themmoi'){
                        include('nhasanxuat/themmoi.php');
                    }
                    else if($page =='nhasanxuat_sua'){
                        include('nhasanxuat/sua.php');
                    }
                    else if($page =='nhasanxuat_xoa'){
                        include('nhasanxuat/xoa.php');
                    }

                    //page hinhthucthanhtoan
                    else if($page =='hinhthucthanhtoan_danhsach'){
                        include('hinhthucthanhtoan/danhsach.php');
                    }
                    else if($page =='hinhthucthanhtoan_themmoi'){
                        include('hinhthucthanhtoan/themmoi.php');
                    }
                    else if($page =='hinhthucthanhtoan_sua'){
                        include('hinhthucthanhtoan/sua.php');
                    }
                    else if($page =='hinhthucthanhtoan_xoa'){
                        include('hinhthucthanhtoan/xoa.php');
                    }

                    //page khuyenmai
                    else if($page =='khuyenmai_danhsach'){
                        include('khuyenmai/danhsach.php');
                    }
                    else if($page =='khuyenmai_themmoi'){
                        include('khuyenmai/themmoi.php');
                    }
                    else if($page =='khuyenmai_sua'){
                        include('khuyenmai/sua.php');
                    }
                    else if($page =='khuyenmai_xoa'){
                        include('khuyenmai/xoa.php');
                    }

                    //page chudegopy
                    else if($page =='chudegopy_danhsach'){
                        include('chudegopy/danhsach.php');
                    }
                   
                    else if($page =='chudegopy_themmoi'){
                        include('chudegopy/themmoi.php');
                    }
                   
                    else if($page =='chudegopy_sua'){
                        include('chudegopy/sua.php');
                    }
                   
                    else if($page =='chudegopy_xoa'){
                        include('chudegopy/xoa.php');
                    }

                    //page gopy
                    else if($page =='gopy_danhsach'){
                        include('gopy/danhsach.php');
                    }
                    else if($page =='gopy_them'){
                        include('gopy/them.php');
                    }

                    
                   
                    
                ?>
            </div>
        </div>

        <!-- Footer -->
        <div class="row">
            <div class="col-md-3">About us</div>
            <div class="col-md-3">Link</div>
            <div class="col-md-3">News</div>
            <div class="col-md-3">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7857.357089313716!2d105.78655134260416!3d10.043362717403953!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a089b55dda005f%3A0x599cede9036d324a!2zRlBUIEPhuqduIFRoxqE!5e0!3m2!1svi!2s!4v1566021021309!5m2!1svi!2s" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>

    </div>
    
    <script src="public/vendor/jquery/jquery.min.js"></script>
    <script src="public/vendor/popper/popper.min.js"></script>
    <script src="public/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="public/vendor/sweetalert2/sweetalert2.all.min.js"></script>
   

     <?php if($page == 'loaisanpham_danhsach') : ?>
        <script src="public/js/loaisanpham/loaisanpham.js"></script>
    <?php elseif($page == 'sanpham_danhsach') : ?>
        <script src="public/js/sanpham/sanpham.js"></script>
        <script src="public/js/sanpham/sanpham-search.js"></script>

    <?php elseif($page == 'sanpham_them') : ?>
        <script src="public/vendor/jqueryvalidation/jquery.validate.min.js"></script>
        <script src="public/vendor/jqueryvalidation/localization/messages_vi.min.js"></script>
        <!--<script src="public/js/sanpham/sanpham-validate.js"></script>-->

    <?php elseif($page == 'loaisanpham_themmoi') : ?>
        <script src="public/vendor/jqueryvalidation/jquery.validate.min.js"></script>
        <script src="public/vendor/jqueryvalidation/localization/messages_vi.min.js"></script>
        <!--<script src="public/js/loaisanpham/loaisanpham-validate.js"></script>-->

    <?php elseif($page == 'loaisanpham_sua') : ?>
        <script src="public/vendor/jqueryvalidation/jquery.validate.min.js"></script>
        <script src="public/vendor/jqueryvalidation/localization/messages_vi.min.js"></script>
        <script src="public/js/loaisanpham/loaisanpham-sua-validate.js"></script>

    <?php endif ?>
</body>
</html>

