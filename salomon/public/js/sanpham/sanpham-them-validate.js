$(document).ready(function () {
    $("#themsp").validate({
        rules: {
            sp_ten: {
                required: true,
                minlength: 3,
                maxlength: 50
            },
            sp_gia: {
                required: true,
                minlength: 5,
                maxlength: 9
            },
            sp_giacu: {
                required: true,
                minlength: 5,
                maxlength: 9
            },

            sp_soluong: {
                required: true,
                minlength: 1,
                maxlength: 500
            },
            
        },
        messages: {
            sp_ten: {
                required: "Vui lòng nhập tên Sản phẩm",
                minlength: "Tên Sản phẩm phải từ 3 ký tự",
                maxlength: "Tên Sản phẩm không được vượt quá 50 ký tự"
            },
            sp_gia: {
                required: "Vui lòng nhập giá Sản phẩm",
                minlength: "Giá Sản phẩm phải từ 10k",
                maxlength: "Giá Sản phẩm không được vượt quá 900tr"
            },
            sp_giacu: {
                required: "Vui lòng nhập giá cũ Sản phẩm",
                minlength: "Giá Sản phẩm phải từ 10k",
                maxlength: "Giá Sản phẩm không được vượt quá 900tr"
            },
            
            sp_soluong: {
                required: "Vui lòng nhập số lượng của Sản phẩm",
                minlength: " Sản phẩm phải có số lượng từ 1 sp",
                maxlength: "Sản phẩm không được vượt quá 500 sp"
            },
        },
        errorElement: "em",
        errorPlacement: function (error, element) {
            // Thêm class `invalid-feedback` cho field đang có lỗi
            error.addClass("invalid-feedback");
            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.parent("label"));
            } else {
                error.insertAfter(element);
            }
            // Thêm icon "Kiểm tra không Hợp lệ"
            if (!element.next("span")[0]) {
                $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>")
                    .insertAfter(element);
            }
        },
        success: function (label, element) {
            // Thêm icon "Kiểm tra Hợp lệ"
            if (!$(element).next("span")[0]) {
                $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>")
                    .insertAfter($(element));
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
});