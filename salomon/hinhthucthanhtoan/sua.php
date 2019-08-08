<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Đây là chức năng Sửa hình thức thanh toán</h1>

    <?php
        $httt_ma=$_GET['httt_ma'];
        //echo 'Đang sửa khóa chính là: ' . $httt_ma;

        require_once __DIR__ .'/../dbconnect.php';

        $sqlSelect = "SELECT * FROM hinhthucthanhtoan WHERE httt_ma = $httt_ma;";
        $resultSelect = mysqli_query($conn, $sqlSelect);

        $htttRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);
        // print_r($nhasanxuatRow);
    ?>

    <form id="suahttt" name="suahttt" method="post" action="">
        Mã HTTT:   <input type="text" id="httt_ma" name="httt_ma" readonly value="<?= $htttRow['httt_ma'] ?>" /><br><br>
        Tên HTTT:   <input type="text" id="httt_ten" name="httt_ten" value="<?= $htttRow['httt_ten'] ?>" /><br><br>
                             <input type="submit" name="sua" id="sua" value="Sửa" />
    </form>

    <?php
        //Khi bấm nút sửa
        if(isset($_POST['sua'])) {
            $httt_ten = $_POST['httt_ten'];

            $sqlUpdate = "UPDATE hinhthucthanhtoan SET httt_ten = N'$httt_ten'  WHERE httt_ma = $httt_ma;";
            mysqli_query($conn, $sqlUpdate);
            echo 'Lưu thành công!';

            // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
            header('location:danhsach.php');
        }
    ?>
</body>
</html>