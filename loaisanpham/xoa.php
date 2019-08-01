<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form id="xoasanpham" name="xoasanpham" method="post" action="/web02/loaisanpham/xoa.php">
 
    Nhập loại sp cần xóa: <input name="xoalsp" id="xoalsp"><br><br>
    <input type="submit" value="Xóa loại sản phẩm" name="xoa">
</form>

<?php
    if(isset($_POST['xoa'])){
        $conn = mysqli_connect('localhost', 'root', '', 'salomon') or die("Không thể kết nối với dữ liệu.");

        $xoaa=$_POST['xoalsp'];

        $sql="DELETE FROM `loaisanpham` WHERE lsp_ma= $xoaa;";
       if( mysqli_query($conn, $sql)) echo 'Xóa thành công';
       
    }
?>
</body>
</html>