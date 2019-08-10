<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Đây là chức năng Sửa CDGY</h1>

    <?php
        $cdgy_ma=$_GET['cdgy_ma'];
        //echo 'Đang sửa khóa chính là: ' . $cdgy_ma;

        require_once __DIR__ .'/../dbconnect.php';

        $sqlSelect = "SELECT * FROM chudegopy WHERE cdgy_ma = $cdgy_ma;";
        $resultSelect = mysqli_query($conn, $sqlSelect);

        $cdgyRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);
        // print_r($cdgyRow);
    ?>

    <form id="suacdgy" name="suacdgy" method="post" action="">
        Mã KM:   <input type="text" id="cdgy_ma" name="cdgy_ma" readonly value="<?= $cdgyRow['cdgy_ma'] ?>" /><br><br>
        Tên KM:   <input type="text" id="cdgy_ten" name="cdgy_ten" value="<?= $cdgyRow['cdgy_ten'] ?>" /><br><br>
       
                             <input type="submit" name="sua" id="sua" value="Sửa" />
    </form>

    <?php
        //Khi bấm nút sửa
        if(isset($_POST['sua'])) {
            $cdgy_ten = $_POST['cdgy_ten'];

            $sqlUpdate = "UPDATE chudegopy SET cdgy_ten = N'$cdgy_ten' WHERE cdgy_ma = $cdgy_ma;";
            mysqli_query($conn, $sqlUpdate);
            echo 'Lưu thành công!';

            // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
            header('location:danhsach.php');
        }
    ?>
</body>
</html>