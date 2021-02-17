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
                                    <i class="pe-7s-users"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-text"><span class="count">
                                            {{stats}}
                                        </span></div>
                                        <div class="stat-heading">Patients</div>
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
            stats:''
        }
    },

    methods: {
        onFiltered(filteredItems) {
            this.totalRows = filteredItems.length
            this.currentPage = 1
        },
        async  getStats() {
            await axios.get('/api/dashboardStatistics').then(({ data }) => {
                console.log(data.data)
                this.stats = data.data;
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
