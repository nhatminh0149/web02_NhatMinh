$(document).ready(function () {
    $("#sualsp").validate({
        rules: {
            lsp_ten: {
                required: true,
                minlength: 3,
                maxlength: 50
            },
            lsp_mota: {
                required: true,
                minlength: 50,
                maxlength: 500
            },
          
        },
        messages: {
            lsp_ten: {
                required: "Vui lòng nhập tên Loại Sản phẩm",
                minlength: "Tên Loại Sản phẩm phải từ 3 ký tự",
                maxlength: "Tên Loại Sản phẩm không được vượt quá 50 ký tự"
            },
            lsp_mota: {
                required: "Vui lòng nhập tên Loại Sản phẩm",
                minlength: "Tên Loại Sản phẩm phải từ 50 ký tự",
                maxlength: "Tên Loại Sản phẩm không được vượt quá 500 ký tự"
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