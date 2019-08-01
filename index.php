 <?php

 /*
$conn = mysqli_connect('localhost', 'root', '', 'salomon') or die("Không thể kết nối với dữ liệu.");

    $sql="INSERT INTO `loaisanpham`(lsp_ten, lsp_mota) VALUES ('Sạc điện thoại','không dây');";
    mysqli_query($conn, $sql);
*/

?> 

<form id="themmoisanpham" name="themmoisanpham" method="post" action="/web02/loaisanpham/themmoi.php">
    Nhập tên: <input name="tenloaisp" id="tenloaisanpham"><br><br>
    Nhập mô tả: <input name="tenmota" id="tenmota"><br><br>
    <input type="submit" value="Thêm mới loại sản phẩm" name="tenlsp">
</form>

