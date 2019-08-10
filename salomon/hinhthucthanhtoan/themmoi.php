<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Đây là chức năng Thêm hình thức thanh toán</h1>

    <?php
        $httt_ma=$_GET['httt_ma'];
        //echo 'Đang sửa khóa chính là: ' . $httt_ma;

        require_once __DIR__ .'/../dbconnect.php';

        $sqlSelect = "SELECT * FROM hinhthucthanhtoan WHERE httt_ma = $httt_ma;";
        $resultSelect = mysqli_query($conn, $sqlSelect);

        $htttRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);
        // print_r($htttRow);
    ?>

    <form id="themhttt" name="themhttt" method="post" action="">
        Tên HTTT:       <input type="text" id="httt_ten" name="httt_ten" value="<?= $htttRow['httt_ten'] ?>" /><br><br>
                            <input type="submit" name="them" id="them" value="Thêm" />
    </form>

    <?php
        //Khi bấm nút lưu
        if(isset($_POST['them'])) {
            $httt_ten = $_POST['httt_ten'];

            $sqlInsert = "INSERT INTO `hinhthucthanhtoan`(httt_ten) VALUES (N'$httt_ten');";
            mysqli_query($conn, $sqlInsert);
            echo 'Thêm thành công!';

            // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
            header('location:danhsach.php');
        }
    ?>
    
</body>
</html>
