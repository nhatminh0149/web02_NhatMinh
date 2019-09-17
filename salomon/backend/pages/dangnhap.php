<?php
    require_once __DIR__ .'/../../dbconnect.php';
?>

<form id="dangky" name="dangky" method="post" action="">
    Tên đăng nhập khách hàng: <input type="text" id="kh_tendangnhap" name="kh_tendangnhap" class="form-control"><br><br>
    Mật khẩu khách hàng: <input type="password" id="kh_matkhau" name="kh_matkhau" class="form-control"><br><br>

    <button name="Dangnhap" id="Dangnhap" class="btn btn-primary">
            <i class="fa fa-heartbeat" aria-hidden="true"></i> Đăng nhập
    </button>
</form> 

<?php
    if(isset($_POST['Dangnhap'])){
        $kh_tendangnhap = $_POST['kh_tendangnhap'];
        $kh_matkhau = sha1($_POST['kh_matkhau']);

        $sqlSelect="SELECT * FROM khachhang WHERE kh_tendangnhap='$kh_tendangnhap' AND kh_matkhau='$kh_matkhau';";
        $resultSelect = mysqli_query($conn,  $sqlSelect);

        $khRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); // 1 record
        if(empty($khRow)) {
            echo 'Đăng nhập không thành công. Vui lòng kiểm tra lại!';
        } else {
            header('location:/web02_NhatMinh/salomon/index.php');
            

            // Lưu username vào trong session
            $_SESSION['username'] = $kh_tendangnhap;
        }
    }
?>