<template>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h5>Patient's Record</h5>
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
                                        <router-link v-bind:to="'record/patient/'+record.id" class="btn btn-primary btn-sm">View Details &nbsp;
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