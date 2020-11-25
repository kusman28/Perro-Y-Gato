<template>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header p-3">
                        PATIENT'S RECORD
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
								<tr>
									<th>Patient ID</th>
									<th>Name</th>
									<th>Date Registered</th>
									<th>Action</th>
								</tr>
							</thead>
                            <tbody>
								<tr v-for="record in records.data" :key="record.id">
                                    <td>{{record.id}}</td>
                                    <td>{{record.firstname}} {{record.middlename}} {{record.lastname}}</td>
                                    <td>{{record.created_at}}</td>
                                    <td>
                                        <router-link v-bind:to="'record/patient/'+record.id" class="btn btn-sm btn-grad-blue">View Details &nbsp;
                                        <i class="ion-ios-redo"></i>
                                        </router-link>
                                    </td>
								</tr>
							</tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            records: {},
        }
    },
    created() {
        axios.get('api/patient').then(response => {
            this.records = response.data;
        })
    }
}
</script>