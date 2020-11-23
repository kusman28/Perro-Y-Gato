<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-5">
                <div class="row">
                  <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                      <span class="info-box-icon bg-info elevation-1"><i class="ion-ios-people"></i></span>

                      <div class="info-box-content">
                        <span class="info-box-text">New Patients</span>
                        <span class="info-box-number">
                            
                          13
                          <small>%</small>
                      </span>
                            
                    <a href="/listpatient">View All</a>
                  </div>
                  <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-teeth nav-icon"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Brace</span>
                <span class="info-box-number">
                12
              </span>
              <router-link to="/brace" class="small-box-footer">View Details
                  <i class="fas fa-chevron-right"></i>
                </router-link>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-tooth nav-icon"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Extraction</span>
            <span class="info-box-number">
              33
            </span>
              <router-link to="/extraction" class="small-box-footer">View Details
                  <i class="fas fa-chevron-right"></i>
                </router-link>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>
<!-- /.col -->
<div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-teeth-open nav-icon"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Denture</span>
        <span class="info-box-number">22</span>

          <router-link to="/denture" class="small-box-footer">View Details
                  <i class="fas fa-chevron-right"></i>
            </router-link>
    </div>
    <!-- /.info-box-content -->
</div>
<!-- /.info-box -->

</div>
</div>


<!-- /.col -->
</div>
</div>
</div>
</template>
<script>
export default {
    
}
</script>