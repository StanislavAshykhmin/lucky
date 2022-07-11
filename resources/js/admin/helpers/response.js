window.successResponse = function(response) {
    let toast = response.toast;
    if (response.reload){
        if (toast){
            window.setNotificationToSession(toast)
        }
        location.reload()
    }else if (response.route){
        if (toast){
            window.setNotificationToSession(toast)
        }
        location.href = response.route
    }else{
        if (toast){
            window.toastSwal(toast.type, toast.text)
        }
    }
}

window.errorResponse = function (response) {
    if (response.status == 500){
        window.toastSwal('error', 'Something went wrong, please try again later.')
    }else if (response.status == 419) {
        location.href = "/admin/login"
    }
}
