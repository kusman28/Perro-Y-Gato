<template>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{payment.firstname}} {{payment.middlename}} {{payment.lastname}}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="ion-ios-information mr-1"></i> Pet Name</strong>

                <p class="text-muted">
                  {{payment.pet_name}}
                </p>

                <hr>

                <strong><i class="ion-ios-paw mr-1"></i> Pet Type</strong>

                <p class="text-muted">{{payment.pet_type}}</p>

                <hr>

                <strong><i class="ion-edit mr-1"></i> Pet Notes</strong>

                <p class="text-muted">
                    {{payment.pet_note}}
                </p>
              </div>
              <!-- /.card-body -->
            </div>
            </div>

            <div class="col-md-8">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h5>Payment Record</h5>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
								<tr>
									<th>Product Name</th>
									<th>Price</th>
									<th>Amount Paid</th>
									<th>Date of Payment</th>
								</tr>
							</thead>
                            <tbody>
								<tr v-for="p in payment.payment" :key="p.id">
                                    <td>{{p.product}}</td>
                                    <td>{{p.amount}}</td>
                                    <td>{{p.amount_paid}}</td>
                                    <td>{{p.created_at}}</td>
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
            payment: {}
        }
    },
    mounted() {
		this.id = this.$route.params.id;
		this.patientRecords();
    },
    methods: {
        patientRecords()
		{
			axios.get('/api/payment/'+this.id)
			.then(({ data }) => (this.payment = data));
		},
    },
    // created() {
    //     axios.get('/api/payment/'+this.id).then(response => {
    //         this.patient = response.data;
    //     })
    // }
}
</script>