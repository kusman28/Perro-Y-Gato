<template>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <button type="submit" @click="paymentModal" class="btn btn-grad-blue btn-sm float-right">Add New Payment
                    <i class="ion-plus-circled"></i>
                    </button>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
								<tr>
									<th>Patient Name</th>
									<th>Product</th>
									<th>Amount Charge</th>
									<!-- <th>Action</th> -->
								</tr>
							</thead>
                            <tbody>
								<tr v-for="(p, i) in payments" :key="i">
									<td>{{p.firstname}} {{p.middlename}} {{p.lastname}}</td>
									<td>{{p.product}}</td>
									<td>{{p.amount}}</td>
			                      <!-- <td>
			                      	<a href="#" class="btn btn-primary btn-sm" @click="editProduct(product)">View
			                      		<i class="fas fa-edit"></i>
			                      	</a>
			                      </td> -->
								</tr>
							</tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
        	<div class="modal-dialog modal-dialog-centered" role="document">
        		<div class="modal-content">
        			<div class="modal-header">
        				<h6 v-show="!editmode" class="modal-title" id="addNewLabel">ADD PAYMENT</h6>
        				<h6 v-show="editmode" class="modal-title" id="addNewLabel">EDIT</h6>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        					<span aria-hidden="true">&times;</span>
        				</button>
        			</div>
        			<form @submit.prevent="editmode ? updatePatient() : addPayment()">
        			<div class="modal-body">
        				<div class="form-group">
        					<select v-model="form.patient_id" class="form-control" :class="{ 'is-invalid': form.errors.has('patient_id') }">
								<option value="" disabled>Select Patient</option>
								<option v-for="patient in patients.data" :key="patient.id" :value="patient.id">
									{{ patient.firstname }} {{ patient.middlename }} {{ patient.lastname }}
							<!-- <input type="text" v-model="form.patient" value="firstname"> -->
								</option>
								<has-error :form="form" field="patient_id"></has-error>
							</select>
        				</div>
        				<div class="form-group">
        					<select v-model="form.product" class="form-control" :class="{ 'is-invalid': form.errors.has('product') }">
								<option value="" disabled>Select Product</option>
								<option v-for="p in products.data" :key="p.id" :value="p.product">
									{{ p.product }} - ₱{{ p.price }}
							<!-- <input type="text" v-model="form.patient" value="firstname"> -->
								</option>
								<has-error :form="form" field="product"></has-error>
							</select>
        				</div>
        				<div class="form-group">
        					<input v-model="form.amount" type="text" name="amount"
        					:placeholder="form.price"
        					class="form-control" :class="{ 'is-invalid': form.errors.has('amount') }">
        					<has-error :form="form" field="amount"></has-error>
        				</div>
        				<!-- <div class="form-group">
        					<input v-model="form.amount_paid" type="text" name="amount_paid"
        					placeholder="Amount Paid" 
        					class="form-control" :class="{ 'is-invalid': form.errors.has('amount_paid') }">
        					<has-error :form="form" field="amount_paid"></has-error>
        				</div>
        				<div class="form-group">
        					<input v-model="form.status" type="text" name="status"
        					placeholder="Status" 
        					class="form-control ucfirst" :class="{ 'is-invalid': form.errors.has('status') }">
        					<has-error :form="form" field="status"></has-error>
        				</div> -->
        			</div>
        			<div class="modal-footer">
        				<button type="button" class="btn btn-sm btn-grad-red" data-dismiss="modal">Cancel <i class="ion-close-round"></i></button>
        				<button v-show="editmode" type="submit" class="btn btn-grad-blue">Update <i class="ion-checkmark-round"></i></button>
        				<button v-show="!editmode" type="submit" class="btn btn-sm btn-grad-blue">Add <i class="ion-checkmark-round"></i></button>
        			</div>
        			</form>
        		</div>
				<notifications group="foo" position="bottom left" />
        	</div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
				patients: {},
				payments: {},
				products: {},
                editmode: false,
                form: new Form({
					id: '',
					patient_id: '',
					product: '',
					amount: '',
					amount_paid: '',
                })
            }
        },
        // mounted() {
		// 	console.log('Component mounted.')
		// 	this.showPatient();
		// 	this.showPayment();
        // },
        methods: {
			showProduct() {
                axios.get('/api/inventory').then(({ data }) => (this.products = data));
            },
			showPatient() {
                axios.get('/api/patient').then(({ data }) => (this.patients = data));
            },
            paymentModal() {
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            showPayment() {
				axios.get('/api/payment').then(({ data }) => (this.payments = data.data));
				// axios
				// .get('/api/payments')
				// .then((response) => {
				// 	this.payments = response.data;
				// });
            },
            // editProduct(product) {
            //     $('#edit').modal('show');
            //     this.form.fill(product);
            // },
            // updateProduct() {
            //     this.$Progress.start();
            //     this.form.put('/api/inventory/'+this.form.id)
            //     .then(() => {
            //         $('#edit').modal('hide');
            //         this.$notify({
            //         group: 'foo',
            //         type: 'success',
            //         title: 'SUCCESS',
            //         text: 'Product Updated Successfully.',
            //         })
            //         this.$Progress.finish();
            //         Fire.$emit('ProductCreated');
            //     })
            //     .catch(() => {
            //         this.$Progress.fail();
            //     })
			// },
			addPayment() {
				this.$Progress.start();
				this.form.post('/api/payment')
				.then(()=>{	
				Fire.$emit('PaymentCreated');
				$('#addNew').modal('hide');
					this.$notify({
					group: 'foo',
					type: 'success',
					title: 'SUCCESS',
					text: 'Payment Added.',
					});
				})
				.catch(()=>{
					this.$Progress.fail()
				})
			}
        },
        created() {
			this.showProduct();
			this.showPatient();
            this.showPayment();
            Fire.$on('PaymentCreated',() => {
			this.showPayment();
		    });
        }
    }
</script>
