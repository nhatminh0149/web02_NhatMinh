<?php
// Include file cấu hình ban đầu của `Twig`
require_once __DIR__.'/bootstrap.php';

// Tạo danh sách sản phẩm mẫu
// Các bạn có thể viết các câu lệnh truy xuất vào database để lấy dữ liệu, ...
$congty = [
    [
        'tencongty'          => 'Tocotoco',
        'diachi'   => 'Vincom Hung Vuong',
    ],
];

// Yêu cầu `Twig` vẽ giao diện được viết trong file `vidu1.html.twig`
// với dữ liệu truyền vào file giao diện được đặt tên là `products`
echo $twig->render('gioithieutable.html.twig', ['congty' => $congty] );

?>