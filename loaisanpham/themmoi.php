<?php
    $conn = mysqli_connect('localhost', 'root', '', 'salomon') or die("Không thể kết nối với dữ liệu.");

    $tenlsp=$_POST['tenloaisp'];
    $tenmota=$_POST['tenmota'];

    $sql="INSERT INTO `loaisanpham`(lsp_ten, lsp_mota) VALUES (N'$tenlsp',N'$tenmota');";
    mysqli_query($conn, $sql);
?>