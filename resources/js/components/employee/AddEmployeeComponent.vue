<template>
<div>
	 <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Add Employee</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><router-link :to="{ name: 'dashboard' }"><span class="hide-menu">Dashboard</span></router-link></li>
                        <li class="breadcrumb-item active">Add Employee</li>
                    </ol>
                </div>
            </div>
        </div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="form-body">
						<form @submit.prevent="addEmployee">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="control-label">Generated ID Number</label>
										<input v-model="formData.bio_num" type="text" class="form-control">
										<label class="text-danger">Present this number to IMIS for Biometric Registration.</label>
									</div>
									<div class="row">
										<div class="form-group col-md-6">
											<label class="control-label">First Name</label>
											<input v-model="formData.firstname" type="text" id="firstName" class="form-control" placeholder="First Name" required>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label">Middle Name</label>
											<input v-model="formData.middlename" type="text" id="middleName" class="form-control" placeholder="Middle Name" required>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-6">
											<label class="control-label">Last Name</label>
											<input v-model="formData.lastname" type="text" id="lastName" class="form-control" placeholder="Last Name" required>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label">Prefix/Suffix</label>
											<select v-model="formData.presuf" class="form-control">
												<option value="">-- Select Prefix/Suffix --</option>
												<option value="JR">Junior</option>
												<option value="SR">Senior</option>
											</select>
											<label class="text-danger">Leave if none.</label>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="row">
										<div class="form-group col-md-6">
											<label class="control-label">Gender</label>
											<select v-model="formData.gender" class="form-control" required>
												<option value="">-- Select Gender --</option>
												<option value="M">Male</option>
												<option value="F">Female</option>
											</select>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label">Date of Appointment</label>
											<input v-model="formData.dateofappoint" type="date" class="form-control" placeholder="mm-dd-yyyy">
											<label class="text-danger">In this Format mm/dd/yyyy</label>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-12">
											<label class="control-label">Status of Appointment</label>
											<br>
											<select v-model="formData.status" class="form-control custom-select select2" required>
												<option value="">-- Select Status of Appointment --</option>
												<option v-for="item in appointmentlist" v-bind:value="item.appointment_id">{{item.appointment_name}}</option>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-12">
											<label class="control-label">Office</label>
											<br>
											<select v-model="formData.office" class="form-control custom-select select2" required>
												<option value="">-- Select Office --</option>
												<option v-for="item in officelist" v-bind:value="item.office_id">{{item.office_name}}</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
									<div class="form-actions float-right">
										<button type="submit" class="btn btn-danger"><i class="fa fa-plus"></i> Add Employee</button>
									</div>
								</div>
							</div>
						</form>  
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</template>

<script>
export default {
	data(){
		return {
			formData: {
				bio_num : '',
				firstname: '',
				middlename: '',
				lastname: '',
				presuf: '',
				gender: '',
				dateofappoint: '',
				status: '',
				office: ''
			},
			appointmentlist : [],
			officelist : []
		} 
	},
	mounted() {
		this.generateIdNumber();
		this.getAppointment();
		this.getOffices();
		// console.log('Add Employee Component mounted.');
	},
	methods: {
		generateIdNumber(){
			var _this = this;
			axios.get('/api/generate-idnumber').then(function(response){
				_this.formData.bio_num = response.data;
			});
		},
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
		addEmployee(){

			var _this = this;

			Vue.swal({
				title: 'Are you sure?',
				text: "You want to Add this employee?",
				type: 'warning',
				showCancelButton: true,
				confirmButtonText: 'Yes',
				cancelButtonText: 'Cancel',
				reverseButtons: true
			}).then((result) => {
				if (result.value) {
					axios.post('/api/add-employee',_this.formData).then(function(response){
						if (response.statusText="OK") {
							Vue.swal(
								response.data.employeedata.header,
								response.data.employeedata.name,
								'success'
								)
						}
						else{
							Vue.swal(
								'Something went wrong!',
								response,
								'error'
								)	
						}
					});
				}
			})
		}
	}
}
</script>
