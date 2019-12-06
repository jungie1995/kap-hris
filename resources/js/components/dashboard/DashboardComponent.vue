<template>
	<div>
		<aside class="left-sidebar">
			<div class="scroll-sidebar">
				<nav class="sidebar-nav">
					<ul id="sidebarnav">
						<li>
							<router-link :to="{ name: 'dashboard' }" class="waves-effect waves-dark"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></router-link>
						</li>
						<li><a  href="javascript:void(0)" aria-expanded="false"><i class="icon-layers"></i><span class="hide-menu">Employee</span></a>
							<ul aria-expanded="false" class="collapse">
								<router-link :to="{ name: 'employee' }" class="nav-link">Employee List</router-link>
								<router-link :to="{ name: 'addemployee' }" class="nav-link" >Add Employee</router-link>
							</ul>
						</li>
						<li>
							<router-link :to="{ name: 'utilities' }" class="waves-effect waves-dark"><i class="fa fa-cog"></i><span class="hide-menu">Utilities</span></router-link>
						</li>
						<li>
							<router-link :to="{ name: 'reports' }" class="waves-effect waves-dark"><i class="fa fa-print"></i><span class="hide-menu">Reports</span></router-link>
						</li>
					</ul>
				</nav>
			</div>
		</aside>
		<div class="page-wrapper">
			<div class="container-fluid">
				<main>
					<router-view></router-view>
				</main>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	mounted(){
		console.log('Dashboard Component mounted!');
	}
}
</script>
