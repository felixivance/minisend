
<template>
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <!-- Widgets  -->
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-dark">
                                <div class="row">
                                    <div class="col-md-10">
                                        <strong class="card-title text-light">My Emails</strong>
                                    </div>
                                    <div class="col-md-2">
                                        <button @click="openModal" type="button" class="btn btn-primary">New Email</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="dataTables_length" id="bootstrap-data-table_length">
                                            <label> Show
                                                <select v-model="perPage" name="bootstrap-data-table_length" aria-controls="bootstrap-data-table" class="form-control form-control-sm">
                                                    <option value="20">20</option>
                                                    <option value="40">40</option>
                                                    <option value="60">60</option>
                                                    <option value="200">200</option>
                                                    <!-- <option value="-1">All</option> -->
                                                </select>
                                                emails
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <b-input-group>
                                            <b-form-input id="filter-input" v-model="filter" type="search" placeholder="Type to Search"></b-form-input>
                                            <b-input-group-append>
                                                <b-button variant="dark" :disabled="!filter" @click="filter = ''">Clear</b-button>
                                            </b-input-group-append>
                                        </b-input-group>

                                    </div>
                                </div>
                                <br/>
                                <b-table bordered :items="items" :per-page="perPage" :current-page="currentPage" :fields="fields" :filter="filter" show-empty @filtered="onFiltered">
                                    <template v-slot:cell(content)="data">
                                        <span v-html="data.value"></span>
                                    </template>
                                    <template v-slot:cell(actions)="row">
                                        <b-button class="btn btn-sm" @click="openViewModal(row.item)" variant="primary" data-toggle="tooltip">
                                            View
                                        </b-button>

                                        <b-button class="btn btn-sm" variant="success" @click="openEditModal(row.item)">
                                            Resend
                                        </b-button>
                                        &nbsp;
                                        <b-button @click="deleteEmail(row.item.id)" class="btn btn-sm" variant="danger">
                                            Delete
                                        </b-button>
                                    </template>

                                    <template v-slot:cell(#)="row">
                                        <p>{{row.index + 1}}</p>
                                    </template>
                                </b-table>
                                <b-pagination v-model="currentPage" :total-rows="totalRows" :per-page="perPage" aria-controls="my-table"></b-pagination>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5  class="modal-title" id="mediumModalLabel">New Email</h5>
                    </div>
                    <form @submit.prevent="sendEmail()">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="eml" class="form-control-label">Email:</label>
                                        <input required v-model="form.toEmail" type="email" id="eml" placeholder="Enter Email" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label  class="form-control-label">Subject:</label>
                                        <input required v-model="form.subject" type="text" placeholder="Enter Subject" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="content" class="form-control-label">Content</label>
                                        <vue-editor v-model="form.content" id="content"></vue-editor>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Add Attachment</label>
                                        <input @change="selectFile" type="file" class="btn"  value="Add Attachment"
                                               accept = "application/pdf">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button  type="submit" class="btn btn-primary">Send Email</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal" id="modal-large" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5  class="modal-title" >View Email</h5>
                    </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="col-12" >To</label>
                                <p>{{form.toEmail}}</p>
                            </div>
                            <div class="form-group">
                                <label class="col-12" >Subject</label>
                                <p>{{form.subject}}</p>
                            </div>
                            <div class="form-group">
                                <label class="col-12" >Content</label>
                                <p v-html="form.content"></p>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                        </div>

                </div>
            </div>
        </div>
    </div>
</template>


<script>
import $ from 'jquery';
export default {
    data() {
        return {
            fields: ['#', 'toEmail','subject',
                {key:'content', label:'content', formatter: 'truncate'},
                {key:'created_at', label:'Sent At', formatter: 'formatDate'},'actions'],
            items: [],
            genders: [],
            services: [],
            perPage: 10,
            currentPage: 1,
            filter: null,
            totalRows: 1,
            editMode: false,
            form: new Form({
                id: '',
                toEmail: '',
                subject:'',
                content: '',
                attachment:''

            })
        }
    },
    computed: {
        rows() {
            return this.items.length
        }
    },
    methods: {
        selectFile(){
            this.form.attachment = event.target.files[0];
            console.log("photo");
            console.log(this.form.attachment);
        },
         truncate(content) {
                if (content.length > 20) {
                    return content.substring(0, 20) + '...';
                }
                return content;
         },
        formatDate(date){
          return  moment(new Date(date)).format('Do MMMM YYYY, h:mm:ss A');
        },
        onFiltered(filteredItems) {
            this.totalRows = filteredItems.length
            this.currentPage = 1
        },
        openModal() {
            $('#mediumModal').modal('show');
            this.form.reset();
            this.editMode = false;
        },
        openEditModal(email) {
            $('#mediumModal').modal('show');
            this.editMode = true;
            this.form.fill(email)
            // console.log(this.form);
        },
        async getSentEmails() {
            await  axios.get('/api/sentEmails').then(({ data }) => {
                // console.log(data)
                this.items = data.data;
                this.totalRows = this.items.length
            }).catch((error) => {
                console.log(error);
            });
        },
        async sendEmail() {
            const data = new FormData();

            data.append('toEmail',this.form.toEmail);
            data.append('subject',this.form.subject);
            data.append('content',this.form.content);
            data.append('attachment',this.form.attachment);

            const config = { headers: {'Content-Type': 'application/json'} };

            await  axios.post('/api/sentEmails/', data, config).then(({ data }) => {
                // console.log(data);
                if (data.success) {
                    this.form.reset();
                    this.getSentEmails();
                    $('#mediumModal').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Email Sent!.',
                        showConfirmButton: true,
                    });
                }
            }).catch((error) => {
                console.log(error);
            });
        },

        async deleteEmail(id) {
            await   Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this email and its attachments? You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete email!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log(id);
                    axios.delete('/api/sentEmails/' + id,).then(({ data }) => {
                        // console.log(data);
                        if (data.success) {
                            this.form.reset();
                            this.getSentEmails();
                            $('#mediumModal').modal('hide');
                            Swal.fire(
                                'Deleted!',
                                'Email has been deleted.',
                                'success'
                            )
                        }
                    }).catch((error) => {
                        console.log(error);
                    });
                }
            })
        },
        openViewModal(email) {
            $('#modal-large').modal('show');
            this.form.fill(email);
        },
    },
    mounted() {
        this.getSentEmails();

    },
}
</script>
