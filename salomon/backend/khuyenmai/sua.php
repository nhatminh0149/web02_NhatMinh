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
        $km_ma=$_GET['km_ma'];
        //echo 'Đang sửa khóa chính là: ' . $km_ma;

        require_once __DIR__ .'/../../dbconnect.php';

        $sqlSelect = "SELECT * FROM khuyenmai WHERE km_ma = $km_ma;";
        $resultSelect = mysqli_query($conn, $sqlSelect);

        $kmRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);
        // print_r($kmRow);
    ?>

    <form id="suakm" name="suakm" method="post" action="">
        Mã KM:   <input type="text" id="km_ma" name="km_ma" readonly value="<?= $kmRow['km_ma'] ?>" /><br><br>
        Tên KM:   <input type="text" id="km_ten" name="km_ten" value="<?= $kmRow['km_ten'] ?>" /><br><br>
        Noi dung KM: <input type="text" id="kh_noidung" name="kh_noidung" value="<?= $kmRow['kh_noidung'] ?>" /><br><br>
        KM Tu ngay: <input type="text" id="kh_tungay" name="kh_tungay" value="<?= $kmRow['kh_tungay'] ?>" /><br><br>
        KM Den ngay: <input type="text" id="km_denngay" name="km_denngay" value="<?= $kmRow['km_denngay'] ?>" /><br><br>
                             <input type="submit" name="sua" id="sua" value="Sửa" />
    </form>

    <?php
        //Khi bấm nút sửa
        if(isset($_POST['sua'])) {
            $km_ten = $_POST['km_ten'];
            $kh_noidung = $_POST['kh_noidung'];
            $kh_tungay = $_POST['kh_tungay'];
            $km_denngay = $_POST['km_denngay'];

            $sqlUpdate = "UPDATE khuyenmai SET km_ten = N'$km_ten', kh_noidung = N'$kh_noidung', kh_tungay = '$kh_tungay', km_denngay = '$km_denngay'  WHERE km_ma = $km_ma;";
            mysqli_query($conn, $sqlUpdate);
            echo 'Lưu thành công!';

            // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
            header('location:danhsach.php');
        }
    ?>
</body>
</html>