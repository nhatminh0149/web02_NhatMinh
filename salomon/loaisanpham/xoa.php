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

        $lsp_ma = $_GET['lsp_ma'];

        $sqlDelete = "DELETE FROM loaisanpham WHERE lsp_ma = $lsp_ma;";
        $resultSelect = mysqli_query($conn, $sqlDelete);

        header('location:/web02_NhatMinh/salomon/index.php?page=loaisanpham_danhsach');
    ?>
</body>
</html>