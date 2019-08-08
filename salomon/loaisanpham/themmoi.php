<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Đây là chức năng Thêm loại sản phẩm</h1>

    <?php
        $lsp_ma=$_GET['lsp_ma'];
        //echo 'Đang sửa khóa chính là: ' . $lsp_ma;

        require_once __DIR__ .'/../dbconnect.php';

        $sqlSelect = "SELECT * FROM loaisanpham WHERE lsp_ma = $lsp_ma;";
        $resultSelect = mysqli_query($conn, $sqlSelect);

        $loaisanphamRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);
        // print_r($loaisanphamRow);
    ?>

    <form id="themlsp" name="themlsp" method="post" action="">
        Tên sản phẩm:       <input type="text" id="lsp_ten" name="lsp_ten" value="<?= $loaisanphamRow['lsp_ten'] ?>" /><br><br>
        Mô tả sản phẩm:     <input type="text" id="lsp_mota" name="lsp_mota" value="<?= $loaisanphamRow['lsp_mota'] ?>" /><br><br>
                            <input type="submit" name="them" id="them" value="Thêm" />
    </form>

    <?php
        //Khi bấm nút lưu
        if(isset($_POST['them'])) {
            $lsp_ten = $_POST['lsp_ten'];
            $lsp_mota = $_POST['lsp_mota'];

            $sqlInsert = "INSERT INTO `loaisanpham`(lsp_ten, lsp_mota) VALUES (N'$lsp_ten',N'$lsp_mota');";
            mysqli_query($conn, $sqlInsert);
            echo 'Thêm thành công!';

            // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
            header('location:danhsach.php');
        }
    ?>
    
</body>
</html>
