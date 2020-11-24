<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-5">
              <div class="row">
                    
              <div class="col-12 col-sm-6 col-md-3">
                  <a href="/listpatient" class="custom-card">

                      <div class="info-box blue-card">
                        <div class="info-box-content">
                          <span class="info-box-text">New Patient</span>
                          <h2>{{patient.length}}</h2>
                            <!-- <small>%</small> -->
                            </div>
                            <i class="ion-ios-people size-md mr-3"></i>
                            <!-- /.info-box-content -->
                        </div>
                    <!-- /.info-box -->
                  </a>
              </div>

              <div class="col-12 col-sm-6 col-md-3">
                  <a href="/listproduct" class="custom-card">

                      <div class="info-box green-card">
                        <div class="info-box-content">
                          <span class="info-box-text">Total Product</span>
                          <h2>{{inventory.length}}</h2>
                            <!-- <small>%</small> -->
                            </div>
                            <i class="ion-ios-filing size-md mr-3"></i>
                            <!-- /.info-box-content -->
                        </div>
                    <!-- /.info-box -->
                  </a>
              </div>

              <div class="col-12 col-sm-6 col-md-3">
                  <a href="/payment" class="custom-card">

                      <div class="info-box red-card">
                        <div class="info-box-content">
                          <span class="info-box-text">Total Sales</span>
                          <h2>₱ {{sales.totalsales}}</h2>
                            <!-- <small>%</small> -->
                            </div>
                            <i class="ion-ios-cart size-md mr-3"></i>
                            <!-- /.info-box-content -->
                        </div>
                    <!-- /.info-box -->
                  </a>
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