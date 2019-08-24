<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Đây là chức năng Thêm nhà sản xuất</h1>

    <form id="themnsx" name="themnsx" method="post" action="">
        Tên sản phẩm:       <input type="text" id="nsx_ten" name="nsx_ten"? class="form-control"><br><br>
                            <input type="submit" name="them" id="them" value="Thêm Nhà sản xuất" class="btn btn-primary" />
    </form>

    <?php
        require_once __DIR__ .'/../dbconnect.php';
        //Khi bấm nút Thêm
        if(isset($_POST['them'])) {
            $nsx_ten = $_POST['nsx_ten'];

            $sqlInsert = "INSERT INTO `nhasanxuat`(nsx_ten) VALUES (N'$nsx_ten');";
            mysqli_query($conn, $sqlInsert);

            // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
            header('location:/web02_NhatMinh/salomon/index.php?page=nhasanxuat_danhsach');
        }
    ?>
    
</body>
</html>
