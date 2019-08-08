<?php
    require_once __DIR__ .'/../dbconnect.php';

    $sql= "select * from `khuyenmai`;";
    $result=mysqli_query($conn,$sql);

    $data=[];
    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $data[]=array(
            'km_ma' => $row['km_ma'],
            'km_ten' => $row['km_ten'],
            'kh_tungay' => $row['kh_tungay'],
            'kh_denngay' => $row['kh_denngay'],
        );
    }
    /* print_r($data);
    die;*/
?>

<table border=1>
    <tr>
        <th>Mã</th>
        <th>Tên</th>
        <th>Mô tả</th>
        <th>Chức năng</th>
    </tr>
    <?php foreach($data as $row) : ?>
        <tr>
        <td> <?php echo $row['km_ma']; ?></td>
        <td> <?php echo $row['km_ten']; ?></td>
        <td> <?php echo $row['kh_tungay']; ?></td>
        <td> <?php echo $row['kh_denngay']; ?></td>

        <!-- Truyền dữ liệu GET trên URL, theo dạng ?KEY1=VALUE1&KEY2=VALUE2 -->
        <td><a href="/web02_NhatMinh/salomon/khuyenmai/sua.php?lsp_ma=<?php echo $row['km_ma']; ?>"> Sửa </a> 
             <a href="/web02_NhatMinh/salomon/khuyenmai/xoa.php?lsp_ma=<?php echo $row['km_ma']; ?>"> Xóa </a> 
        </td>
        </tr>
        
    <?php endforeach; ?>

</table>
<br>
<a href="/web02_NhatMinh/salomon/loaisanpham/themmoi.php?lsp_ma=<?php echo $row['lsp_ma']; ?>"> Thêm </a> 
