<template>
	<div>
		<div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Dashboard</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
		<div class="row">
			<div v-for="item in appointment" class="col-lg-3 col-md-6" >
				<div class="card">
					<div class="card-body">
						<div class="row p-t-10 p-b-10">
							<div class="col p-r-0">
								<h1 class="font-light">{{ item.stats_count }}</h1>
								<h6 class="text-muted">{{ item.stats_name }}</h6>
								<a :href="'list?app_id='+item.stats_id" class="text-link">see list</a>
							</div>
							<div class="col text-right align-self-center">
								<div data-label="100%" class="css-bar m-b-0 css-bar-primary css-bar-100"><i class="mdi mdi-account-circle"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	mounted(){
		console.log('Dashboard Widget Component mounted!');
		// this.getAppointment();
		console.log(this.getAppointment());
	},
	data() {
		return {
			appointment: [],
		}
	},
	methods: {
		getAppointment(){
			var _this = this;
			axios.get('/api/get-appointment').then(function(reponse){
				_this.appointment = reponse.data;
			});
		}
	}
}
</script>
