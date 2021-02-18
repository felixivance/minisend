<template>
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <!-- Widgets  -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="fa fa-envelope-open"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">
                                            {{stats.totalSentEmails}}
                                        </span></div>
                                        <div class="stat-heading">Total Sent Emails</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="fa fa-bullhorn"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">
                                            {{stats.postedEmails}}
                                        </span></div>
                                        <div class="stat-heading">Posted Emails</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="fa fa-check-square-o"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">
                                            {{stats.sentEmails}}
                                        </span></div>
                                        <div class="stat-heading">Sent Emails</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="stat-widget-five">
                                <div class="stat-icon dib flat-color-1">
                                    <i class="fa fa-close"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">
                                            {{stats.failedEmails}}
                                        </span></div>
                                        <div class="stat-heading">Failed Email</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Widgets -->

        </div>
        <!-- .animated -->
    </div>
</template>
<script>

export default {
    data() {
        return {
            stats:[]
        }
    },

    methods: {
        async  getStats() {
            await axios.get('/api/dashboardStatistics').then(({ data }) => {
                console.log(data.data)
                this.stats = data.data;
                console.log(this.stats.sentEmails);

            }).catch((error) => {
                console.log(error);
            });
        },

    },
    created() {
        this.getStats();

    },
}
</script>
