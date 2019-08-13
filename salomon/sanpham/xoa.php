<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
        require_once __DIR__ . '/../dbconnect.php';

        $sp_ma = $_GET['sp_ma'];

        $sqlDelete = "DELETE FROM sanpham WHERE sp_ma = $sp_ma;";
        $resultSelect = mysqli_query($conn, $sqlDelete);

        header('location:danhsach.php');
    ?>
</body>
</html>