<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Đây là chức năng Thêm khuyến mãi</h1>

    <form id="themkm" name="themkm" method="post" action="">
        Tên khuyến mãi:       <input type="text" id="km_ten" name="km_ten"> <br><br>
        Nội dung khuyến mãi:      <input type="text" id="kh_noidung" name="kh_noidung" ><br><br>
        Khuyến mãi từ ngày:       <input type="text" id="kh_tungay" name="kh_tungay"><br><br>
        Khuyến mãi đến ngày:       <input type="text" id="km_denngay" name="km_denngay"><br><br>
                            <input type="submit" name="them" id="them" value="Thêm" />
    </form>

    <?php
        require_once __DIR__ .'/../dbconnect.php';
        
        //Khi bấm nút lưu
        if(isset($_POST['them'])) {
            $km_ten = $_POST['km_ten'];
            $kh_noidung=$_POST['kh_noidung'];
            $kh_tungay=$_POST['kh_tungay'];
            $km_denngay=$_POST['km_denngay'];

            $sqlInsert = "INSERT INTO `khuyenmai`(km_ten, kh_noidung, kh_tungay, km_denngay ) VALUES ( N'$km_ten', N'$kh_noidung', '$kh_tungay', '$km_denngay');";
            mysqli_query($conn, $sqlInsert);
            echo 'Thêm thành công!';

            // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
            header('location:danhsach.php');
        }
    ?>
    
</body>
</html>
