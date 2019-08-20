<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Đây là chức năng Sửa loại sản phẩm</h1>

    <?php
        $lsp_ma=$_GET['lsp_ma'];
        //echo 'Đang sửa khóa chính là: ' . $lsp_ma;

        require_once __DIR__ .'/../dbconnect.php';

        $sqlSelect = "SELECT * FROM loaisanpham WHERE lsp_ma = $lsp_ma;";
        $resultSelect = mysqli_query($conn, $sqlSelect);

        $loaisanphamRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);
        // print_r($loaisanphamRow);
    ?>

    <form id="sualsp" name="sualsp" method="post" action="">
        Mã loại sản phẩm:   <input type="text" id="lsp_ma" name="lsp_ma" readonly value="<?= $loaisanphamRow['lsp_ma']?>" class="form-control"/><br><br>
        Tên sản phẩm:       <input type="text" id="lsp_ten" name="lsp_ten" value="<?= $loaisanphamRow['lsp_ten'] ?>" class="form-control"/><br><br>
        Mô tả sản phẩm:     <input type="text" id="lsp_mota" name="lsp_mota" value="<?= $loaisanphamRow['lsp_mota'] ?>"class="form-control" /><br><br>
                             <input type="submit" name="sua" id="sua" value="Sửa" class="btn btn-primary"/>
    </form>

    <?php
        //Khi bấm nút lưu
        if(isset($_POST['sua'])) {
            $lsp_ten = $_POST['lsp_ten'];
            $lsp_mota = $_POST['lsp_mota'];

            $sqlUpdate = "UPDATE loaisanpham SET lsp_ten = N'$lsp_ten', lsp_mota = N'$lsp_mota' WHERE lsp_ma = $lsp_ma;";
            mysqli_query($conn, $sqlUpdate);
            echo 'Lưu thành công!';

            // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
            header('location:/web02_NhatMinh/salomon/index.php?page=loaisanpham_danhsach');
        }
    ?>
</body>
</html>