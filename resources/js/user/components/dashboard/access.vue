<template>
    <form class="validate-form">
        <div class="row">
            <div class="col-12 mt-75">
                <div class="alert alert-warning mb-50" role="alert">
                    <h4 class="alert-heading">Your account will be active for:</h4>
                    <h3 class="alert-body">
                        <flip-countdown :deadline="this.user.expired_access_format"></flip-countdown>
                    </h3>
                </div>
            </div>
            <div class="col-12">
                <div class="card card-app-design mb-0">
                    <div class="card-body px-0">
                        <p class="card-text font-small-4">
                            You can generate a new link for your account, thereby extending it for another week
                        </p>
                        <button type="button" class="btn btn-primary mr-1" @click="renewAccount">Renew account</button>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card card-app-design">
                    <div class="card-body px-0 pt-0">
                        <p class="card-text font-small-4">
                            You can deactivate access to your account. After deactivation, you will no longer be able to log in with your current credentials
                        </p>
                        <button type="button" class="btn btn-outline-danger" @click="deactivateAccount">Deactivate account</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
import FlipCountdown from 'vue2-flip-countdown'
import Swal from "sweetalert2";
export default {
    components: { FlipCountdown },
    props: ['user'],
    methods: {
        renewAccount(){
            Swal.fire({
                title: 'Renew Account Confirmation',
                html: 'A new access link will be generated for you, and the counter will be reset for a week. Are you sure?',
                showCancelButton: true,
                confirmButtonText: 'Confirm',
                cancelButtonText: 'Cancel'
            }).then(result => {
                if (result.value) {
                    axios.post('/user/'+this.user.uuid+'/renew').then((response) => {
                        window.successResponse(response.data)
                    }).catch((error) => {
                        window.errorResponse(error.response)
                        if (error.response.data.toast){
                            window.toastSwal(error.response.data.toast.type, error.response.data.toast.text)
                        }
                    });
                }
            });
        },
        deactivateAccount(){
            Swal.fire({
                title: 'Deactivate Account Confirmation',
                html: 'You will lose access to your account and all data. Are you sure ?',
                showCancelButton: true,
                confirmButtonText: 'Confirm',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#e80707',
            }).then(result => {
                if (result.value) {
                    axios.post('/user/'+this.user.uuid+'/deactivate').then((response) => {
                        window.successResponse(response.data)
                    }).catch((error) => {
                        window.errorResponse(error.response)
                        if (error.response.data.toast){
                            window.toastSwal(error.response.data.toast.type, error.response.data.toast.text)
                        }
                    });
                }
            });
        },
    }
}
</script>

<style lang="scss" scoped>
.flip-clock{
    text-align: left !important;
}
</style>
