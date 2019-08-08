<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Đây là chức năng Sửa KM</h1>

    <?php
        $httt_ma=$_GET['km_ma'];
        //echo 'Đang sửa khóa chính là: ' . $km_ma;

        require_once __DIR__ .'/../dbconnect.php';

        $sqlSelect = "SELECT * FROM hinhthucthanhtoan WHERE km_ma = $km_ma;";
        $resultSelect = mysqli_query($conn, $sqlSelect);

        $kmRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);
        // print_r($nhasanxuatRow);
    ?>

    <form id="suakm" name="suakm" method="post" action="">
        Mã KM:   <input type="text" id="km_ma" name="km_ma" readonly value="<?= $htttRow['km_ma'] ?>" /><br><br>
        Tên KM:   <input type="text" id="km_ten" name="km_ten" value="<?= $kmRow['km_ten'] ?>" /><br><br>
        Noi dung: <input type="text" id="httt_ten" name="httt_ten" value="<?= $htttRow['httt_ten'] ?>" /><br><br>
        Tu ngay: <input type="text" id="httt_ten" name="httt_ten" value="<?= $htttRow['httt_ten'] ?>" /><br><br>
        Den ngay: <input type="text" id="httt_ten" name="httt_ten" value="<?= $htttRow['httt_ten'] ?>" /><br><br>
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