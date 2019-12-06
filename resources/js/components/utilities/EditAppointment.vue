<template>
  <div>
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Edit Appointment</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><router-link :to="{ name: 'dashboard' }"><span class="hide-menu">Dashboard</span></router-link></li>
                        <li class="breadcrumb-item"><router-link :to="{ name: 'utilities' }"><span class="hide-menu">Utilities</span></router-link></li>
                        <li class="breadcrumb-item active">Edit Appointment</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="m-b-0 text-white">Appointment Number {{AppointmentData.appointment_id}} </h4>
                    </div>
                    <div class="card-body">
                        <form ref="form" @submit.stop.prevent="SubmitAppointment" class="form-horizontal form-bordered">
                            <div class="form-body">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Appointment Name</label>
                                    <div class="col-md-9">
                                        <input 
                                        id="appointment_name"
                                        type="text" 
                                        placeholder="e.x Job Order, Honorarium , Casual, Permanent" 
                                        v-model="AppointmentData.appointment_name" 
                                        class="form-control">
                                        <small class="form-control-feedback"> This is inline help </small> </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="offset-sm-3 col-md-9">
                                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Submit</button>
                                                <button type="button" class="btn btn-inverse"><router-link :to="{ name: 'utilities' }"><i class="fa fa-times"></i> Cancel</router-link></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
            AppointmentData: {},
        }
    },
    mounted() {
        this.GetAppointmentData();
    },
    methods: {
        GetAppointmentData(){
            var _this = this;
            var _id = this.$route.params.id;
            axios.get('/api/edit-appointment/'+ _id).then(function (response) {
             _this.AppointmentData = response.data[0];
            })
        },
        //This submit and check is for Appointment
        checkFormValidity() {
            const valid = this.$refs.form.checkValidity()
            var a = (this.AppointmentData.appointment_name === "") ? false : true;
            if (a == false) {
                alert('Appointment Name Cant Be empty');
            }else if (this.AppointmentData.appointment_name == null) { 
                alert('Appointment Name Cant Be empty');
                document.getElementById('appointment_name').focus();
            }
            return valid
        },
        SubmitAppointment(){
             if (!this.checkFormValidity()) {
                return
                }
            var _this = this;
            axios.put('/api/update-appointment',this.AppointmentData).then(function(response){
                if (response.data.AppointmentData.status=="Success") {
                    Vue.swal(
                        response.data.AppointmentData.header,
                        response.data.AppointmentData.name,
                        'success',
                    ).then(function(isConfirm) {
                       _this.$router.push('/utilities')
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

        }

    }
}
</script>

<style>

</style>