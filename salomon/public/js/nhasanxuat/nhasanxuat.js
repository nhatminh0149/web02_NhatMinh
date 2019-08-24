$(document).ready(function() {
    
    $('.btn-delete').click(function(e){
        var nsx_ma = $(this).data('nsx-ma');
        //debugger;

        Swal.fire({
            title: 'Bạn có muốn xóa sp có id là: ' + nsx_ma,
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
              window.location.href="/web02_NhatMinh/salomon/nhasanxuat/xoa.php?nsx_ma=" +nsx_ma;
            }
          });
    });
});