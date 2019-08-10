<?php
    require_once __DIR__ .'/../dbconnect.php';
    $sql= <<<EOT
    SELECT sp.sp_ma, sp.sp_ten, sp.sp_gia, sp.sp_giacu, sp.sp_mota_ngan, sp.sp_mota_chitiet, sp.sp_ngaycapnhat, sp.sp_soluong, lsp.lsp_ten, nsx.nsx_ten, km.km_ten
    FROM sanpham sp
    JOIN loaisanpham lsp ON sp.lsp_ma=lsp.lsp_ma
    JOIN nhasanxuat nsx ON sp.nsx_ma=nsx.nsx_ma
    LEFT JOIN khuyenmai km ON sp.km_ma=km.km_ma;
EOT;
    $result=mysqli_query($conn,$sql);
    $data=[];
    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $data[]=array(
            'sp_ma' => $row['sp_ma'],
            'sp_ten' => $row['sp_ten'],
            'sp_gia' => $row['sp_gia'],
            'sp_giacu' => $row['sp_giacu'],
            'sp_mota_ngan' => $row['sp_mota_ngan'],
            'sp_mota_chitiet' => $row['sp_mota_chitiet'],
            'sp_ngaycapnhat' => $row['sp_ngaycapnhat'],
            'sp_soluong' => $row['sp_soluong'],
            'lsp_ten' => $row['lsp_ten'],
            'nsx_ten' => $row['nsx_ten'],
            'km_ten' => $row['km_ten'],
        );
    }
     /*print_r($data);
    die;*/
?>

<table border = 1>
    <thead>
        <tr>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Giá cũ sản phẩm</th>
            <th>Mô tả ngắn sản phẩm</th>
            <th>Mô tả chi tiết sản phẩm</th>
            <th>Ngày cập nhật sản phẩm</th>
            <th>Số lượng sản phẩm</th>
            <th>Loại sản phẩm</th>
            <th>Nhà sản xuất</th>
            <th>Khuyến mãi</th>
            <th>Chức năng</th>

        </tr>
    </thead>

    <tbody>
        <?php foreach($data as $row) : ?>
        <tr>
            <td><?= $row['sp_ma'] ?></td>
            <td><?= $row['sp_ten'] ?></td>
            <td><?= $row['sp_gia'] ?></td>
            <td><?= $row['sp_giacu'] ?></td>
            <td><?= $row['sp_mota_ngan'] ?></td>
            <td><?= $row['sp_mota_chitiet'] ?></td>
            <td><?= $row['sp_ngaycapnhat'] ?></td>
            <td><?= $row['sp_soluong'] ?></td>
            <td><?= $row['lsp_ten'] ?></td>
            <td><?= $row['nsx_ten'] ?></td>
            <td><?= $row['km_ten'] ?></td>
            <td><a href="/web02_NhatMinh/salomon/sanpham/sua.php?sp_ma=<?php echo $row['sp_ma']; ?>"> Sửa </a> 
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>