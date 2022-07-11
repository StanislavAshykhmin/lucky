<template>
    <div class="card card-congratulation-medal">
        <div class="card-body" v-if="result">
            <div v-if="result.win">
                <h5>Congratulations!</h5>
                <p class="card-text font-small-4">{{result.value}}</p>
                <p class="card-text font-small-3">You Win</p>
            </div>
            <div v-else="result.win">
                <h5>Unfortunately</h5>
                <p class="card-text font-small-4">{{result.value}}</p>
                <p class="card-text font-small-3">You Lose</p>
            </div>
            <h3 class="mb-75">
                ${{result.prize}}
            </h3>
            <button type="button" class="btn btn-primary waves-effect waves-float waves-light" @click="tryLucky">Im feeling lucky</button>
            <img v-if="result.win" src="/assets/user/images/badge.svg" class="congratulation-medal" alt="Medal Pic">
        </div>
        <form class="validate-form" v-else>
            <div class="row">
                <div class="col-12 text-center my-5">
                    <button type="button" class="btn btn-primary mr-1 mt-1" @click="tryLucky">Im feeling lucky</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    props: ['user'],
    data() {
        return {
            result: null,
        }
    },
    methods: {
        tryLucky(){
            let vm = this;
            axios.post('/user/'+this.user.uuid+'/games').then((response) => {
                window.successResponse(response.data)
                vm.result = response.data.payload.game
                vm.$emit('new');
            }).catch((error) => {
                window.errorResponse(error.response)
                if (error.response.data.toast){
                    window.toastSwal(error.response.data.toast.type, error.response.data.toast.text)
                }
            });
        },
    }
}
</script>

<style lang="scss" scoped>

</style>

