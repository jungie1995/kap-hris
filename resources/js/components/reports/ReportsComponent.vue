<template>
 <div>
   <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Reports</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><router-link :to="{ name: 'dashboard' }"><span class="hide-menu">Dashboard</span></router-link></li>
                        <li class="breadcrumb-item active">Reports</li>
                    </ol>
                </div>
            </div>
        </div>



    <div class="row">
        <div class="col-md-3">
            <b-card >
                   <div class="row">
                        <div class="card-title">
                            <h4 class="font-weight-bold">Print by Birthday</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <select v-model="formData.birth_num" class="form-control custom-select" required>
                                <option v-bind:value="null">-- Select Month --</option>
                                <option v-bind:value="1">January</option>
                                <option v-bind:value="2">February</option>
                                <option v-bind:value="3">March</option>
                                <option v-bind:value="4">April</option>
                                <option v-bind:value="5">May</option>
                                <option v-bind:value="6">June</option>
                                <option v-bind:value="7">July</option>
                                <option v-bind:value="8">August</option>
                                <option v-bind:value="9">September</option>
                                <option v-bind:value="10">October</option>
                                <option v-bind:value="11">November</option>
                                <option v-bind:value="12">December</option>
                            </select>
                        </div>
                    </div>
                        <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-actions float-right">
								<button type="submit" class="btn btn-primary" @click="PrintReport(formData.birth_num, 'birthmonth')"><i class="fa fa-print"></i> Print</button>
                            </div>
                        </div>
                    </div>
            </b-card>
        </div>
        <div class="col-md-3">
            <b-card >
                   <div class="row">
                        <div class="card-title">
                            <h4 class="font-weight-bold">Print by Gender</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <select v-model="formData.gender_num" class="form-control custom-select" required>
                                <option v-bind:value="null">-- Select Gender --</option>
                                <option v-bind:value="'M'">Male</option>
                                <option v-bind:value="'F'">Female</option>
                            </select>
                        </div>
                    </div>
                        <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-actions float-right">
								<button type="submit" class="btn btn-primary" @click="PrintReport(formData.gender_num, 'gender')"><i class="fa fa-print"></i> Print</button>
                            </div>
                        </div>
                    </div>
            </b-card>
        </div>
        <div class="col-md-3">
            <b-card >
                   <div class="row">
                        <div class="card-title">
                            <h4 class="font-weight-bold">Print by Appointment</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <select v-model="formData.app_name" class="form-control custom-select" required>
                                <option v-bind:value="null">-Select Appointment-</option>
                                <option v-for="item in appointmentlist" v-bind:value="item.appointment_name">{{item.appointment_name}}</option>
                            </select>
                        </div>
                    </div>
                        <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-actions float-right">
									<button type="submit" class="btn btn-primary" @click="PrintReport(formData.app_name, 'appointment')"><i class="fa fa-print"></i> Print</button>
                            </div>
                        </div>
                    </div>
            </b-card>
        </div>
        <div class="col-md-3">
            <b-card >
                   <div class="row">
                        <div class="card-title">
                            <h4 class="font-weight-bold">Print by Office</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <select v-model="formData.office_name"  name="app_id" class=" form-control custom-select" required>
                                <option v-bind:value="null">-- Select Office --</option>
								<option v-for="item in officelist" v-bind:value="item.office_name">{{item.office_name}}</option>
                            </select>
                        </div>
                    </div>
                        <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-actions float-right">
								<button type="submit" class="btn btn-primary" @click="PrintReport(formData.office_name, 'office')"><i class="fa fa-print"></i> Print</button>
                            </div>
                        </div>
                    </div>
            </b-card>
        </div>
    </div>
      
</div>


</template>

<script>
export default {
    data() {
      return {
        
        formData:{
            birth_num: null,
            gender_num: null,
            app_name: null,
            office_name: null,
        },
        appointmentlist : [],
		officelist : []

      }
      
    },
    mounted() {
        this.getAppointment();
		this.getOffices();
        
    },
    methods: {
        getAppointment(){
			var _this = this;
			axios.get('/api/get-appointment-list').then(function(response){
				_this.appointmentlist = response.data;
			});
        },
        getOffices(){
			var _this = this;
			axios.get('/api/get-office-list').then(function(response){
				_this.officelist = response.data;
			});
        },
        PrintReport(name, report){
            if(name != null){
				window.open(`${'http://localhost:8000/api/printby-'+ report + '/'+name}`, '_blank');
				return true;
			}else{
				Vue.swal({
					title: 'Something went Wrong!',
					text: 'Please Select '+ report,
					type: 'error'
				});
			}
        }
    }
}
</script>
