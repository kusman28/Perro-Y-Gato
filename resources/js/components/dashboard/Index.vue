<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-5">
              <div class="row">
                    
              <div class="col-12 col-sm-6 col-md-3">
                  <router-link to="/patient/list" class="custom-card">

                      <div class="info-box blue-card">
                        <div class="info-box-content">
                          <span class="info-box-text">New Patient</span>
                          <h1>{{patient.length}}</h1>
                            <!-- <small>%</small> -->
                            </div>
                            <div class="icon">
                              <i class="fa ion-ios-people size-md mr-3"></i>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    <!-- /.info-box -->
                  </router-link>
              </div>

              <div class="col-12 col-sm-6 col-md-3">
                  <router-link to="/product/list" class="custom-card">

                      <div class="info-box green-card">
                        <div class="info-box-content">
                          <span class="info-box-text">Total Product</span>
                          <h1>{{inventory.length}}</h1>
                            <!-- <small>%</small> -->
                            </div>
                            <div class="icon">
                              <i class="fa ion-ios-filing size-md mr-3"></i>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    <!-- /.info-box -->
                  </router-link>
              </div>

              <div class="col-12 col-sm-6 col-md-3">
                  <router-link to="/payment" class="custom-card">

                      <div class="info-box red-card">
                        <div class="info-box-content">
                          <span class="info-box-text">Total Sales</span>
                          <h1>₱ {{sales.totalsales}}</h1>
                            <!-- <small>%</small> -->
                            </div>
                            <div class="icon">
                              <i class="fa ion-ios-cart size-md mr-3"></i>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                    <!-- /.info-box -->
                  </router-link>
              </div>

          <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>
</div>
<!-- /.col -->
</div>
</div>
</div>
</template>
<script>
export default {
    data() {
      return {
        patient: {},
        inventory: {},
        sales: {}
      }
    },
    methods: {
      api() {
        axios.get('api/newpatient').then(({data}) => (this.patient = data.data));
        axios.get('api/totalproduct').then(({data}) => (this.inventory = data.data));
        axios.get('api/totalsales').then(({data}) => (this.sales = data));
      }
    },
    created() {
      this.api();
    }
}
</script>