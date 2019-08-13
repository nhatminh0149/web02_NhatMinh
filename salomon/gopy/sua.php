<?php
    require_once __DIR__ .'/../dbconnect.php';

    //Lấy dữ liệu cần chỉnh sửa
    $gy_ma=$_GET['gy_ma'];

    $sqlSelect="SELECT * FROM gopy WHERE gy_ma= $gy_ma;";
    $resultSelect = mysqli_query($conn, $sqlSelect);

    $sanphamRow = [];
    while ($row = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC)) {
        $sanphamRow = array(
            'gy_ma' => $row['gy_ma'],
            'sp_ten' => $row['sp_ten'],
            'sp_gia' => $row['sp_gia'],
            'sp_giacu' => $row['sp_giacu'],
            'sp_mota_ngan' => $row['sp_mota_ngan'],
            'sp_mota_chitiet' => $row['sp_mota_chitiet'],
            'sp_ngaycapnhat' => $row['sp_ngaycapnhat'],
            'sp_soluong' => $row['sp_soluong'],
            'lsp_ma' => $row['lsp_ma'],
            'nsx_ma' => $row['nsx_ma'],
            'km_ma' => $row['km_ma'],
        );
    }


    //Lấy dl từ lsp
    $sqlLsp= <<<EOT
    SELECT * FROM loaisanpham;
EOT;
    $resultLsp=mysqli_query($conn,$sqlLsp);
    $datalsp=[];
    while($row=mysqli_fetch_array($resultLsp, MYSQLI_ASSOC)){
        $datalsp[]=array(
            'lsp_ma' => $row['lsp_ma'],
            'lsp_ten' => $row['lsp_ten'],
        );
    }

    //Lấy dl từ nsx
    $sqlNsx= <<<EOT
    SELECT * FROM nhasanxuat;
EOT;
    $resultNsx=mysqli_query($conn,$sqlNsx);
    $dataNsx=[];
    while($row=mysqli_fetch_array($resultNsx, MYSQLI_ASSOC)){
        $dataNsx[]=array(
            'nsx_ma' => $row['nsx_ma'],
            'nsx_ten' => $row['nsx_ten'],
        );
    }


     //Lấy dl từ km
    $sqlKm= <<<EOT
    SELECT * FROM khuyenmai;
EOT;
    $resultKm=mysqli_query($conn,$sqlKm);
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

<form id="suasp" name="suasp" method="post" action="">
    Tên sản phẩm: <input type="text" id="sp_ten" name="sp_ten" value="<?= $sanphamRow ['sp_ten']?>"  ><br><br>
    Giá sản phẩm: <input type="text" id="sp_gia" name="sp_gia" value="<?= $sanphamRow ['sp_gia']?>" ><br><br>
    Giá cũ sản phẩm: <input type="text" id="sp_giacu" name="sp_giacu" value="<?= $sanphamRow ['sp_giacu']?>" ><br><br>
    Mô tả ngắn sản phẩm: <input type="text" id="sp_mota_ngan" name="sp_mota_ngan" value="<?= $sanphamRow ['sp_mota_ngan']?>" ><br><br>
    Mô tả chi tiết sản phẩm: <input type="text" id="sp_mota_chitiet" name="sp_mota_chitiet" value="<?= $sanphamRow ['sp_mota_chitiet']?>" ><br><br>
    Ngày cập nhật sản phẩm: <input type="text" id="sp_ngaycapnhat" name="sp_ngaycapnhat" value="<?= $sanphamRow ['sp_ngaycapnhat']?>" ><br><br>
    Số lượng sản phẩm: <input type="text" id="sp_soluong" name="sp_soluong" value="<?= $sanphamRow ['sp_soluong']?>" ><br><br>
    Loại sản phẩm: 
    <select name="lsp_ma" id="lsp_ma">
        <?php foreach($datalsp as $lsp) : ?>
            <?php if($lsp['lsp_ma'] == $sanphamRow['lsp_ma']) { ?>
                <option value="<?= $lsp['lsp_ma'] ?>" selected> <?= $lsp['lsp_ten'] ?></option>
            <?php } else { ?>
                <option value="<?= $lsp['lsp_ma'] ?>"><?= $lsp['lsp_ten'] ?></option>
            <?php } ?>
        <?php endforeach; ?>
    </select>
    <br><br>
     Nhà sản xuất: 
     <select name="nsx_ma" id="nsx_ma">
        <?php foreach($dataNsx as $nsx) : ?>
            <?php if($nsx['nsx_ma'] == $sanphamRow['nsx_ma']) { ?>
                <option value="<?= $nsx['nsx_ma'] ?>" selected><?= $nsx['nsx_ten'] ?></option>
            <?php } else { ?>
                <option value="<?= $nsx['nsx_ma'] ?>"><?= $nsx['nsx_ten'] ?></option>
            <?php } ?>
        <?php endforeach; ?>
    </select>
    <br><br>
     Khuyến mãi: 
     <select name="km_ma" id="km_ma">
        <?php foreach($dataKm as $km) : ?>
            <?php if($km['km_ma'] == $sanphamRow['km_ma']) { ?>
                <option value="<?= $km['km_ma'] ?>" selected><?= $km['km_ten'] ?></option>
            <?php } else { ?>
                <option value="<?= $km['km_ma'] ?>"><?= $km['km_ten'] ?></option>
            <?php } ?>
        <?php endforeach; ?>
    </select>
    <br><br>
    <input type="submit" id="ssp" name="ssp" value="Sửa sản phẩm">
</form>

<?php
    if(isset($_POST['ssp'])){
        //print_r('fgfdgd'); die;
        $sp_ten=$_POST['sp_ten'];
        $sp_gia=$_POST['sp_gia'];
        $sp_giacu=$_POST['sp_giacu'];
        $sp_mota_ngan=$_POST['sp_mota_ngan'];
        $sp_mota_chitiet=$_POST['sp_mota_chitiet'];
        $sp_ngaycapnhat=$_POST['sp_ngaycapnhat'];
        $sp_soluong=$_POST['sp_soluong'];
        $lsp_ma=$_POST['lsp_ma'];
        $nsx_ma=$_POST['nsx_ma'];
        $km_ma=isset($_POST['km_ma']) ? $_POST['km_ma'] : 'NULL';

        $sqlUpdate =<<<EOT
        UPDATE sanpham
        SET
            sp_ten= N'$sp_ten',
            sp_gia= $sp_gia,
            sp_giacu= $sp_giacu,
            sp_mota_ngan= N'$sp_mota_ngan',
            sp_mota_chitiet= N'$sp_mota_chitiet',
            sp_ngaycapnhat='$sp_ngaycapnhat',
            sp_soluong=$sp_soluong,
            lsp_ma= $lsp_ma,
            nsx_ma= $nsx_ma,
            km_ma= $km_ma
        WHERE sp_ma=$sp_ma;
EOT;
        //print_r($sqlUpdate); die;
        $resultUpdate = mysqli_query($conn, $sqlUpdate);
        //echo 'Lưu thành công!';
        header('location:danhsach.php');

      
     
    }

?>