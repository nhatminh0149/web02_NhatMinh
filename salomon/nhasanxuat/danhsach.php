<?php
    require_once __DIR__ .'/../dbconnect.php';

    $sql= "select * from `nhasanxuat`;";
    $result=mysqli_query($conn,$sql);

    $data=[];
    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $data[]=array(
            'nsx_ma' => $row['nsx_ma'],
            'nsx_ten' => $row['nsx_ten'],
        );
    }
    /* print_r($data);
    die;*/
?>

<table border=1>
    <tr>
        <th>Mã</th>
        <th>Tên nhà sản xuất</th>
        <th>Chức năng</th>
    </tr>
    <?php foreach($data as $row) : ?>
        <tr>
        <td> <?php echo $row['nsx_ma']; ?></td>
        <td> <?php echo $row['nsx_ten']; ?></td>

        <!-- Truyền dữ liệu GET trên URL, theo dạng ?KEY1=VALUE1&KEY2=VALUE2 -->
        <td><a href="/web02_NhatMinh/salomon/nhasanxuat/sua.php?nsx_ma=<?php echo $row['nsx_ma']; ?>"> Sửa </a> 
             <a href="/web02_NhatMinh/salomon/nhasanxuat/xoa.php?nsx_ma=<?php echo $row['nsx_ma']; ?>"> Xóa </a> 
        </td>
        </tr>
        
    <?php endforeach; ?>

</table>
<br>
<a href="/web02_NhatMinh/salomon/nhasanxuat/themmoi.php"> Thêm </a> 
