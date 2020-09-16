<template>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
              <div class="card-header">
                <h5>Add Patient</h5>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" @submit.prevent="addPatient()" role="form">
                <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                    <div class="form-group">
                        <label for="firstname">Firstname</label>
                        <input type="text" name="firstname" v-model="form.firstname" class="form-control"
                        :class="{ 'is-invalid': form.errors.has('firstname') }">
                        <has-error :form="form" field="firstname"></has-error>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                        <label for="middlename">Middlename</label>
                        <input type="text" name="middlename" v-model="form.middlename" class="form-control"
                        :class="{ 'is-invalid': form.errors.has('middlename') }">
                        <has-error :form="form" field="middlename"></has-error>
                    </div>
                    </div>
                    <div class="col-md-3">
                    <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input type="text" name="lastname" v-model="form.lastname" class="form-control"
                        :class="{ 'is-invalid': form.errors.has('lastname') }">
                        <has-error :form="form" field="lastname"></has-error>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                    <div class="form-group">
                        <label for="Age">Age</label>
                        <input type="text" name="age" v-model="form.age" class="form-control"
                        :class="{ 'is-invalid': form.errors.has('age') }">
                        <has-error :form="form" field="age"></has-error>
                    </div>
                    </div>
                    <div class="col-md-5">
                    <div class="form-group">
                        <label for="contact_no">Contact No.</label>
                        <input type="text" name="contact_no" v-model="form.contact_no" class="form-control"
                        :class="{ 'is-invalid': form.errors.has('contact_no') }">
                        <has-error :form="form" field="contact_no"></has-error>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" v-model="form.address" class="form-control" placeholder="Enter Permanent Address"
                        :class="{ 'is-invalid': form.errors.has('address') }">
                        <has-error :form="form" field="address"></has-error>
                        </textarea>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="pet_name">Pet Name</label>
                            <input type="text" name="pet_name" v-model="form.pet_name" class="form-control"
                            :class="{ 'is-invalid': form.errors.has('pet_name') }">
                            <has-error :form="form" field="pet_name"></has-error>
                        </div>
                    </div>
                    <div class="col-md-4">
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="pet_note">Notes</label>
                            <textarea name="pet_note" v-model="form.pet_note" class="form-control" placeholder="Pet's Note"
                            :class="{ 'is-invalid': form.errors.has('pet_note') }">
                            <has-error :form="form" field="pet_note"></has-error>
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-lg btn-primary mr-2">Create <i class="ion-ios-checkmark"></i></button>
                  <a href="/dashboard" class="btn btn-lg btn-outline-danger">Cancel <i class="ion-ios-close"></i></a>
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
                form: new Form({
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
            addPatient() {
                this.$Progress.start();
                this.form.post('/api/patient')
                .then(() => {
                Fire.$emit('PatientCreated')    
                this.$notify({
                group: 'foo',
                type: 'success',
                title: 'SUCCESS',
                text: 'Patient Created Successfully.',
                });
                this.$Progress.finish();
                this.form.reset();
                })
                .catch(() => {
                    this.$Progress.fail();
                })
                // axios.post('/api/patient', {
                //     firstname: this.form.firstname, 
                //     middlename: this.form.middlename,
                //     lastname: this.form.lastname,
                //     age: this.form.age,
                //     contact_no: this.form.contact_no,
                //     address: this.form.address,
                //     pet_name: this.form.pet_name,
                //     pet_type: this.form.pet_type,
                //     pet_note: this.form.pet_note,
                //     });
                // alert('test');
            }
        }
    }
</script>
