<?php
     require_once __DIR__ .'/../../dbconnect.php';
     $kh_tendangnhap=$_GET['kh_tendangnhap'];
     $kh_trangthai=$_GET['kh_trangthai'];

    $sqlSelect="SELECT * FROM khachhang WHERE kh_tendangnhap=' $kh_tendangnhap' AND kh_trangthai='$kh_trangthai';";
    $kq=mysqli_query($conn,$sqlSelect);
    $kqRow=mysqli_fetch_array( $kq, MYSQLI_ASSOC);
    if(empty($kqRow)) {
        echo 'Vui lòng kiểm tra lại EMAIL!';
    } else {
        // Tìm được dòng khách hàng cần cập nhật
        $sqlUpdate = "UPDATE khachhang SET kh_trangthai = 1 WHERE kh_tendangnhap = '$kh_tendangnhap'";
        $resultUpdate = mysqli_query($conn, $sqlUpdate);
        echo 'Tài khoản đã được kích hoạt. Click vào <a href="http://localhost:1000/web02_NhatMinh/salomon/hinhsanpham/danhsach.php">ĐÂY</a> để đến trang chủ!';
    }
?>