<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Đây là chức năng Sửa nhà sản xuất</h1>

    <?php
        $nsx_ma=$_GET['nsx_ma'];
        //echo 'Đang sửa khóa chính là: ' . $nsx_ma;

        require_once __DIR__ .'/../../dbconnect.php';

        $sqlSelect = "SELECT * FROM nhasanxuat WHERE nsx_ma = $nsx_ma;";
        $resultSelect = mysqli_query($conn, $sqlSelect);

        $nhasanxuatRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);
        // print_r($nhasanxuatRow);
    ?>

    <form id="suansx" name="suansx" method="post" action="">
        Mã nhà sản suất:   <input type="text" id="nsx_ma" name="nsx_ma" readonly value="<?= $nhasanxuatRow['nsx_ma'] ?>" class="form-control" /><br><br>
        Tên nhà sản xuất:   <input type="text" id="nsx_ten" name="nsx_ten" value="<?= $nhasanxuatRow['nsx_ten'] ?>" class="form-control"/><br><br>
                             <input type="submit" name="sua" id="sua" class="btn btn-primary" value="Sửa" />
    </form>

    <?php
        //Khi bấm nút sửa
        if(isset($_POST['sua'])) {
            $nsx_ten = $_POST['nsx_ten'];

            $sqlUpdate = "UPDATE nhasanxuat SET nsx_ten = N'$nsx_ten'  WHERE nsx_ma = $nsx_ma;";
            mysqli_query($conn, $sqlUpdate);
            echo 'Lưu thành công!';

            // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
            header('location:/web02_NhatMinh/salomon/index.php?page=nhasanxuat_danhsach');
        }
    ?>
</body>
</html>