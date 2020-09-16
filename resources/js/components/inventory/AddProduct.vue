<style scoped>
#preview {
  display: flex;
  justify-content: center;
  align-items: center;
}
#preview img {
  max-width: 100%;
  max-height: 300px;
}
</style>
<template>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success">
              <div class="card-header">
                <h5>Add Product</h5>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" @submit.prevent="addProduct()" enctype="multipart/form-data">
                <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                    <div class="form-group">
                        <label for="product">Product Name</label>
                        <input type="text" name="product" v-model="form.product" class="form-control"
                        :class="{ 'is-invalid': form.errors.has('product') }">
                        <has-error :form="form" field="product"></has-error>
                    </div>
                    </div>
                    <div class="col-md-3">
                        <label for="price">Price</label>
                    <!-- <div class="form-group">
                        <input type="text" name="middlename" v-model="form.middlename" class="form-control"
                        :class="{ 'is-invalid': form.errors.has('middlename') }">
                        <has-error :form="form" field="middlename"></has-error>
                    </div> -->
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                <i class="ion-ios-pricetag"></i>
                                </span>
                            </div>
                            <input type="text" 
                            v-model="form.price"
                            onkeypress='return event.charCode >= 48 && event.charCode <= 57' 
                            class="form-control"
                            :class="{ 'is-invalid': form.errors.has('price') }">
                            <has-error :form="form" field="price"></has-error>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" v-model="form.description" class="form-control" placeholder="Enter Product Description"
                        :class="{ 'is-invalid': form.errors.has('description') }">
                        <has-error :form="form" field="description"></has-error>
                        </textarea>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                      	<label for="image">Image</label>
                        <div class="form-group">
                          <div class="checkbox">
                            <label>
                              <input type="file" @change="imageProduct" ref="fileupload" name="image" class="form-input">
                            </label>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div id="preview">
                            <img v-if="url" :src="url" />
                        </div>
                    </div>
                </div>
            </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-lg btn-success mr-2">Create <i class="ion-ios-checkmark"></i></button>
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
                product: '',
                description: '',
                price: '',
                image: '',
                }),
                url: null
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            imageProduct(e)
            {
                this.image = e.target.files[0];
                this.url = URL.createObjectURL(this.image);
                let file = e.target.files[0];
                let reader = new FileReader();  
                
                if(file['size'] < 2111775) {
                    reader.onloadend = (file) => {
                     this.form.image = reader.result;
                    }              
                    reader.readAsDataURL(file);
                } else {
                    alert('File size can not be bigger than 2 MB')
                }
            },
            addProduct() {
                this.$Progress.start();
                this.form.post('/api/inventory', {image: this.form.image})
                .then(() => {
                Fire.$emit('ProductCreated')    
                this.$notify({
                group: 'foo',
                type: 'success',
                title: 'SUCCESS',
                text: 'Product Created Successfully.',
                });
                this.$Progress.finish();
                this.form.reset();
                this.$refs.fileupload.value=null;
                this.url = null;
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
