<?php
    require_once __DIR__ .'/../dbconnect.php';

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
    Mã góp ý: <input type="text" id="gy_ma" name="gy_ma"><br><br>
    Họ tên góp ý: <input type="text" id="gy_ma" name="gy_ma"><br><br>
    Email góp ý: <input type="text" id="gy_ma" name="gy_ma"><br><br>
    Địa chỉ góp ý: <input type="text" id="gy_ma" name="gy_ma"><br><br>
    Điện  thoại góp ý: <input type="text" id="gy_ma" name="gy_ma"><br><br>
    Tiêu đề góp ý: <input type="text" id="gy_ma" name="gy_ma"><br><br>
    Nội dung góp ý: <input type="text" id="gy_ma" name="gy_ma"><br><br>
    Ngày góp ý góp ý: <input type="text" id="gy_ma" name="gy_ma"><br><br>
  
    Chủ đề góp ý: 
    <select name="cdgy_ma" id="cdgy_ma">
        <?php foreach($datacdgy as $cdgy): ?>
            <option value="<?= $cdgy['cdgy_ma']?>"> <?= $cdgy['cdgy_ten']?>  </option>
        <?php endforeach; ?>
    </select>
    <br><br>
    
    <input type="submit" id="tcdgy" name="tcdgy" value="Thêm chủ đề góp ý">
</form>