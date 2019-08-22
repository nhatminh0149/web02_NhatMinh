<?php
    require_once __DIR__ .'/../dbconnect.php';

    //Lấy dl từ lsp
    $sql= <<<EOT
    SELECT * FROM sanpham;
EOT;
    $resultSp=mysqli_query($conn,$sql);
    $dataSp=[];
    while($row=mysqli_fetch_array($resultSp, MYSQLI_ASSOC)){
        $dataSp[]=array(
            'sp_ma' => $row['sp_ma'],
            'sp_ten' => $row['sp_ten'],
        );
    }

     /*print_r($data);
    die;*/
?>

<form id="themhsp" name="themhsp" method="post" action="" enctype="multipart/form-data">
    Chọn hình cho sản phẩm <input type="file" id="hsp_tentaptin" name="hsp_tentaptin" class="form-control"><br><br>

    Sản phẩm: 
    <select name="sp_ma" id="sp_ma" class="form-control">
        <?php foreach($dataSp as $sp): ?>
            <option value="<?= $sp['sp_ma']?>"> <?= $sp['sp_ten']?>  </option>
        <?php endforeach; ?>
    </select>
    <br><br>
    
    <input type="submit" id="thsp" name="thsp" class="btn btn-primary" value="Thêm hình sản phẩm">
</form>

<?php
    if(isset($_POST['thsp'])){
        $sp_ma=$_POST['sp_ma'];
        $upload_dir="./../public/uploads/";

        if($_FILES['hsp_tentaptin']['error']>0){
            echo "File bị lỗi"; die;
        }
        else{
            $hsp_tentaptin=$_FILES['hsp_tentaptin']['name'];
            move_uploaded_file($_FILES['hsp_tentaptin']['tmp_name'],  $upload_dir.$hsp_tentaptin);
            echo "Upload thành công";
        }
        $sqlInsert="INSERT INTO hinhsanpham(hsp_tentaptin, sp_ma) VALUES ('$hsp_tentaptin', $sp_ma);";
        $result=mysqli_query($conn,$sqlInsert);
        header('location:/web02_NhatMinh/salomon/hinhsanpham/danhsach.php');
    }

?>



