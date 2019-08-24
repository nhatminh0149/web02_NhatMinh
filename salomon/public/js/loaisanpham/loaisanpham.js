$(document).ready(function() {
    
  $('.btn-delete').click(function(e){
      var lsp_ma = $(this).data('lsp-ma');
      //debugger;

      Swal.fire({
          title: 'Bạn có muốn xóa lsp có id là: ' + lsp_ma,
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            );

            // Điều hướng 
            window.location.href="/web02_NhatMinh/salomon/loaisanpham/xoa.php?lsp_ma=" +lsp_ma;
          }
        });
  });
});