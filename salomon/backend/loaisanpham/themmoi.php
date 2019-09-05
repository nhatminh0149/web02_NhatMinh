<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Đây là chức năng Thêm Loại Sản Phẩm</h1>

    <form id="themlsp" name="themlsp" method="post" action="">
        Loại sản phẩm:       <input type="text" id="lsp_ten" name="lsp_ten" class="form-control"><br><br>
                            <input type="submit" name="them" id="them" class="btn btn-primary" value="Thêm Loại sản phẩm" />
    </form>

    <?php
        require_once __DIR__ .'/../../dbconnect.php';

        //Khi bấm nút Thêm
        if(isset($_POST['them'])) {
            $lsp_ten = $_POST['lsp_ten'];

            // Kiểm tra ràng buộc dữ liệu (Validation)
        // Tạo biến lỗi để chứa thông báo lỗi
        $errors = [];
        // required
        // ''
        // NULL
        if (empty($lsp_ten)) {
            $errors['lsp_ten'][] = [
                'rule' => 'required',
                'rule_value' => true,
                'value' => $lsp_ten,
                'msg' => 'Vui lòng nhập tên Loại Sản phẩm'
            ];
        }
        // minlength 3
        if (!empty($lsp_ten) && strlen($lsp_ten) < 3) {
            $errors['lsp_ten'][] = [
                'rule' => 'minlength',
                'rule_value' => 3,
                'value' => $lsp_ten,
                'msg' => 'Tên Loại Sản phẩm phải có ít nhất 3 ký tự'
            ];
        }
        // maxlength 50
        if (!empty($lsp_ten) && strlen($lsp_ten) > 50) {
            $errors['lsp_ten'][] = [
                'rule' => 'maxlength',
                'rule_value' => 50,
                'value' => $lsp_ten,
                'msg' => 'Tên Loại Sản phẩm không được vượt quá 50 ký tự'
            ];
        }
        // Nếu như có lỗi -> thông báo lỗi ra màn hình
        if (!empty($errors)) { ?>
    <div id="thongbao" class="alert alert-danger face" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            <?php foreach($errors as $fields) : ?>
                <?php foreach($fields as $field) : ?>
                <li><?= $field['msg']; ?></li>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </ul>
    </div>
        <?php
        }
        else {
            $sqlInsert = "INSERT INTO `loaisanpham`(lsp_ten) VALUES (N'$lsp_ten');";
            $resultInsert = mysqli_query($conn, $sqlInsert);
            header('location:/web02_NhatMinh/salomon/index.php?page=loaisanpham_danhsach');
        }
    }
    ?>
    
</body>
</html>
