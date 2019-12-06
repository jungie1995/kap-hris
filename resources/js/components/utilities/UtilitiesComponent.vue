<template>
  <div>
     <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Utilities</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><router-link :to="{ name: 'dashboard' }"><span class="hide-menu">Dashboard</span></router-link></li>
                        <li class="breadcrumb-item active">Utilities</li>
                    </ol>
                </div>
            </div>
      </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs profile-tab" role="tablist">
            <li class="nav-item">
              <a
                class="nav-link active show"
                data-toggle="tab"
                href="#status"
                role="tab"
                aria-selected="true"
              >Status of Appointment</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                data-toggle="tab"
                href="#offices"
                role="tab"
                aria-selected="false"
              >Offices</a>
            </li>
            <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Settings</a> </li> -->
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane active show" id="status" role="tabpanel">
              <div class="card-body">
                <div class="row" style="margin-bottom: 25px;">
                  <div class="col-md-12">
                    <div class="form-actions float-right">
                      <b-button class="btn btn-danger" v-b-modal.modal-appointment @click="GenerateAppID()">
                        <i class="fa fa-plus"></i> Add Appointment
                      </b-button>
                    </div>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Appointment ID</th>
                        <th>Appointment Name</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="item in AppointmentDataList.data" :key="item.appointment_id">
                        <td>{{ item.appointment_id }}</td>
                        <td>{{ item.appointment_name }}</td>
                        <td>
											      <router-link :to="{name: 'editappointment', params: {id: item.appointment_id}}" class="btn btn-info"><i class="fa fa-edit"></i> Edit</router-link>
                        </td>
                      </tr>
                       
                    </tbody>
                        
                  </table>
                    <pagination :data="AppointmentDataList" @pagination-change-page="getAppointmentResults" style="margin-top: 10px;" class="float-right"></pagination>
                </div>
              </div>
            </div>
            <!--second tab-->
            <div class="tab-pane" id="offices" role="tabpanel">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-actions float-right">
                      <b-button class="btn btn-danger" v-b-modal.modal-office @click="GenerateOfficeID()">
                        <i class="fa fa-plus"></i> Add Office
                      </b-button>
                    </div>
                  </div>
                </div>
                <br />
                <div class="table-responsive">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Office ID</th>
                        <th>Office Name</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="item in OfficeDataList.data" :key="item.office_id">
                        <td>{{item.office_id}}</td>
                        <td>{{item.office_name}}</td>
                        <td>
                          <router-link :to="{name: 'editoffice', params: {id: item.office_id}}" class="btn btn-info"><i class="fa fa-edit"></i> Edit</router-link>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                    <pagination :data="OfficeDataList" @pagination-change-page="getOfficeResults" style="margin-top: 10px;" class="float-right"></pagination>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for Adding Appointment -->
    <b-modal
      id="modal-appointment"
      ref="modal"
      title="Add Appointment"
      @ok="handleOk"
    >
      <form ref="form" @submit.stop.prevent="SubmitAppointment">
        <label class="control-label">Appointment Name</label>
        <input type="hidden" v-model="appointmentForm.app_id" />
        <input
          id="app_title"
          name="appointment_name"
          v-model="appointmentForm.app_title"
          type="text"
          class="form-control"
          required
          placeholder="e.x Job Order, Honorarium , Casual, Permanent"
        />
        <label class="text-danger">Appointment ID Number : {{appointmentForm.app_id}}</label>
      </form>
    </b-modal>

    <!-- Modal for Adding Office -->
    <b-modal
      id="modal-office"
      ref="modal"
      title="Add Office"
      @ok="handleOkOffice"
    >
      <form ref="form" @submit.stop.prevent="SubmitOffice">
        <label class="control-label">Office Name</label>
        <input type="hidden" v-model="officeForm.off_id" />
        <input
          id="off_title"
          v-model="officeForm.off_title"
          name="office_name"
          type="text"
          class="form-control"
          required
          placeholder="e.x Office of the Municipal XXXXXXXX"
        />
        <label class="text-danger">Office ID Number : {{officeForm.off_id}}</label>
      </form>
    </b-modal>

    <!-- End Page Vue Content -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      AppointmentDataList: {},
      OfficeDataList: {},
      appointmentForm: {
        app_id: "",
        app_title: null,
      },
      officeForm: {
        off_id: "",
        off_title: null,
      }
    };
  },
  mounted() {
    this.GenerateAppID();
    this.GenerateOfficeID();
    this.getAppointmentResults();
    this.getOfficeResults();
  },

  methods: {
    GenerateAppID() {
      var _this = this
      axios.get("/api/get-generated-appid").then(function(response) {
        _this.appointmentForm = response.data[0];
      });
    },
    GenerateOfficeID() {
      var _this = this
      axios.get("/api/get-generated-officeid").then(function(response) {
        _this.officeForm = response.data[0];
      });
    },
    getAppointmentResults(page = 1) {
			axios.get('/api/get-appointments?page=' + page)
				.then(response => {
          this.AppointmentDataList = response.data;
				});
    },
    getOfficeResults(page = 1) {
			axios.get('/api/get-offices?page=' + page)
				.then(response => {
          this.OfficeDataList = response.data;
				});
		},
    //This submit and check is for Appointment
     checkFormValidity() {
        const valid = this.$refs.form.checkValidity()
        var a = (this.appointmentForm.app_title === "") ? false : true;
          if (a == false) {
            alert('Cant Be empty');
          }else if (this.appointmentForm.app_title == null) { 
            alert('Cant Be empty');
            document.getElementById('app_title').focus();
          }
        return valid
      },
    handleOk(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      // Trigger submit handler
      this.SubmitAppointment();
    },
    SubmitAppointment() {
       // Exit when the form isn't valid
        if (!this.checkFormValidity()) {
          return
        }
        var _this = this;
      	axios.post('/api/add-appointment',this.appointmentForm).then(function(response){
						if (response.data.AppointmentData.status=="Success") {
							Vue.swal(
								response.data.AppointmentData.header,
								response.data.AppointmentData.name,
								'success',
                ).then(function(isConfirm) {
                    _this.getAppointmentResults();
                  });
						}else if(response.data.AppointmentData.status=="Error"){
                Vue.swal({
                  title: response.data.AppointmentData.header,
                  type: 'error'
                });
            }else{
							Vue.swal(
								'Something went wrong!',
								response,
								'error'
								)	
						}
					});

      // Hide the modal manually
      this.$nextTick(() => {
        this.$refs.modal.hide();
      });
    },

    //This submit and check is for Office
     checkofficeValidity() {
        const valid = this.$refs.form.checkValidity()
        var a = (this.officeForm.off_title === "") ? false : true;
          if (a == false) {
            alert('Cant Be empty');
          }else if (this.officeForm.off_title == null) { 
            alert('Cant Be empty');
            document.getElementById('off_title').focus();
          }
        return valid
      },
    handleOkOffice(bvModalEvt) {
      // Prevent modal from closing
      bvModalEvt.preventDefault();
      // Trigger submit handler
      this.SubmitOffice();
    },
     SubmitOffice() {
       // Exit when the form isn't valid
        if (!this.checkofficeValidity()) {
          return
        }
        var _this = this;
      	axios.post('/api/add-office-list',this.officeForm).then(function(response){
						if (response.data.OfficeData.status=="Success") {
							Vue.swal(
								response.data.OfficeData.header,
								response.data.OfficeData.name,
								'success',
                ).then(function(isConfirm) {
                    _this.getOfficeResults();
                  });
						}else if(response.data.OfficeData.status=="Error"){
                Vue.swal({
                  title: response.data.OfficeData.header,
                  type: 'error'
                });
            }else{
							Vue.swal(
								'Something went wrong!',
								response,
								'error'
								)	
						}
					});

      // Hide the modal manually
      this.$nextTick(() => {
        this.$refs.modal.hide();
      });
    },
  }
};
</script>
