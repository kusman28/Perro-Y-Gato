<template>
    
	<div class="container">
		<div class="row">
			<div class="col-md-10 mt-4">
            <div class="card">
              <div class="card-header p-3">
                SETTINGS
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <!-- /.tab-pane -->

                  <div class="tab-pane active" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>

                        <div class="col-md-8">
                          <input type="text" v-model="form.name" class="form-control" id="inputName" placeholder="Name" :class="{ 'is-invalid': form.errors.has('name') }">
                          <has-error :form="form" field="name"></has-error>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                        <div class="col-md-8">
                          <input type="email" v-model="form.email" class="form-control" id="inputEmail" placeholder="Email" :class="{ 'is-invalid': form.errors.has('email') }">
                          <has-error :form="form" field="email"></has-error>
                        </div>
                      </div>
                    
                      <div class="form-group">
                        <label for="inputPassword" class="col-sm-2 control-label">Password</label>
						  <div class="input-group col-md-8">
							<input type="password" v-model="form.password" class="form-control" v-show="!showPass" placeholder="Password" :class="{ 'is-invalid': form.errors.has('password') }">	
                          <input type="text" v-model="form.password" class="form-control" v-show="showPass" placeholder="Password" :class="{ 'is-invalid': form.errors.has('password') }">	
			
						          <has-error :form="form" field="password"></has-error>
                      <span class="input-group-append">
                        <button class="btn btn-primary" @click.prevent="showPass = !showPass"><span v-show="!showPass">Show</span><span v-show="showPass">Hide</span></button>
                      </span>
                      </div>
                      </div>
					  
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button @click.prevent="updateInfo" type="submit" class="btn btn-grad-green">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
            <notifications group="foo" position="bottom left" />
          </div>
		</div>
	</div>
</template>
<script>
export default {
    data() {
        return {
            showPass: false,
            form: new Form({
                id: '',
				name: '',
				email: '',
				password: '',
            })
        }
    },
    methods: {
        updateInfo()
		{
			this.$Progress.start();
			this.form.put('api/profile')
			.then(() => {
				//Fire.$emit('AfterCreate');
                this.$notify({
                group: 'foo',
                type: 'success',
                title: 'SUCCESS',
                text: 'User Updated.',
                });
				this.$Progress.finish();
			})
			.catch(() => {
				this.$Progress.fail();
			});
		},
    },
    created() {
        axios.get('api/profile')
		.then(({ data }) => (this.form.fill(data)));
    }
}
</script>