<template>
	<div>
		 <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">View Employee</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><router-link :to="{ name: 'dashboard' }"><span class="hide-menu">Dashboard</span></router-link></li>
                        <li class="breadcrumb-item active">View Employee</li>
                    </ol>
                </div>
            </div>
        </div>
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<nav class="navbar navbar-expand-lg">
        				<div id="navbarNavDropdown" class="navbar-collapse collapse">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs profile-tab mr-auto " role="tablist">
								<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#one" role="tab">One</a> </li>
								<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#two" role="tab">Two</a> </li>
								<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#three" role="tab">Three</a> </li>
								<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#four" role="tab">Four</a></li>
								<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#five" role="tab">Five</a></li>
								<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#six" role="tab">Six</a></li>
								<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#seven" role="tab">Seven</a></li>
								<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#eight" role="tab">Eight</a></li>
							</ul>
							<ul class="navbar-nav">
								<li class="nav-item">
									<button class=" nav-link btn btn-success" @click="report(employeedata.bio_num, employeedata.personal_id)">&nbspPrint PDS</button>
								</li>
								
							</ul>
        				</div>
					</nav>
					



					<!-- Tab panes -->
					<div class="tab-content">
						<!-- first tab -->
						<div class="tab-pane active" id="one" role="tabpanel">
							<!-- Personal Information -->
							<div class="row">
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											<div class="form-body">
												<div class="row">
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
														<div class="card-title">
															<h4 class="font-weight-bold">Personal Information</h4>
														</div>
													</div>
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
														<div class="pull-right">
															<router-link :to="{name: 'editemployeetab1',  params: {bio_num: employeedata.bio_num}}" class="btn btn-danger"><i class="fa fa-edit"></i> Edit</router-link>
														</div>
													</div>
												</div>
												<hr>
												<b-container>
													<b-row style="background-color:#c1c1c1;">
														<b-col cols="5">Biometric ID Number</b-col>
														<b-col cols="1">:</b-col>
														<b-col cols="6">{{employeedata.bio_num}}</b-col>
													</b-row>
													<b-row>
														<b-col cols="5">Full Name</b-col>
														<b-col cols="1">:</b-col>
														<b-col cols="6">{{employeedata.firstname}} {{employeedata.middlename}} {{employeedata.lastname}} {{employeedata.presuf}}</b-col>
													</b-row>
													<b-row style="background-color:#c1c1c1;">
														<b-col cols="5">Assigned Office</b-col>
														<b-col cols="1">:</b-col>
														<b-col cols="6">{{employeedata.office_name}}</b-col>
													</b-row>
													<b-row>
														<b-col cols="5">Status of Appointment</b-col>
														<b-col cols="1">:</b-col>
														<b-col cols="6">{{employeedata.appointment_name}}</b-col>
													</b-row>
													<b-row style="background-color:#c1c1c1;">
														<b-col cols="5">Date Enrolled</b-col>
														<b-col cols="1">:</b-col>
														<b-col cols="6">{{employeedata.created_at | moment("MMMM DD, YYYY")}}</b-col>
													</b-row>
													<b-row>
														<b-col cols="5">Date of Birth</b-col>
														<b-col cols="1">:</b-col>
														<b-col cols="6">{{employeedata.firstname}} {{employeedata.middlename}} {{employeedata.lastname}} {{employeedata.presuf}}</b-col>
													</b-row>
													<b-row style="background-color:#c1c1c1;">
														<b-col cols="5">Place of Birth</b-col>
														<b-col cols="1">:</b-col>
														<b-col cols="6">{{data.placeofbirth}}</b-col>
													</b-row>
													<b-row>
														<b-col cols="5">Gender</b-col>
														<b-col cols="1">:</b-col>
														<b-col cols="6" v-if="(employeedata.gender == 'M')">Male</b-col>
														<b-col cols="6" v-else-if="(employeedata.gender == 'F')">Female</b-col>
													</b-row>
													<b-row style="background-color:#c1c1c1;">
														<b-col cols="5">Civil Status</b-col>
														<b-col cols="1">:</b-col>
														<b-col cols="6">{{data.civilstatus}}</b-col>
													</b-row>
													<b-row>
														<b-col cols="5">Telephone No.</b-col>
														<b-col cols="1">:</b-col>
														<b-col cols="6">{{data.telephone}}</b-col>
													</b-row>
													<b-row style="background-color:#c1c1c1;">
														<b-col cols="5">Mobile No.</b-col>
														<b-col cols="1">:</b-col>
														<b-col cols="6">{{data.mobileno}}</b-col>
													</b-row>
													<b-row>
														<b-col cols="5">Email Address</b-col>
														<b-col cols="1">:</b-col>
														<b-col cols="6">{{data.email}}</b-col>
													</b-row>
												</b-container>
												<hr>
												<div class="row">
													<!-- Basic Information Unupdatable -->
													<div class="form-group col-md-2">
														<label class="control-label text-danger">Height (m)</label>
														<h4>{{data.height}}</h4>
													</div>
													<div class="form-group col-md-2">
														<label class="control-label text-danger">Weight (kg)</label>
														<h4>{{data.weight}}</h4>
													</div>
													<div class="form-group col-md-2">
														<label class="control-label text-danger">Blood Type</label>
														<h4>{{data.bloodtype}}</h4>
													</div>
													<div class="form-group col-md-3">
														<label class="control-label text-danger">Citizenship</label>
														<h4>{{data.citizenship}}</h4>
													</div>
													<div class="form-group col-md-3">
														<label class="control-label text-danger">Country</label>
														<h4>{{data.country}}</h4>
													</div>
												</div>
												<div class="row">
													<!-- Basic Information Unupdatable -->
													<div class="form-group col-md-2">
														<label class="control-label text-danger">GSIS ID NO.</label>
														<h4>{{data.gsis}}</h4>
													</div>
													<div class="form-group col-md-2">
														<label class="control-label text-danger">PAG-IBIG ID NO.</label>
														<h4>{{data.pagibig}}</h4>
													</div>
													<div class="form-group col-md-2">
														<label class="control-label text-danger">PHILHEALTH NO.</label>
														<h4>{{data.philhealth}}</h4>
													</div>
													<div class="form-group col-md-3">
														<label class="control-label text-danger">SSS NO.</label>
														<h4>{{data.sss}}</h4>
													</div>
													<div class="form-group col-md-3">
														<label class="control-label text-danger">TIN NO.</label>
														<h4>{{data.tin}}</h4>
													</div>
												</div>
												<!-- Address -->
												<div class="row">
													<div class="form-group col-lg-9">
														<label class="control-label text-danger">Residential Address</label>
														<h4>{{full_address.prklotblk + ' '+ full_address.street + ' ' + full_address.strsub + ' Brgy. ' + full_address.barangay + ' ' + full_address.municipality +' '+ full_address.province }}</h4>
													</div>
													<div class="form-group col-md-3">
														<label class="control-label text-danger">ZIP CODE</label>
														<h4>{{data.zipcode}}</h4>
													</div>
												</div>
												<div class="row">
													<div class="form-group col-lg-9">
														<label class="control-label text-danger">Permanent Address</label>
														<h4>N/A</h4>
													</div>
													<div class="form-group col-md-3">
														<label class="control-label text-danger">ZIP CODE</label>
														<h4>--</h4>
													</div>
												</div>
												<!-- End Address -->
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Personal Information -->
						</div>
						<!--second tab-->
						<div class="tab-pane" id="two" role="tabpanel">
							<!-- Family Background -->
							<div class="row">
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											<div class="form-body">
												<div class="row">
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
														<div class="card-title">
															<h4 class="font-weight-bold">Family Background</h4>
														</div>
													</div>
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
														<div class="pull-right">
															<router-link :to="{name: 'editemployeetab2', params: {id: employeedata.bio_num}}" class="btn btn-danger"><i class="fa fa-edit"></i> Edit</router-link>
														</div>
													</div>
												</div>
												<hr>
												<div class="row">
													<div class="form-group col-md-3">
														<h6 class="control-label">Spouse's Fullname</h6>
														<h6 class="control-label">Occupation</h6>
														<h6 class="control-label">Employer/Business Name</h6>
														<h6 class="control-label">Business Address</h6>
														<h6 class="control-label">Telephone No.</h6>
														<h6 class="control-label">Father's Fullname</h6>
														<h6 class="control-label">Mother's Fullname</h6>
													</div>
													<div class="form-group col-md-1">
														<h6 class="control-label">:</h6>
														<h6 class="control-label">:</h6>
														<h6 class="control-label">:</h6>
														<h6 class="control-label">:</h6>
														<h6 class="control-label">:</h6>
														<h6 class="control-label">:</h6>
														<h6 class="control-label">:</h6>
													</div>
													<div class="form-group col-md-8">
														<h6 class="control-label">--</h6>
														<h6 class="control-label">--</h6>
														<h6 class="control-label">--</h6>
														<h6 class="control-label">--</h6>
														<h6 class="control-label">--</h6>
														<h6 class="control-label">--</h6>
														<h6 class="control-label">--</h6>
													</div>
												</div>
												<hr>
												<div class="row">
													<div class="form-group col-lg-6">
														<label class="control-label text-danger">Name of Children</label>
														<h6>1.--</h6>
														<h6>2.--</h6>
														<h6>3.--</h6>
														<h6>4.--</h6>
														<h6>5.--</h6>
													</div>
													<div class="form-group col-md-6">
														<label class="control-label text-danger">Date of Birth (mm/dd/yyyy)</label>
														<h6>01/01/2000</h6>
														<h6>01/01/2000</h6>
														<h6>01/01/2000</h6>
														<h6>01/01/2000</h6>
														<h6>01/01/2000</h6>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Family Background -->
						</div>
						<!-- third tab -->
						<div class="tab-pane" id="three" role="tabpanel">
							<!-- Educational Background -->
							<div class="row">
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											<div class="form-body">
												<div class="row">
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
														<div class="card-title">
															<h4 class="font-weight-bold">Educational Background</h4>
														</div>
													</div>
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
														<div class="pull-right">
															<router-link :to="{name: 'editemployeetab3', params: {id: employeedata.bio_num}}" class="btn btn-danger"><i class="fa fa-edit"></i> Edit</router-link>
														</div>
													</div>
												</div>
												<hr>
												<div class="row">
													<div class="card-title">
														<h4 class="font-weight-bold">Elementary</h4>
													</div>
												</div>
												<div class="row">
													<div class="form-group col-md-4">
														<label class="control-label text-danger">Name of School (In Full)</label>
														<h4>--</h4>
													</div>
													<div class="form-group col-md-4">
														<label class="control-label text-danger">Basic Education/Degree/Course (In Full)</label>
														<h4>--</h4>
													</div>
													<div class="form-group col-md-2">
														<label class="control-label text-danger">Period of Attendace (FROM)</label>
														<h4>--</h4>
													</div>
													<div class="form-group col-md-2">
														<label class="control-label text-danger">Period of Attendace (TO)</label>
														<h4>--</h4>
													</div>
												</div>

												<div class="row">
													<div class="card-title">
														<h4 class="font-weight-bold">Secondary</h4>
													</div>
												</div>
												<div class="row">
													<div class="form-group col-md-4">
														<label class="control-label text-danger">Name of School (In Full)</label>
														<h4>--</h4>
													</div>
													<div class="form-group col-md-4">
														<label class="control-label text-danger">Basic Education/Degree/Course (In Full)</label>
														<h4>--</h4>
													</div>
													<div class="form-group col-md-2">
														<label class="control-label text-danger">Period of Attendace (FROM)</label>
														<h4>--</h4>
													</div>
													<div class="form-group col-md-2">
														<label class="control-label text-danger">Period of Attendace (TO)</label>
														<h4>--</h4>
													</div>
												</div>

												<div class="row">
													<div class="card-title">
														<h4 class="font-weight-bold">Vocation/Trade</h4>
													</div>
												</div>
												<div class="row">
													<div class="form-group col-md-4">
														<label class="control-label text-danger">Name of School (In Full)</label>
														<h4>--</h4>
													</div>
													<div class="form-group col-md-4">
														<label class="control-label text-danger">Basic Education/Degree/Course (In Full)</label>
														<h4>--</h4>
													</div>
													<div class="form-group col-md-2">
														<label class="control-label text-danger">Period of Attendace (FROM)</label>
														<h4>--</h4>
													</div>
													<div class="form-group col-md-2">
														<label class="control-label text-danger">Period of Attendace (TO)</label>
														<h4>--</h4>
													</div>
												</div>

												<div class="row">
													<div class="card-title">
														<h4 class="font-weight-bold">College</h4>
													</div>
												</div>
												<div class="row">
													<div class="form-group col-md-4">
														<label class="control-label text-danger">Name of School (In Full)</label>
														<h4>--</h4>
													</div>
													<div class="form-group col-md-4">
														<label class="control-label text-danger">Basic Education/Degree/Course (In Full)</label>
														<h4>--</h4>
													</div>
													<div class="form-group col-md-2">
														<label class="control-label text-danger">Period of Attendace (FROM)</label>
														<h4>--</h4>
													</div>
													<div class="form-group col-md-2">
														<label class="control-label text-danger">Period of Attendace (TO)</label>
														<h4>--</h4>
													</div>
												</div>

												<div class="row">
													<div class="card-title">
														<h4 class="font-weight-bold">Graduate Studies</h4>
													</div>
												</div>
												<div class="row">
													<div class="form-group col-md-4">
														<label class="control-label text-danger">Name of School (In Full)</label>
														<h4>--</h4>
													</div>
													<div class="form-group col-md-4">
														<label class="control-label text-danger">Basic Education/Degree/Course (In Full)</label>
														<h4>--</h4>
													</div>
													<div class="form-group col-md-2">
														<label class="control-label text-danger">Period of Attendace (FROM)</label>
														<h4>--</h4>
													</div>
													<div class="form-group col-md-2">
														<label class="control-label text-danger">Period of Attendace (TO)</label>
														<h4>--</h4>
													</div>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Educational Background -->
						</div>
						<!-- fourth tab -->
						<div class="tab-pane" id="four" role="tabpanel">
							<!-- Civil Service Eligibility -->
							<div class="row">
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											<div class="form-body">
												<div class="row">
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
														<div class="card-title">
															<h4 class="font-weight-bold">Civil Service Eligibility</h4>
														</div>
													</div>
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
														<div class="pull-right">
															<router-link :to="{name: 'editemployeetab4', params: {id: employeedata.bio_num}}" class="btn btn-danger"><i class="fa fa-edit"></i> Edit</router-link>
														</div>
													</div>
												</div>
												<hr>
												<div class="row">
													<div class="col-lg-12">
														<b-button v-b-toggle.civilservice class="form-control btn btn-link text-left">
															<span>
																<i class="fa fa-angle-down"></i>
															</span>&nbspCareer Service/RA 1080 (Board Bar) Under Special Laws/CES/CSEE Barangay Eligibility/Driver's License
														</b-button>
														<b-collapse class="collapse" id="civilservice">
															<div class="card card-body">
																<div class="row">
																	<div class="form-group col-md-4">
																		<h6 class="control-label">Rating</h6>
																		<h6 class="control-label">Date of Examination/Conferment</h6>
																		<h6 class="control-label">Place of Examination/Conferment</h6>
																		<h6 class="control-label">License Number</h6>
																		<h6 class="control-label">License Date of Validity</h6>
																	</div>
																	<div class="form-group col-md-1">
																		<h6>:</h6>
																		<h6>:</h6>
																		<h6>:</h6>
																		<h6>:</h6>
																		<h6>:</h6>
																	</div>
																	<div class="form-group col-md-7">
																		<h6>--</h6>
																		<h6>--</h6>
																		<h6>--</h6>
																		<h6>--</h6>
																		<h6>--</h6>
																	</div>
																</div>
															</div>
														</b-collapse>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Civil Service Eligibilty -->
						</div>
						<!-- fifth tab -->
						<div class="tab-pane" id="five" role="tabpanel">
							<!-- Work Experience -->
							<div class="row">
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											<div class="form-body">
												<div class="row">
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
														<div class="card-title">
															<h4 class="font-weight-bold">Work Experience</h4>
														</div>
													</div>
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
														<div class="pull-right">
															<router-link :to="{name: 'editemployeetab5', params: {id: employeedata.bio_num}}" class="btn btn-danger"><i class="fa fa-edit"></i> Edit</router-link>															
														</div>
													</div>
												</div>
												<hr>
												<div class="row">
													<div class="col-lg-12">
														<b-button v-b-toggle.positiontitle class="form-control btn btn-link text-left">
															<span>
																<i class="fa fa-angle-down"></i>
															</span>&nbspWork Position
														</b-button>
														<b-collapse class="collapse" id="positiontitle">
															<div class="card card-body">
																<div class="row">
																	<div class="form-group col-md-6">
																		<h6 class="control-label">Department/Agency/Office/Company (In Full/Do not Abbreviate)</h6>
																		<h6 class="control-label">Status of Appointment</h6>
																		<h6 class="control-label">Inclusive Dates (FROM)</h6>
																		<h6 class="control-label">Inclusive Dates (TO)</h6>
																		<h6 class="control-label">Governtment Service (Yes/No)</h6>
																		<h6 class="control-label">Salary/Job/Pay Grade (If Applicable) & STEP (Format "00-0")/Increment</h6>
																		<h6 class="control-label">Monthly Salary</h6>
																	</div>
																	<div class="form-group col-md-1">
																		<h6>:</h6>
																		<h6>:</h6>
																		<h6>:</h6>
																		<h6>:</h6>
																		<h6>:</h6>
																		<h6>:</h6>
																		<h6>:</h6>
																	</div>
																	<div class="form-group col-md-5">
																		<h6>--</h6>
																		<h6>--</h6>
																		<h6>--</h6>
																		<h6>--</h6>
																		<h6>--</h6>
																		<h6>--</h6>
																		<h6>--</h6>
																	</div>
																</div>
															</div>
														</b-collapse>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- End Work Experience -->
						</div>
						<!-- sixth tab -->
						<div class="tab-pane" id="six" role="tabpanel">
							<div class="row">
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											<div class="form-body">
												<div class="row">
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
														<div class="card-title">
															<h4 class="font-weight-bold">Voluntary Work</h4>
														</div>
													</div>
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
														<div class="pull-right">
															<router-link :to="{name: 'editemployeetab6', params: {id: employeedata.bio_num}}" class="btn btn-danger"><i class="fa fa-edit"></i> Edit</router-link>
														</div>
													</div>
												</div>
												<hr>
												<div class="row">
													<div class="col-lg-12">
														<b-button v-b-toggle.voluntart class="form-control btn btn-link text-left">
															<span>
																<i class="fa fa-angle-down"></i>
															</span>&nbspName & Adresss of Organization
														</b-button>
														<b-collapse class="collapse" id="voluntary">
															<div class="card card-body">
																<div class="row">
																	<div class="form-group col-md-3">
																		<h6 class="control-label">Inclusive Dates (FROM)</h6>
																		<h6 class="control-label">Inclusive Dates (TO)</h6>
																		<h6 class="control-label">Number of Hours</h6>
																		<h6 class="control-label">Position/Nature of Work</h6>
																	</div>
																	<div class="form-group col-md-1">
																		<h6>:</h6>
																		<h6>:</h6>
																		<h6>:</h6>
																		<h6>:</h6>
																	</div>
																	<div class="form-group col-md-8">
																		<h6>--</h6>
																		<h6>--</h6>
																		<h6>--</h6>
																		<h6>--</h6>
																	</div>
																</div>
															</div>
														</b-collapse>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- seveth tab -->
						<div class="tab-pane" id="seven" role="tabpanel">
							<div class="row">
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											<div class="form-body">
												<div class="row">
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
														<div class="card-title">
															<h4 class="font-weight-bold">Learning and Development</h4>
														</div>
													</div>
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
														<div class="pull-right">
															<router-link :to="{name: 'editemployeetab7', params: {id: employeedata.bio_num}}" class="btn btn-danger"><i class="fa fa-edit"></i> Edit</router-link>
														</div>
													</div>
												</div>
												<hr>
												<div class="row">
													<div class="col-lg-12">
														<b-button v-b-toggle.learninganddevep class="form-control btn btn-link text-left">
															<span>
																<i class="fa fa-angle-down"></i>
															</span>&nbspTitle of Learning and Development Interventions/Training Programs
														</b-button>
													</div>
												</div>
												<b-collapse class="collapse" id="learninganddevep">
													<div class="card card-body">
														<div class="row">
															<div class="form-group col-md-4">
																<h6 class="control-label">Inclusive Dates (FROM)</h6>
																<h6 class="control-label">Inclusive Dates (TO)</h6>
																<h6 class="control-label">Number of Hours</h6>
																<h6 class="control-label">Type of LD (Managerial/Supervisory/Technical/etc)</h6>
																<h6 class="control-label">Conducted Sponsored by</h6>
															</div>
															<div class="form-group col-md-1">
																<h6>:</h6>
																<h6>:</h6>
																<h6>:</h6>
																<h6>:</h6>
																<h6>:</h6>
															</div>
															<div class="form-group col-md-7">
																<h6>--</h6>
																<h6>--</h6>
																<h6>--</h6>
																<h6>--</h6>
																<h6>--</h6>
															</div>
														</div>
													</div>
												</b-collapse>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- eight tab -->
						<div class="tab-pane" id="eight" role="tabpanel">
							<div class="row">
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											<div class="form-body">
												<div class="row">
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
														<div class="card-title">
															<h4 class="font-weight-bold">Other Informations</h4>
														</div>
													</div>
													<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
														<div class="pull-right">
															<router-link :to="{name: 'editemployeetab8', params: {id: employeedata.bio_num}}" class="btn btn-danger"><i class="fa fa-edit"></i> Edit</router-link>
														</div>
													</div>
												</div>
												<hr>
												<div class="row">
													<div class="col-lg-12">
														<b-button v-b-.toggle.otherinfo class="form-control btn btn-link text-left">
															<span>
																<i class="fa fa-angle-down"></i>
															</span>&nbspSpecial Skills and Hobbies
														</b-button>
														<b-collapse class="collapse" id="otherinfo">
															<div class="card card-body">
																<div class="row">
																	<div class="form-group col-md-4">
																		<h6 class="control-label">Non-Academic Distinctions/Recognition</h6>
																		<h6 class="control-label">Membership in Association/Organization</h6>
																	</div>
																	<div class="form-group col-md-1">
																		<h6>:</h6>
																		<h6>:</h6>
																	</div>
																	<div class="form-group col-md-7">
																		<h6>--</h6>
																		<h6>--</h6>
																	</div>
																</div>
															</div>
														</b-collapse>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
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
	data() {
		return{
			employeedata:[],
			appointmentList:[],
			officeList:[],
			provinceList:[],
			municipalityList:[],
			barangayList:[],
			data:{
				 bio_num: '',
                firstname:'',
                middlename:'',
                lastname:'',
                presuf:'',
                gender:'',
				status: '',
				office:'',
                civilstatus:'',
                placeofbirth: '',
                birthday:'',
				telephone:'',
				mobileno:'',
				email:'',
				height:'',
				weight:'',
				bloodtype:'',
				gsis:'',
				pagibig:'',
				philhealth:'',
				sss:'',
                tin:'',
                agency_no:'',
                provsta : '',
				muncit : '',
				barangay : '',
				prklotblk:'',
				street:'',
				strsub:'',
				zipcode:''
			},
			address: {
				bio_num : '',
				provsta : '',
				muncit : '',
				barangay : '',
			},
			full_address: {
				barangay : '',
				municipality : '',
				prklotblk:'',
				province:'',
				street:'',
				strsub:'',
				zipcode:''
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
			axios.get('/api/view-employee/' + _id).then(function(response){
				_this.data = response.data[0];
				_this.employeedata = response.data[0];
				_this.address.bio_num = response.data[0].bio_num;
				_this.address.barangay = response.data[0].barangay;
				_this.address.provsta = response.data[0].provsta;
				_this.address.muncit = response.data[0].muncit;
				if (_this.address.barangay != '' && _this.address.provsta != '' && _this.address.muncit ) {
					_this.getfull_address();
				}
				console.log(_this.employeedata);
				
			});
		},
		getfull_address(){
			var _this = this;
			var _id = this.$route.params.id;
			axios.get('/api/get-fulladdress/' +_this.data.bio_num).then(function(response) {
				if (response.data[0].prklotblk === null) {
					_this.full_address.prklotblk == ' ';
				}else{
					_this.full_address.prklotblk = response.data[0].prklotblk;
				}
				if (response.data[0].street === null) {
					_this.full_address.street == ' ';
				}else{
					_this.full_address.street = response.data[0].street;
				}
				if (response.data[0].strsub === null) {
					_this.full_address.strsub == ' ';
				}else{
					_this.full_address.strsub = response.data[0].strsub;
				}
				_this.full_address.barangay = response.data[0].barangay;
				_this.full_address.municipality = response.data[0].municipality;
				_this.full_address.province = response.data[0].province;
				_this.full_address.zipcode = response.data[0].zipcode;
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
		report(bio_num, personal_id){
			if(personal_id != null){
				window.open(`${'http://localhost:8000/api/view-pds/'+bio_num}`, '_blank');
				return true;
			}else{
				Vue.swal({
					title: 'Something went Wrong!',
					text: 'Please Fill Up your Personal Information',
					type: 'error'
				});
			}
		}

	}
}
</script>
