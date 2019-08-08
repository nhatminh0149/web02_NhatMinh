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

    <?php
        $nsx_ma=$_GET['nsx_ma'];
        //echo 'Đang sửa khóa chính là: ' . $lsp_ma;

        require_once __DIR__ .'/../dbconnect.php';

        $sqlSelect = "SELECT * FROM nhasanxuat WHERE nsx_ma = $nsx_ma;";
        $resultSelect = mysqli_query($conn, $sqlSelect);

        $nhasanxuatRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);
        // print_r($nhasanxuatRow);
    ?>

    <form id="themnsx" name="themnsx" method="post" action="">
        Tên sản phẩm:       <input type="text" id="nsx_ten" name="nsx_ten" value="<?= $nhasanxuatRow['nsx_ten'] ?>" /><br><br>
                            <input type="submit" name="them" id="them" value="Thêm" />
    </form>

    <?php
        //Khi bấm nút Thêm
        if(isset($_POST['them'])) {
            $nsx_ten = $_POST['nsx_ten'];

            $sqlInsert = "INSERT INTO `nhasanxuat`(nsx_ten) VALUES (N'$nsx_ten');";
            mysqli_query($conn, $sqlInsert);
            echo 'Thêm thành công!';

            // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
            header('location:danhsach.php');
        }
    ?>
    
</body>
</html>
