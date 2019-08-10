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

    <?php
        $km_ma=$_GET['km_ma'];
        //echo 'Đang sửa khóa chính là: ' . $km_ma;

        require_once __DIR__ .'/../dbconnect.php';

        $sqlSelect = "SELECT * FROM khuyenmai WHERE km_ma = $km_ma;";
        $resultSelect = mysqli_query($conn, $sqlSelect);

        $kmRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);
        // print_r($kmRow);

    ?>

    <form id="themkm" name="themkm" method="post" action="">
        Mã khuyến mãi:       <input type="text" id="km_ma" name="km_ma" value="<?= $kmRow['km_ma'] ?>" /><br><br>
        Tên khuyến mãi:       <input type="text" id="km_ten" name="km_ten" value="<?= $kmRow['km_ten'] ?>" /><br><br>
        Nội dung khuyến mãi:      <input type="text" id="kh_noidung" name="kh_noidung" value="<?= $kmRow['kh_noidung'] ?>" /><br><br>
        Khuyến mãi từ ngày:       <input type="text" id="kh_tungay" name="kh_tungay" value="<?= $kmRow['kh_tungay'] ?>" /><br><br>
        Khuyến mãi đến ngày:       <input type="text" id="km_denngay" name="km_denngay" value="<?= $kmRow['km_denngay'] ?>" /><br><br>
                            <input type="submit" name="them" id="them" value="Thêm" />
    </form>

    <?php
        //Khi bấm nút lưu
        if(isset($_POST['them'])) {
            $km_ma = $_POST['km_ma'];
            $km_ten = $_POST['km_ten'];
            $kh_noidung=$_POST['kh_noidung'];
            $kh_tungay=$_POST['kh_tungay'];
            $km_denngay=$_POST['km_denngay'];

            $sqlInsert = "INSERT INTO `khuyenmai`(km_ma, km_ten, kh_noidung, kh_tungay, km_denngay ) VALUES ('$km_ma', N'$km_ten', N'$kh_noidung', 'kh_tungay', 'km_denngay');";
            mysqli_query($conn, $sqlInsert);
            echo 'Thêm thành công!';

            // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
            header('location:danhsach.php');
        }
    ?>
    
</body>
</html>
