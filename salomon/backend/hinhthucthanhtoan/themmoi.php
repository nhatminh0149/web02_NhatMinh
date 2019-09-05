<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Đây là chức năng Thêm Hình thức thanh toán</h1>

    <form id="themhttt" name="themhttt" method="post" action="">
        Loại sản phẩm:       <input type="text" id="httt_ten" name="httt_ten"?><br><br>
                            <input type="submit" name="them" id="them" value="Thêm Hình thức thanh toán" />
    </form>

    <?php
        require_once __DIR__ .'/../../dbconnect.php';

        //Khi bấm nút Thêm
        if(isset($_POST['them'])) {
            $httt_ten = $_POST['httt_ten'];

            $sqlInsert = "INSERT INTO `hinhthucthanhtoan`(httt_ten) VALUES (N'$httt_ten');";
            mysqli_query($conn, $sqlInsert);

            // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
            header('location:danhsach.php');
        }
    ?>
    
</body>
</html>
