require('./helpers/ajax')
require('./helpers/bootstrap');
require('./helpers/response')
require('./helpers/sweetalert')
const Swal = require("sweetalert2");
$(document).ready(function() {
    if ($("#datatables-basic").length){
        $("#datatables-basic").DataTable();
    }
})
