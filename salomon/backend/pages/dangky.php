<?php
    require_once __DIR__ .'/../dbconnect.php';

    require_once __DIR__.'/../vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
?>

<form id="dangky" name="dangky" method="post" action="">
    Tên đăng nhập khách hàng: <input type="text" id="kh_tendangnhap" name="kh_tendangnhap" class="form-control"><br><br>
    Mật khẩu khách hàng: <input type="password" id="kh_matkhau" name="kh_matkhau" class="form-control"><br><br>
    Tên khách hàng: <input type="text" id="kh_ten" name="kh_ten" class="form-control"><br><br>
    Giới tính KH: 
    <select name="kh_gioitinh" id="kh_gioitinh">
        <option value="0">Nam</option>
        <option value="1">Nữ</option>
        <option value="2">Không công bố</option>
    </select><br><br>
    Địa chỉ KH: <input type="text" id="kh_diachi" name="kh_diachi" class="form-control"><br><br>
    Điện thoại KH: <input type="text" id="kh_dienthoai" name="kh_dienthoai" class="form-control"><br><br>
    Email KH: <input type="text" id="kh_email" name="kh_email" class="form-control"><br><br>
    Ngày sinh: <input type="text" name="kh_ngaysinh" id="kh_ngaysinh" class="form-control" /><br /><br>
    Tháng sinh: <input type="text" name="kh_thangsinh" id="kh_thangsinh" class="form-control" /><br /><br>
    Năm sinh: <input type="text" name="kh_namsinh" id="kh_namsinh" class="form-control" /><br /><br>
    CMND KH: <input type="text" id="kh_cmnd" name="kh_cmnd" class="form-control"><br><br>
    Mã kích hoạt: <input type="text" id="kh_makichhoat" name="kh_makichhoat" class="form-control"><br><br>
    Trạng thái KH: 
    <select name="kh_trangthai" id="kh_trangthai">
        <option value="0">Chưa kích hoạt</option>
        <option value="1">Đã kích hoạt</option>
    </select><br><br>
    Có quyền Quản trị:
    <input type="checkbox" id="kh_quantri" name="kh_quantri" value="1" />
    <button name="Luu" id="Luu" class="btn btn-primary">
            <i class="fa fa-heartbeat" aria-hidden="true"></i> Lưu
    </button>
</form> 
<?php
    if(isset($_POST['Luu'])){
        $kh_tendangnhap = $_POST['kh_tendangnhap'];
        $kh_matkhau = sha1($_POST['kh_matkhau']);
        $kh_ten = $_POST['kh_ten'];
        $kh_gioitinh = $_POST['kh_gioitinh'];
        $kh_diachi = $_POST['kh_diachi'];
        $kh_dienthoai = $_POST['kh_dienthoai'];
        $kh_email = $_POST['kh_email'];
        $kh_ngaysinh = $_POST['kh_ngaysinh'];
        $kh_thangsinh = $_POST['kh_thangsinh'];
        $kh_namsinh = $_POST['kh_namsinh'];
        $kh_cmnd = $_POST['kh_cmnd'];
        $kh_makichhoat = $_POST['kh_makichhoat'];
        $kh_trangthai = $_POST['kh_trangthai'];
        $kh_quantri = $_POST['kh_quantri'];

        $kh_quantri = isset($_POST['kh_quantri']) ? $_POST['kh_quantri'] : 'NULL';
        $sqlInsert = "INSERT INTO khachhang (kh_tendangnhap, kh_matkhau, kh_ten, kh_gioitinh, kh_diachi, kh_dienthoai, kh_email, kh_ngaysinh, kh_thangsinh, kh_namsinh, kh_cmnd, kh_makichhoat, kh_trangthai, kh_quantri) VALUES ('$kh_tendangnhap', '$kh_matkhau', '$kh_ten', $kh_gioitinh, '$kh_diachi', '$kh_dienthoai', '$kh_email', $kh_ngaysinh, $kh_thangsinh, $kh_namsinh, '$kh_cmnd', '$kh_makichhoat', $kh_trangthai, $kh_quantri);";
        //var_dump($sqlInsert); die;
        $resultInsert = mysqli_query($conn, $sqlInsert);

            // Gởi mail kích hoạt tài khoản
    $mail = new PHPMailer(true);                               // Passing `true` enables exceptions
    try {
        //Server settings
        // http / https (SSL / TLS)
        // smtp
        $mail->SMTPDebug = 2;                                  // Enable verbose debug output
        $mail->isSMTP();                                       // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                        // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                // Enable SMTP authentication
        $mail->Username = 'tranlenhatminh97@gmail.com';// SMTP username
        $mail->Password = 'tqeizahmkrpxcpyc';                  // SMTP password
        $mail->SMTPSecure = 'tls';                             // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                     // TCP port to connect to
        $mail->CharSet = "UTF-8";
    
        // Bật chế bộ tự mình mã hóa SSL
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        //Recipients
        $mail->setFrom('tranlenhatminh97@gmail.com', '[Hỗ trợ khách hàng] - Thông tin tài khoản!');
        $mail->addAddress($kh_email);                          // Add a recipient
        $mail->addReplyTo('minhb1606911@student.ctu.edu.vn', 'Người quản trị Website');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
    
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');        // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');   // Optional name
    
        //Content
        $mail->isHTML(true);                                    // Set email format to HTML
        $mail->Subject = 'Thông báo kích hoạt tài khoản';
        $siteUrl = 'http://localhost:1000/web02_NhatMinh/salomon/';
        $body = <<<EOT
        <table>
            <tr>
                <td><h1 style="color: red; font-size: 16px; text-align: center;">TRANG BÁN HÀNG SALOMON</h1>
                    <img src="https://res.cloudinary.com/drdoqfhly/image/upload/v1530887094/gg-1_synrgy.jpg" width="300px" height="150px" />
                </td>
            </tr>
            <tr>
                <td>
                    Xin chào $kh_ten, cám ơn bạn đã đăng ký Hệ thống của chúng tôi. Vui lòng click vào liên kết sau để kích hoạt tài khoản!
                    <a href="http://localhost:1000/web02_NhatMinh/salomon/pages/kichhoattaikhoan.php?kh_tendangnhap=$kh_tendangnhap&kh_makichhoat=$kh_makichhoat">Kích hoạt tài khoản</a>
                </td>
            </tr>
            <tr>
                <td>
                    <ul>
                        <li>Xem chúng tôi qua <a href="https://facebook.com/fanpagecuaban">Facebook</a></li>
                        <li>Xem chúng tôi qua <a href="https://twitter.com/fanpagecuaban">Twitter</a></li>
                    </ul>
                </td>
            </tr>
        </table>
EOT;
        $mail->Body    = $body;
    
        $mail->send();
    } catch (Exception $e) {
        echo 'Lỗi khi gởi mail: ', $mail->ErrorInfo;
    }
}
?>