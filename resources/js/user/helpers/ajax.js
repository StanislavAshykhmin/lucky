import Swal from "sweetalert2";

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).on('click', '.js-delete-record', function(e) {
    var url = $(this).attr('data-url');
    Swal.fire({
        title: 'Deletion Confirmation',
        html: 'This record will be deleted. Are you sure?',
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        cancelButtonText: 'Cancel'
    }).then(result => {
        if (result.value) {
            window.showPreloader()
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                type: 'delete',
                success(data){
                    sessionStorage.setItem("text", data.toast.text)
                    sessionStorage.setItem("type", data.toast.type)
                    location.reload()
                },
                error(data){
                    sessionStorage.setItem("text", data.toast.text)
                    sessionStorage.setItem("type", data.toast.type)
                    location.reload()
                }
            });
        }
    });
});
$(document).on('click', '.js-swal-with-ajax', function(e) {
    var click = $(this)
    Swal.fire({
        title: click.attr('data-title'),
        html: click.attr('data-html'),
        showCancelButton: true,
        confirmButtonText: 'Confirm',
        cancelButtonText: 'Cancel'
    }).then(result => {
        if (result.value) {
            window.showPreloader()
            $.ajax({
                url: click.attr('data-url'),
                type: click.attr('data-method'),
                success(data){
                    data.reload = true;
                    window.successResponse(data)
                },
                error(data){
                    window.errorResponse(data)
                    sessionStorage.setItem("text", data.toast.text)
                    sessionStorage.setItem("type", data.toast.type)
                    location.reload()
                }
            });
        }
    });
});
$(document).ajaxError(function( event, request, settings ) {
    if (request.status == 419) {
        location.href="/admin/login"
    }else{
        window.toastSwal('error', 'Something went wrong, please try again later.')
    }
});
