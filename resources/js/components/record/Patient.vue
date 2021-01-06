<template>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <button @click="petModal" class="btn btn-sm btn-grad-blue mb-2">Add New Pet</button>
                <div class="card card-info">
                    <div class="card-header">
                        <h5>{{payment.firstname}} {{payment.middlename}} {{payment.lastname}}</h5>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
								<tr>
									<th>Pet Name</th>
									<th>Pet Type</th>
									<th>Date Added</th>
								</tr>
							</thead>
                            <tbody>
								<tr v-for="p in pet.pet" :key="p.id">
                                    <td>{{p.pet_name}}</td>
                                    <td>{{p.pet_type}}</td>
                                    <td>{{p.created_at}}</td>
								</tr>
							</tbody>
                        </table>
                    </div>
                </div>
            <!-- <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{payment.firstname}} {{payment.middlename}} {{payment.lastname}}</h3>
              </div>
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
                </div> -->
            </div>

            <div class="col-md-8">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h5>Payment</h5>
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

        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
        	<div class="modal-dialog modal-dialog-centered" role="document">
        		<div class="modal-content">
        			<div class="modal-header">
        				<h6 class="modal-title" id="addNewLabel">ADD PET</h6>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        					<span aria-hidden="true">&times;</span>
        				</button>
        			</div>
        			<form @submit.prevent="addPet()">
        			<div class="modal-body">
                        <input type="hidden" v-model="form.patient_id">
        				<div class="form-group">
                            <label>Pet Name</label>
        					<input type="text" name="pet_name" v-model="form.pet_name" class="form-control"
                            :class="{ 'is-invalid': form.errors.has('pet_name') }">
                            <has-error :form="form" field="pet_name"></has-error>
        				</div>
        				<div class="form-group">
                            <label>Pet Type</label>
        					<select name="pet_type" id="pet_type" v-model="form.pet_type" class="form-control"
                            :class="{ 'is-invalid': form.errors.has('pet_type') }">
                            <option>Select</option>
                            <option value="Perro">Perro (Dog)</option>
                            <option value="Gato">Gato (Cat)</option>
                            </select>
                            <has-error :form="form" field="pet_type"></has-error>
        				</div>
        				<div class="form-group">
                            <label for="pet_note">Pet's Note</label>
        					<textarea name="pet_note" v-model="form.pet_note" class="form-control" placeholder="Pet's Note"
                            :class="{ 'is-invalid': form.errors.has('pet_note') }">
                            <has-error :form="form" field="pet_note"></has-error>
                            </textarea>
        				</div>
        			</div>
        			<div class="modal-footer">
        				<button type="button" class="btn btn-sm btn-grad-red" data-dismiss="modal">Cancel <i class="ion-close-round"></i></button>
        				<button type="submit" class="btn btn-sm btn-grad-blue">Add <i class="ion-checkmark-round"></i></button>
        			</div>
        			</form>
        		</div>
                <notifications group="foo" position="bottom left" />
        	</div>
        </div>

        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            payment: {},
            pet: {},
            form: new Form({
                id: '',
                patient_id: '',
                pet_name: '',
                pet_type: '',
                pet_note: ''
            })
        }
    },
    mounted() {
		this.id = this.$route.params.id;
        this.patientRecords();
        this.patientPetRecords();
    },
    methods: {
        patientRecords()
		{
			axios.get('/api/payment/'+this.id)
			.then(({ data }) => (this.payment = data));
        },
        patientPetRecords()
		{
			axios.get('/api/pet/'+this.id)
			.then(({ data }) => (this.pet = data));
        },
        addPet() {
            this.$Progress.start();
            this.form.post('/api/pet')
            .then(()=>{	
            Fire.$emit('PetCreated');
            $('#addNew').modal('hide');
                this.$notify({
                group: 'foo',
                type: 'success',
                title: 'SUCCESS',
                text: 'Pet Added.',
                });
            })
            .catch(()=>{
                this.$Progress.fail()
            })
        },
        petModal() {
            this.editmode = false;
            this.form.reset();
            this.form.patient_id = this.payment.id
            $('#addNew').modal('show');
        },
    },
    created() {
        Fire.$on('PetCreated',() => {
            this.patientPetRecords();
        });
    }
}
</script>