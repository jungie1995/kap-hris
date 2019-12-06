<template>
  <div>
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Edit Employee tab 1</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><router-link :to="{ name: 'dashboard' }"><span class="hide-menu">Dashboard</span></router-link></li>
                        <li class="breadcrumb-item"><router-link :to="{ name: 'employee' }"><span class="hide-menu">Eployees</span></router-link></li>
                        <li class="breadcrumb-item active">Edit Employee tab 1</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                    <h4>Personal Information</h4>
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label">Status of Appointment</label>
                            <br>
                            <select v-model="data.appointment" class="form-control custom-select">
                                 <option 
                                v-for="appointment in appointmentList" 
                                v-bind:value="appointment.appointment_id"
                                :selected="employeedata.status === appointment.appointment_id "
                                >{{appointment.appointment_name}}
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Office</label>
                            <br>
                            <select v-model="data.office" class="form-control custom-select">
                                <option value="">-- Select Office --</option>
                                <option v-for="office in officeList" v-bind:value="office.office_id" :selected="(employeedata.office == office.office_id)">{{office.office_name}}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Civil Status</label>
                            <br>
                            <select v-model="data.status" class="form-control custom-select">
                                <option value="">-- Select Civil Status --</option>
                                <option value="1">Single</option>
                                <option value="2">Bitter</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label">Telephone No.</label>
                            <input v-model="data.telephone" type="text" class="form-control" placeholder="e.g 12345678">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Mobile No.</label>
                            <input v-model="data.mobile" type="text" class="form-control" placeholder="e.g 09xxxxxxxxx">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Email</label>
                            <input v-model="data.email" type="email" class="form-control" placeholder="e.g example@email.com">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label">Height (m)</label>
                            <input v-model="data.height" type="text" class="form-control" placeholder="e.g 1.72">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Weight (kg)</label>
                            <input v-model="data.weight" type="text" class="form-control" placeholder="e.g 65">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Blood Type</label>
                            <input v-model="data.blood" type="text" class="form-control" placeholder="e.g B">
                        </div>
                    </div>
                    <h4>Government ID's</h4>
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label">GSIS ID</label>
                            <input v-model="data.gsis" type="text" class="form-control" placeholder="e.g 123456789">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">PAG-IBIG ID</label>
                            <input v-model="data.pagibig" type="text" class="form-control" placeholder="e.g 123456789">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">PHILHEALTH NO.</label>
                            <input v-model="data.philhealth" type="text" class="form-control" placeholder="e.g 123456789">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">SSS NO.</label>
                            <input v-model="data.sss" type="text" class="form-control" placeholder="e.g 123456789">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">TIN NO.</label>
                            <input v-model="data.tin" type="text" class="form-control" placeholder="e.g 123456789">
                        </div>
                    </div>
                    <h4>Address</h4>
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label">Province</label>
                            <br>
                            <select v-model="address.province" class="form-control custom-select select2" v-on:change="selectedProvince()">
                                <option value="">-- Select Province --</option>
                                <option v-for="province in provinceList" v-bind:value="province.province_id">{{province.name}}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">City/Municipality</label>
                            <br>
                            <select v-model="address.cities" class="form-control custom-select select2" v-on:change="selectedCities()">
                                <option value="">-- Select City/Municipality --</option>
                                <option v-for="municipality in municipalityList" v-bind:value="municipality.city_id">{{municipality.name}}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Barangay</label>
                            <br>
                            <select v-model="address.barangay" class="form-control custom-select select2">
                                <option value="">-- Select Barangay --</option>
                                <option v-for="barangay in barangayList" v-bind:value="barangay.code">{{barangay.name}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label">Prk/St/Blk</label>
                            <input v-model="address.prk" type="text" class="form-control" placeholder="e.g 123456789">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Zip Code</label>
                            <input v-model="address.zip" type="text" class="form-control" placeholder="e.g 8110">
                        </div>
                    </div>
                    <div class="pull-right">
                        <b-button variant="default" v-on:click="$bvModal.hide('editOne')">Cancel</b-button>	
                        <b-button variant="danger" v-on:click="updateData()">Update</b-button>
                    </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->


        
  </div>
</template>

<script>
export default {
    data() {
		return{
			employeedata:[],
			appointmentList:[],
			officeList:[],
			provinceList:[],
			municipalityList:[],
			barangayList:[],
			data:{
				appointment: null,
				office:'',
				status:'',
				telephone:'',
				mobile:'',
				email:'',
				height:'',
				weight:'',
				blood:'',
				gsis:'',
				pagibig:'',
				philhealth:'',
				sss:'',
				tin:''
			},
			address: {
				province : '',
				cities : '',
				barangay : '',
				prk:'',
				zip:''
			}
		}
    },
    mounted() {
		this.employeeData();
		this.getAppointment();
		this.getOffices();
		this.getProvince();
    },
    methods: {
		employeeData(){
			var _this = this;
            var _id = this.$route.params.id
            console.log(_id);
			axios.get('/api/view-employee/' + _id).then(function(response){
				console.log(response.data[0].appointment_name);
				_this.data.appointment = response.data[0].appointment_name;
			});
		},
		getAppointment(){
			var _this = this;
			axios.get('/api/get-appointment-list').then(function(response){
				_this.appointmentList = response.data;
			});
		},
		getOffices(){
			var _this = this;
			axios.get('/api/get-office-list').then(function(response){
				_this.officeList = response.data;
			});
		},
		getProvince(){
			var _this = this;
			axios.get('/api/get-province-list').then(function(response){
				_this.provinceList = response.data;
			});
		},
		selectedProvince(){
			var _this = this;
			var _id = _this.address.province;
			axios.get('/api/get-municipality-list/'+ _id).then(function(response){
				_this.municipalityList = response.data;
			});
		},
		selectedCities(){
			var _this = this;
			var _id = _this.address.cities;
			axios.get('/api/get-barangay-list/'+ _id).then(function(response){
				_this.barangayList = response.data;
			});
		},
		updateData(){
			var _this = this;
			console.log(_this.address);
			console.log(_this.data);
		},

	}
}
</script>

<style>

</style>