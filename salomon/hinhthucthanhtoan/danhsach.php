<?php
    require_once __DIR__ .'/../dbconnect.php';

    $sql= "select * from `hinhthucthanhtoan`;";
    $result=mysqli_query($conn,$sql);

    $data=[];
    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $data[]=array(
            'httt_ma' => $row['httt_ma'],
            'httt_ten' => $row['httt_ten'],
        );
    }
    /* print_r($data);
    die;*/
?>

<table border=1>
    <tr>
        <th>Mã</th>
        <th>Tên hình thức thanh toán</th>
        <th>Chức năng</th>
    </tr>
    <?php foreach($data as $row) : ?>
        <tr>
        <td> <?php echo $row['httt_ma']; ?></td>
        <td> <?php echo $row['httt_ten']; ?></td>

        <!-- Truyền dữ liệu GET trên URL, theo dạng ?KEY1=VALUE1&KEY2=VALUE2 -->
        <td><a href="/web02_NhatMinh/salomon/hinhthucthanhtoan/sua.php?httt_ma=<?php echo $row['httt_ma']; ?>"> Sửa </a> 
            <a href="/web02_NhatMinh/salomon/hinhthucthanhtoan/xoa.php?httt_ma=<?php echo $row['httt_ma']; ?>"> Xóa </a> 
        </td>
        </tr>
        
    <?php endforeach; ?>

</table>
<br>
<a href="/web02_NhatMinh/salomon/hinhthucthanhtoan/themmoi.php"> Thêm </a> 
