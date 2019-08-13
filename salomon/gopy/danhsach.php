<?php
    require_once __DIR__ .'/../dbconnect.php';
    $sql= <<<EOT
    SELECT gy.gy_ma, gy.gy_hoten, gy.gy_email, gy.gy_diachi, gy.gy_dienthoai, gy.gy_tieude, gy.gy_noidung, gy.gy_ngaygopy, cdgy.cdgy_ma
    FROM gopy gy
    LEFT JOIN chudegopy cdgy ON gy.cdgy_ma=cdgy.cdgy_ma;
EOT;
    $result=mysqli_query($conn,$sql);
    $data=[];
    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $data[]=array(
            'gy_ma' => $row['gy_ma'],
            'gy_hoten' => $row['gy_hoten'],
            'gy_email' => $row['gy_email'],
            'gy_diachi' => $row['gy_diachi'],
            'gy_dienthoai' => $row['gy_dienthoai'],
            'gy_tieude' => $row['gy_tieude'],
            'gy_noidung' => $row['gy_noidung'],
            'gy_ngaygopy' => $row['gy_ngaygopy'],
            'cdgy_ma' => $row['cdgy_ma'],
        );
    }
     /*print_r($data);
    die;*/
?>

<table border = 1>
    <thead>
        <tr>
            <th>Mã góp ý</th>
            <th>Họ tên góp ý</th>
            <th>Email góp ý</th>
            <th>Địa chỉ góp ý</th>
            <th>Điện thoại góp ý</th>
            <th>Tiêu đề góp ý</th>
            <th>Nội dung góp ý</th>
            <th>Ngày góp ý</th>
            <th>Chủ đề góp ý</th>
           
        </tr>
    </thead>

    <tbody>
        <?php foreach($data as $row) : ?>
        <tr>
            <td><?= $row['gy_ma'] ?></td>
            <td><?= $row['gy_hoten'] ?></td>
            <td><?= $row['gy_email'] ?></td>
            <td><?= $row['gy_diachi'] ?></td>
            <td><?= $row['gy_dienthoai'] ?></td>
            <td><?= $row['gy_tieude'] ?></td>
            <td><?= $row['gy_noidung'] ?></td>
            <td><?= $row['gy_ngaygopy'] ?></td>
            <td><?= $row['cdgy_ma'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="/web02_NhatMinh/salomon/gopy/them.php"> Thêm </a>