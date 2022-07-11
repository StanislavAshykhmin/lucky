<template>
    <div class="card card-transaction">
        <div class="card-header">
            <h4 class="card-title">Last 3 games</h4>
        </div>
        <div class="card-body">
            <div class="transaction-item" v-for="(result, index) in results" :key="index">
                <div class="media">
                    <div v-bind:class="[result.win ? 'bg-light-success' : 'bg-light-error']" class="avatar  rounded">
                        <div class="avatar-content">
                            <svg v-if="result.win" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            <svg v-else xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </div>
                    </div>
                    <div class="media-body">
                        <h6 class="transaction-title">{{result.value}}</h6>
                        <small>{{result.created_at}}</small>
                    </div>
                </div>
                <div class="font-weight-bolder">${{result.prize}}</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['user'],
    data() {
        return {
            results: [],
        }
    },
    methods: {
        getLatestGames(){
            let vm = this;
            axios.post('/user/'+this.user.uuid+'/history').then((response) => {
                window.successResponse(response.data)
                vm.results = response.data.data
            }).catch((error) => {
                window.errorResponse(error.response)
                if (error.response.data.toast){
                    window.toastSwal(error.response.data.toast.type, error.response.data.toast.text)
                }
            });
        },
    },
    mounted() {
        this.getLatestGames()
    }
}
</script>

<style scoped>
.bg-light-success{
    background-color: #28c76f;
}
.bg-light-error{
    background-color: #e80707;
}
</style>
