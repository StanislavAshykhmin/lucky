<template>
    <section id="page-account-settings">
        <div class="row">
            <div class="col-md-3 mb-2 mb-md-0">
                <ul class="nav nav-pills flex-column nav-left">
                    <li class="nav-item">
                        <a class="nav-link active" id="account-pill-general" data-toggle="pill" href="#account-access" aria-expanded="true">
                            <i data-feather="user" class="font-medium-3 mr-1"></i>
                            <span class="font-weight-bold">Account access</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="account-pill-password" data-toggle="pill" href="#try-your-luck" aria-expanded="false">
                            <i data-feather="lock" class="font-medium-3 mr-1"></i>
                            <span class="font-weight-bold">Try your luck</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="account-pill-info" data-toggle="pill" href="#history" aria-expanded="false">
                            <i data-feather="info" class="font-medium-3 mr-1"></i>
                            <span class="font-weight-bold">History</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="account-access">
                                <access :user="user"></access>
                            </div>

                            <div class="tab-pane fade" id="try-your-luck" role="tabpanel">
                                <lucky :user="user" @new="getHistoryLatestGames"></lucky>
                            </div>

                            <div class="tab-pane fade" id="history" role="tabpanel">
                                <history :user="user" ref="childHistory"></history>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>

import Access from './access'
import Lucky from './lucky'
import History from './history'

export default {
    components: { Access, Lucky, History },
    props: ['user'],
    methods: {
        getHistoryLatestGames(){
            this.$refs.childHistory.getLatestGames();
        },
    },
}
</script>

<style lang="scss" scoped>

</style>
