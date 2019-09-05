<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Đây là chức năng Thêm Chủ đề góp ý</h1>

    <form id="themcdgy" name="themcdgy" method="post" action="">
        Chủ đề góp ý:       <input type="text" id="cdgy_ten" name="cdgy_ten"><br><br>
                            <input type="submit" name="them" id="them" value="Thêm Chủ đề góp ý" />
    </form>

    <?php
        require_once __DIR__ .'/../../dbconnect.php';

        //Khi bấm nút Thêm
        if(isset($_POST['them'])) {
            $cdgy_ten = $_POST['cdgy_ten'];

            $sqlInsert = "INSERT INTO `chudegopy`(cdgy_ten) VALUES (N'$cdgy_ten');";
            mysqli_query($conn, $sqlInsert);

            // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
            header('location:danhsach.php');
        }
    ?>
    
</body>
</html>
