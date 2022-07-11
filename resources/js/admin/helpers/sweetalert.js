const Swal = require('sweetalert2')
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
window.toastSwal = function (icon, title) {
    Toast.fire({
        icon: icon,
        title: title
    })
}

window.setNotificationToSession = function (toast) {
    sessionStorage.setItem("text", toast.text)
    sessionStorage.setItem("type", toast.type)
}
if (sessionStorage.getItem("text") && sessionStorage.getItem("type")){
    window.toastSwal(sessionStorage.getItem("type"), sessionStorage.getItem("text"))
    sessionStorage.clear('text')
    sessionStorage.clear('type')
}
