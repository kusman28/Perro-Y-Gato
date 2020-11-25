<style scoped>
.product img {
    height: 80px;
}
</style>
<template>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header p-3">
                        LIST OF PRODUCT
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
								<tr>
									<th>Product ID</th>
									<th>Image</th>
									<th>Name</th>
									<th>Description</th>
									<th>Price</th>
									<!-- <th>Action</th> -->
								</tr>
							</thead>
                            <tbody>
								<tr v-for="product in inventory.data" :key="product.id">
									<td>{{product.id}}</td>
									<td>
                                        <div class="product">
                                        <img class="img-thumbnail" :src="'/images/'+product.image">
                                        </div>
                                    </td>
									<td>{{product.product}}</td>
									<td>{{product.description}}</td>
									<td>P {{product.price}}</td>
			                      <td>
			                      	<!-- <a href="#" class="btn btn-primary btn-sm" @click="editProduct(product)">View
			                      		<i class="fas fa-edit"></i>
			                      	</a> -->
			                      </td>
								</tr>
							</tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
        	<div class="modal-dialog modal-dialog-centered" role="document">
        		<div class="modal-content">
                    <div class="card card-primary">
                        <div class="card-header">
                        <h5 class="modal-title">Edit Product</h5>
                        </div>
                    </div>
        			<!-- <div class="modal-header">
        				<h5 class="modal-title" id="addNewLabel">Edit Patient</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        					<span aria-hidden="true">&times;</span>
        				</button>
        			</div> -->
        			<form @submit.prevent="updateProduct">
        			<div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                <input v-model="form.firstname" type="text" name="firstname"
                                placeholder="Firstname" 
                                class="form-control" :class="{ 'is-invalid': form.errors.has('firstname') }">
                                <has-error :form="form" field="firstname"></has-error>
                                </div>
                            </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <input v-model="form.middlename" type="text" name="middlename"
                                    placeholder="Middlename" 
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('middlename') }">
                                    <has-error :form="form" field="middlename"></has-error>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input v-model="form.lastname" type="text" name="lastname"
                                    placeholder="Lastname" 
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('lastname') }">
                                    <has-error :form="form" field="lastname"></has-error>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input v-model="form.age" type="text" name="age"
                                    placeholder="Age" 
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('age') }">
                                    <has-error :form="form" field="age"></has-error>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input v-model="form.contact_no" type="text" name="contact_no"
                                    placeholder="Contact No." 
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('contact_no') }">
                                    <has-error :form="form" field="contact_no"></has-error>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <textarea name="address" v-model="form.address" class="form-control" placeholder="Enter Permanent Address"
                                    :class="{ 'is-invalid': form.errors.has('address') }">
                                    <has-error :form="form" field="address"></has-error>
                                    </textarea>
                                </div>
                            </div>
                        </div>
        				<div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="text" name="pet_name" v-model="form.pet_name" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('pet_name') }">
                                    <has-error :form="form" field="pet_name"></has-error>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <select name="pet_type" id="pet_type" v-model="form.pet_type" class="form-control"
                                    :class="{ 'is-invalid': form.errors.has('pet_type') }">
                                    <option>Select</option>
                                    <option value="Perro">Perro (Dog)</option>
                                    <option value="Gato">Gato (Cat)</option>
                                    </select>
                                    <has-error :form="form" field="pet_type"></has-error>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <textarea name="pet_note" v-model="form.pet_note" class="form-control" placeholder="Pet's Note"
                                    :class="{ 'is-invalid': form.errors.has('pet_note') }">
                                    <has-error :form="form" field="pet_note"></has-error>
                                    </textarea>
                                </div>
                            </div>
                        </div>
        			</div>
        			<div class="modal-footer">
        				<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel <i class="fas fa-times"></i></button>
        				<button type="submit" class="btn btn-primary">Update <i class="fas fa-check"></i></button>
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
                inventory: {},
                form: new Form({
                id: '',
                firstname: '',
                middlename: '',
                lastname: '',
                age: '',
                contact_no: '',
                address: '',
                pet_name: '',
                pet_type: '',
                pet_note: '',
                })
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            showProduct() {
                axios.get('/api/inventory').then(({ data }) => (this.inventory = data));
            },
            editProduct(product) {
                $('#edit').modal('show');
                this.form.fill(product);
            },
            updateProduct() {
                this.$Progress.start();
                this.form.put('/api/inventory/'+this.form.id)
                .then(() => {
                    $('#edit').modal('hide');
                    this.$notify({
                    group: 'foo',
                    type: 'success',
                    title: 'SUCCESS',
                    text: 'Product Updated Successfully.',
                    })
                    this.$Progress.finish();
                    Fire.$emit('ProductCreated');
                })
                .catch(() => {
                    this.$Progress.fail();
                })
            }
        },
        created() {
            this.showProduct();
            Fire.$on('ProductCreated',() => {
			this.showProduct();
		    });
        }
    }
</script>
