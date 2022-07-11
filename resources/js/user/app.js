window.$ = window.jQuery = require('jquery');
require('./helpers/ajax')
require('./helpers/bootstrap');
require('./helpers/response')
require('./helpers/sweetalert')
const Swal = require("sweetalert2");


window.Vue = require('vue').default;
Vue.component('dashboard', require('./components/dashboard/index.vue').default);

const app = new Vue({
    el: '#app',
});

window.setupIcon = function () {
    if (feather) {
        feather.replace({
            width: 14,
            height: 14
        });
    }
}
