<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
.img-thumbnail {
    width: 120px;
    height: 120px;
    border: 1px solid red;
}
</style>

</head>
<body>
<?php
    require_once __DIR__ .'/../dbconnect.php';

    $sql=<<<EOT
    SELECT hsp.hsp_ma, hsp.hsp_tentaptin, sp.sp_ten, sp.sp_gia
    FROM hinhsanpham hsp
    JOIN  sanpham sp  ON sp.sp_ma=hsp.sp_ma;
EOT;
    $result=mysqli_query($conn,$sql);

    $data=[];
    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $data[]=array(
            'hsp_ma' => $row['hsp_ma'],
            'sp_ten' => $row['sp_ten'],
            'sp_gia' => $row['sp_gia'],
            'hsp_tentaptin' => $row['hsp_tentaptin'],
        );
    }
    /* print_r($data);
    die;*/
?>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Mã hình</th>
            <th>Tên sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Hình sản phẩm</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $row) : ?>
        <tr>
            <td> <?php echo $row['hsp_ma']; ?></td>
            <td> <?php echo $row['sp_ten']; ?></td>
            <td> <?php echo $row['sp_gia']; ?></td>
            <td><img src="/web02_NhatMinh/salomon/public/uploads/<?= $row['hsp_tentaptin']; ?>" class="img-thumbnail" /><td>
           

            <!-- Truyền dữ liệu GET trên URL, theo dạng ?KEY1=VALUE1&KEY2=VALUE2 -->
            <td>
                <a href="/web02_NhatMinh/salomon/hinhsanpham/sua.php?hsp_ma=<?= $row['hsp_ma']; ?>">Sửa</a>
                <a href="/web02_NhatMinh/salomon/hinhsanpham/xoa.php?hsp_ma=<?= $row['hsp_ma']; ?>">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<br>
<a href="/web02_NhatMinh/salomon/index.php?page=hinhsanpham_them" class="btn btn-primary"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm Loại Sản Phẩm </a> 

</body>
</html>


