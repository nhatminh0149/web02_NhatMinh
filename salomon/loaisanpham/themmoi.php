<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Đây là chức năng Thêm Loại Sản Phẩm</h1>

    <form id="themlsp" name="themlsp" method="post" action="">
        Loại sản phẩm:       <input type="text" id="lsp_ten" name="lsp_ten"?><br><br>
                            <input type="submit" name="them" id="them" class="btn btn-primary" value="Thêm Loại sản phẩm" />
    </form>

    <?php
        require_once __DIR__ .'/../dbconnect.php';

        //Khi bấm nút Thêm
        if(isset($_POST['them'])) {
            $lsp_ten = $_POST['lsp_ten'];

            $sqlInsert = "INSERT INTO `loaisanpham`(lsp_ten) VALUES (N'$lsp_ten');";
            mysqli_query($conn, $sqlInsert);

            // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
            header('location:danhsach.php');
        }
    ?>
    
</body>
</html>
