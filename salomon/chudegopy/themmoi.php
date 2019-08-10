<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Đây là chức năng Thêm chủ đề góp ý</h1>

    <?php
        $cdgy_ma=$_GET['cdgy_ma'];
        //echo 'Đang sửa khóa chính là: ' . $cdgy_ma;

        require_once __DIR__ .'/../dbconnect.php';

        $sqlSelect = "SELECT * FROM chudegopy WHERE cdgy_ma = $cdgy_ma;";
        $resultSelect = mysqli_query($conn, $sqlSelect);

        $cdgyRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);
        // print_r($cdgyRow);

    ?>

    <form id="themcdgy" name="themcdgy" method="post" action="">
        Mã chủ đề góp ý:       <input type="text" id="cdgy_ma" name="cdgy_ma" value="<?= $cdgyRow['cdgy_ma'] ?>" /><br><br>
        Tên chủ đề góp ý:       <input type="text" id="cdgy_ten" name="cdgy_ten" value="<?= $cdgyRow['cdgy_ten'] ?>" /><br><br>
        
                            <input type="submit" name="them" id="them" value="Thêm" />
    </form>

    <?php
        //Khi bấm nút lưu
        if(isset($_POST['them'])) {
            $cdgy_ma = $_POST['cdgy_ma'];
            $cdgy_ten = $_POST['cdgy_ten'];

            $sqlInsert = "INSERT INTO `chudegopy`(cdgy_ma, cdgy_ten) VALUES ('$cdgy_ma', N'$cdgy_ten');";
            mysqli_query($conn, $sqlInsert);
            echo 'Thêm thành công!';

            // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
            header('location:danhsach.php');
        }
    ?>
    
</body>
</html>
