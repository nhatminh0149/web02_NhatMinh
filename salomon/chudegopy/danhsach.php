<?php
    require_once __DIR__ .'/../dbconnect.php';

    $sql= "select * from `chudegopy`;";
    $result=mysqli_query($conn,$sql);

    $data=[];
    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $data[]=array(
            'cdgy_ma' => $row['cdgy_ma'],
            'cdgy_ten' => $row['cdgy_ten'],
        );
    }
    /* print_r($data);
    die;*/
?>

<table border=1>
    <tr>
        <th>Mã</th>
        <th>Tên chủ đề góp ý</th>
        <th>Chức năng</th>
    </tr>
    <?php foreach($data as $row) : ?>
        <tr>
        <td> <?php echo $row['cdgy_ma']; ?></td>
        <td> <?php echo $row['cdgy_ten']; ?></td>

        <!-- Truyền dữ liệu GET trên URL, theo dạng ?KEY1=VALUE1&KEY2=VALUE2 -->
        <td><a href="/web02_NhatMinh/salomon/chudegopy/sua.php?cdgy_ma=<?php echo $row['cdgy_ma']; ?>"> Sửa </a> 
             <a href="/web02_NhatMinh/salomon/chudegopy/xoa.php?cdgy_ma=<?php echo $row['cdgy_ma']; ?>"> Xóa </a> 
        </td>
        </tr>
        
    <?php endforeach; ?>

</table>
<br>
<a href="/web02_NhatMinh/salomon/chudegopy/themmoi.php?cdgy_ma=<?php echo $row['cdgy_ma']; ?>"> Thêm </a> 
