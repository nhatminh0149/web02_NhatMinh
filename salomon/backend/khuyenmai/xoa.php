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
        require_once __DIR__ . '/../../dbconnect.php';

        $km_ma = $_GET['km_ma'];

        $sqlDelete = "DELETE FROM khuyenmai WHERE km_ma = $km_ma;";
        $resultSelect = mysqli_query($conn, $sqlDelete);

        header('location:danhsach.php');
    ?>
</body>
</html>