<template>
	<div class="container">
		<!-- Main content -->
        
        <!-- Timelime example  -->
        <div class="row">
          <div class="col-md-8">
		<h3 class="card-title mt-4">Activity</h3>

            <!-- The time line -->
            <ul class="timeline" v-for="activity in activities" :key="activity.id">

    <!-- timeline time label -->
    <li class="time-label">
        <span class="bg-success">
            {{activity.updated_at | myDate}}
        </span>
    </li>
    <!-- /.timeline-label -->

    <!-- timeline item -->
            <li>
                <!-- timeline icon -->
                <!-- <i class="fa fa-history"></i> -->
                <div class="timeline-item">
                    <!-- <span class="time text-primary"><i class="fa fa-clock-o"></i> {{activity.created_at}}</span> -->
                    <h3 class="timeline-header"><a href="#">{{activity.description.toUpperCase()}} {{activity.log_name}}</a></h3>
                    <div class="timeline-body"  v-if="activity.log_name == 'Product'">
                        Name: <b>{{activity.properties.attributes.product}}</b> <br>
                        Price: <b>{{activity.properties.attributes.price}}</b>
                        
                    </div>
                    <div class="timeline-body"  v-if="activity.log_name == 'Patient'">
                        Name: <b>{{activity.properties.attributes.firstname}} {{activity.properties.attributes.middlename}} {{activity.properties.attributes.lastname}}</b>
                    </div>
                    <div class="timeline-body"  v-if="activity.log_name == 'Payment'">
                        Name: <b>{{activity.properties.attributes.product}}</b><br>
                        Amount Paid: <b>{{activity.properties.attributes.amount_paid}}</b>
                    </div>

                    <!-- <div class="timeline-footer">
                        <router-link v-bind:to="/hajjDocumentsDetails/+activity.subject_id" class="btn btn-primary btn-sm">View Details</router-link>
                    </div> -->
                </div>
                <!-- <i class="fa fa-clock bg-info"></i> -->
            </li>
            <br>
            <!-- END timeline item -->

        </ul>
          </div>
          <!-- /.col -->
        </div>
      <!-- /.timeline -->
	</div>
</template>

<script>
	export default {
        data (){
            return {
                activities: {},
            }
        },
        created(){
            // this.load();
			axios.get('/api/activities').then(response => {
				this.activities = response.data;
			})
		}
	}
</script>