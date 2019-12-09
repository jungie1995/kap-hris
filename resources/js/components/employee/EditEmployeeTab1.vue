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
                        <div class="form-group col-md-3">
                            <label class="control-label">Firstname</label>
                            <input v-model="data.firstname" type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">Middlename</label>
                            <input v-model="data.middlename" type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">Lastname</label>
                            <input v-model="data.lastname" type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-1">
                            <label class="control-label">Sufix</label>
                            <input v-model="data.presuf" type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="control-label">Gender</label>
                            <select v-model="data.gender" class="form-control custom-select">
                                <option value="">-- Select Gender --</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label">Status of Appointment</label>
                            <br>
                            <select v-model="data.status" class="form-control custom-select">
                                <option value="">-- Select Appointment --</option>
                                 <option 
                                v-for="appointment in appointmentList" 
                                v-bind:value="appointment.appointment_id"
                                :selected="employeedata.appointment == appointment.appointment_id "
                                >{{appointment.appointment_name}}
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Office</label>
                            <br>
                            <select v-model="data.office" class="form-control custom-select">
                                <option value="">-- Select Office --</option>
                                <option v-for="office in officeList" 
                                v-bind:value="office.office_id" 
                                :selected="(employeedata.office == office.office_id)">{{office.office_name}}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Civil Status</label>
                            <br>
                            <select v-model="data.civilstatus" class="form-control custom-select">
                                <option value="">-- Select Civil Status --</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Separated">Separated</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                     <div class="row">
                        <div class="form-group col-md-8">
                            <label class="control-label">Place of Birth</label>
                            <input v-model="data.placeofbirth" type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Date of Birth</label>
                            <input v-model="data.birthday" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label">Telephone No.</label>
                            <input v-model="data.telephone" type="text" class="form-control" placeholder="e.g 12345678">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Mobile No.</label>
                            <input v-model="data.mobileno" type="text" class="form-control" placeholder="e.g 09xxxxxxxxx">
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
                            <input v-model="data.bloodtype" type="text" class="form-control" placeholder="e.g B">
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
                        <div class="form-group col-md-4">
                            <label class="control-label">SSS NO.</label>
                            <input v-model="data.sss" type="text" class="form-control" placeholder="e.g 123456789">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">TIN NO.</label>
                            <input v-model="data.tin" type="text" class="form-control" placeholder="e.g 123456789">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">AGENCY NO.</label>
                            <input v-model="data.agency_no" type="text" class="form-control" placeholder="e.g 123456789">
                        </div>
                    </div>
                    <h4>Address</h4>
                    <hr>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label">Province</label>
                            <br>
                            <select v-model="data.provsta" class="form-control custom-select " v-on:change="selectedProvince()">
                                <option value="">-- Select Province --</option>
                                <option v-for="province in provinceList" v-bind:value="province.province_id">{{province.name}}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">City/Municipality</label>
                            <br>
                            <select v-model="data.muncit" class="form-control custom-select " v-on:change="selectedCities()">
                                <option value="">-- Select City/Municipality --</option>
                                <option v-for="municipality in municipalityList" v-bind:value="municipality.city_id"
                                :selected="(data.cities == municipality.city_id)"
                                
                                >{{municipality.name}}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Barangay</label>
                            <br>
                            <select v-model="data.barangay" class="form-control custom-select ">
                                <option value="">-- Select Barangay --</option>
                                <option v-for="barangay in barangayList" v-bind:value="barangay.code">{{barangay.name}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label">Prk/Lot/Blk</label>
                            <input v-model="data.prklotblk" type="text" class="form-control" placeholder="e.g 123456789">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">Street</label>
                            <input v-model="data.street" type="text" class="form-control" placeholder="e.g sample.st">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">Subdivision</label>
                            <input v-model="data.strsub" type="text" class="form-control" placeholder="e.g villa">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="control-label">Zip Code</label>
                            <input v-model="data.zipcode" type="text" class="form-control" placeholder="e.g 8110">
                        </div>
                    </div>
                    <div class="pull-right">
                        <b-button variant="default"><router-link :to="{name: 'viewemployee', params: {id: this.$route.params.id}}">Cancel</router-link></b-button>	
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
			data:{},
			address: {
				province : '',
				cities : '',
				barangay : '',
				prk:'',
				street:'',
				subd:'',
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
                _this.employeedata = response.data[0];
                _this.data = response.data[0];
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
                if (_this.data.provsta != '') {
                    _this.PreviousProvinceData(_this.data.provsta);
                }
			});
        },
        PreviousProvinceData(id){
			var _this = this;
			axios.get('/api/get-municipality-list/'+ id).then(function(response){
                _this.municipalityList = response.data;
                if (_this.data.muncit != '') {
                    _this.PreviousCityData(_this.data.muncit);
                }
			});
        },
        PreviousCityData(id){
			var _this = this;
			axios.get('/api/get-barangay-list/'+ id).then(function(response){
				_this.barangayList = response.data;
			});
		},
		selectedProvince(){
			var _this = this;
			var _id = _this.data.provsta;
			axios.get('/api/get-municipality-list/'+ _id).then(function(response){
				_this.municipalityList = response.data;
			});
		},
		selectedCities(){
			var _this = this;
			var _id = _this.data.muncit;
			axios.get('/api/get-barangay-list/'+ _id).then(function(response){
				_this.barangayList = response.data;
			});
		},
		updateData(){
            var _this = this;
            var _id = this.$route.params.id
            console.log(_this.data);
            axios.put('/api/update-employee-data',_this.data).then(function (response) {
                 if (response.data.EmployeeData.status=="Success") {
                    Vue.swal(
                        response.data.EmployeeData.header,
                        response.data.EmployeeData.name,
                        'success',
                    ).then(function(isConfirm) {
                       _this.$router.push('/view-employee/'+_id)
                    });
                }else if(response.data.EmployeeData.status=="Error"){
                    Vue.swal({
                    title: response.data.EmployeeData.header,
                    type: 'error'
                    });
                }else{
                    Vue.swal(
                        'Something went wrong!',
                        response,
                        'error'
                        )	
                }
            })
		},

	}
}
</script>

<style>

</style>