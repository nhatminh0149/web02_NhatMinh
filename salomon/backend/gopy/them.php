<?php
    require_once __DIR__ .'/../../dbconnect.php';

    //Lấy dl từ lsp
    $sql= <<<EOT
    SELECT * FROM chudegopy;
EOT;
    $resultCdgy=mysqli_query($conn,$sql);
    $datacdgy=[];
    while($row=mysqli_fetch_array($resultCdgy, MYSQLI_ASSOC)){
        $datacdgy[]=array(
            'cdgy_ma' => $row['cdgy_ma'],
            'cdgy_ten' => $row['cdgy_ten'],
        );
    }

?>

<form id="themgy" name="themgy" method="post" action="">
    Họ tên góp ý: <input type="text" id="gy_hoten" name="gy_hoten"><br><br>
    Email góp ý: <input type="text" id="gy_email" name="gy_email"><br><br>
    Địa chỉ góp ý: <input type="text" id="gy_diachi" name="gy_diachi"><br><br>
    Điện  thoại góp ý: <input type="text" id="gy_dienthoai" name="gy_dienthoai"><br><br>
    Tiêu đề góp ý: <input type="text" id="gy_tieude" name="gy_tieude"><br><br>
    Nội dung góp ý: <input type="text" id="gy_noidung" name="gy_noidung"><br><br>
    Ngày góp ý góp ý: <input type="text" id="gy_ngaygopy" name="gy_ngaygopy"><br><br>
  
    Chủ đề góp ý: 
    <select name="cdgy_ma" id="cdgy_ma">
        <?php foreach($dataNsx as $nsx): ?>
            <option value="<?= $nsx['cdgy_ma']?>">  <?= $nsx['cdgy_ten']?>  </option>
        <?php endforeach; ?>
    </select>
    <br><br>
    
    <input type="submit" id="tcdgy" name="tcdgy" value="Thêm chủ đề góp ý">
</form>

<?php
    if(isset($_POST['tcdgy'])){
        //print_r('fgfdgd'); die;
        $gy_hoten=$_POST['gy_hoten'];
        $gy_email=$_POST['gy_email'];
        $gy_diachi=$_POST['gy_diachi'];
        $gy_dienthoai=$_POST['gy_dienthoai'];
        $gy_tieude=$_POST['gy_tieude'];
        $gy_noidung=$_POST['gy_noidung'];
        $gy_ngaygopy=$_POST['gy_ngaygopy'];
        $cdgy_ma=isset($_POST['cdgy_ma']) ? $_POST['cdgy_ma'] : 'NULL';

       $sqlInsert= <<<EOT
       INSERT INTO gopy
       (gy_hoten, gy_email, gy_diachi, gy_dienthoai, gy_tieude, gy_noidung, gy_ngaygopy, cdgy_ma)
         VALUES (N' $gy_hoten', ' $gy_email', N'$gy_diachi', ' $gy_dienthoai', N'$gy_tieude', N'$gy_noidung', '$gy_ngaygopy', $cdgy_ma);
EOT;
     //print_r($sqlInsert); die;
        mysqli_query($conn, $sqlInsert);
        header('location:danhsach.php');
    }

?>