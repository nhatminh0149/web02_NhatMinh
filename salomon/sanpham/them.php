<?php
    require_once __DIR__ .'/../dbconnect.php';

    //Lấy dl từ lsp
    $sql= <<<EOT
    SELECT * FROM loaisanpham;
EOT;
    $resultLsp=mysqli_query($conn,$sql);
    $datalsp=[];
    while($row=mysqli_fetch_array($resultLsp, MYSQLI_ASSOC)){
        $datalsp[]=array(
            'lsp_ma' => $row['lsp_ma'],
            'lsp_ten' => $row['lsp_ten'],
        );
    }

    //Lấy dl từ nsx
    $sql= <<<EOT
    SELECT * FROM nhasanxuat;
EOT;
    $resultNsx=mysqli_query($conn,$sql);
    $dataNsx=[];
    while($row=mysqli_fetch_array($resultNsx, MYSQLI_ASSOC)){
        $dataNsx[]=array(
            'nsx_ma' => $row['nsx_ma'],
            'nsx_ten' => $row['nsx_ten'],
        );
    }


     //Lấy dl từ km
    $sql= <<<EOT
    SELECT * FROM khuyenmai;
EOT;
    $resultKm=mysqli_query($conn,$sql);
    $dataKm=[];
    while($row=mysqli_fetch_array($resultKm, MYSQLI_ASSOC)){
        $dataKm[]=array(
            'km_ma' => $row['km_ma'],
            'km_ten' => $row['km_ten'],
        );
    }
     /*print_r($data);
    die;*/
?>

<form id="themsp" name="themsp" method="post" action="">
    Tên sản phẩm: <input type="text" id="sp_ten" name="sp_ten"><br><br>
    Giá sản phẩm: <input type="text" id="sp_gia" name="sp_gia"><br><br>
    Giá cũ sản phẩm: <input type="text" id="sp_giacu" name="sp_giacu"><br><br>
    Mô tả ngắn sản phẩm: <input type="text" id="sp_mota_ngan" name="sp_mota_ngan"><br><br>
    Mô tả chi tiết sản phẩm: <input type="text" id="sp_mota_chitiet" name="sp_mota_chitiet"><br><br>
    Ngày cập nhật sản phẩm: <input type="text" id="sp_ngaycapnhat" name="sp_ngaycapnhat"><br><br>
    Số lượng sản phẩm: <input type="text" id="sp_soluong" name="sp_soluong"><br><br>
    Loại sản phẩm: 
    <select name="lsp_ma" id="lsp_ma">
        <?php foreach($datalsp as $lsp): ?>
            <option value="<?= $lsp['lsp_ma']?>"> <?= $lsp['lsp_ten']?>  </option>
        <?php endforeach; ?>
    </select>
    <br><br>
     Nhà sản xuất: 
    <select name="nsx_ma" id="nsx_ma">
        <?php foreach($dataNsx as $nsx): ?>
            <option value="<?= $nsx['nsx_ma']?>"><?= $nsx['nsx_ten']?></option>
        <?php endforeach; ?>
    </select>
    <br><br>
     Khuyến mãi: 
    <select name="km_ma" id="km_ma">
        <?php foreach($dataKm as $km): ?>
            <option value="<?= $km['km_ma']?>"><?= $km['km_ten']?></option>
        <?php endforeach; ?>
    </select>
    <br><br>
    <input type="submit" id="tsp" name="tsp" value="Thêm sản phẩm">
</form>