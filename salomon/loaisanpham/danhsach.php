<?php
    require_once __DIR__ .'/../dbconnect.php';

    $sql= "select * from `loaisanpham`;";
    $result=mysqli_query($conn,$sql);

    $data=[];
    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $data[]=array(
            'lsp_ma' => $row['lsp_ma'],
            'lsp_ten' => $row['lsp_ten'],
            'lsp_mota' => $row['lsp_mota'],
        );
    }
    /* print_r($data);
    die;*/
?>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Mô tả</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $row) : ?>
        <tr>
            <td> <?php echo $row['lsp_ma']; ?></td>
            <td> <?php echo $row['lsp_ten']; ?></td>
            <td> <?php echo $row['lsp_mota']; ?></td>

            <!-- Truyền dữ liệu GET trên URL, theo dạng ?KEY1=VALUE1&KEY2=VALUE2 -->
            <td>
                <a href="/web02_NhatMinh/salomon/index.php?page=loaisanpham_sua&lsp_ma=<?php echo $row['lsp_ma']; ?>" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa </a>
                <button class="btn btn-danger btn-delete" data-lsp-ma="<?= $row['lsp_ma'] ?>">
                    <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Xóa
                </button> 
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<br>
<a href="/web02_NhatMinh/salomon/index.php?page=loaisanpham_themmoi" class="btn btn-primary"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm Loại Sản Phẩm </a> 
