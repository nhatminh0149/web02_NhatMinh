<?php
    require_once __DIR__ .'/../../dbconnect.php';

     // Kiểm tra xác thực tài khoản
    if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    // Đã đăng nhập rồi
        echo 'Đã đăng nhập!';
    } else {
    // Chưa đăng nhập
        echo 'Bạn chưa đăng nhập. Vui lòng <a href="http://localhost:1000/web02_NhatMinh/salomon/pages/dangnhap.php">click vào đây</a> để đến trang Đăng nhập';
        die;
    }

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

<table class="table table-bordered table-hover table-responsive">
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
            <td><a href="/web02_NhatMinh/salomon/index.php?page=sanpham_sua&sp_ma=<?php echo $row['sp_ma']; ?>" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa </a>
                <button class="btn btn-danger btn-delete" data-sp-ma="<?= $row['sp_ma'] ?>">
                    <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Xóa
                </button> </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="/web02_NhatMinh/salomon/index.php?page=sanpham_them" class="btn btn-primary"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm Sản Phẩm</a>