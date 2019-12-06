require('./bootstrap');
window.Vue = require('vue');

// Plugins
import Vue from 'vue'
import VueRouter from 'vue-router'
import BootstrapVue from 'bootstrap-vue'
import VueSweetalert2 from 'vue-sweetalert2'
import VueMoment from 'vue-moment'
import 'sweetalert2/dist/sweetalert2.min.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'


// Component
import Dashboard from './components/dashboard/DashboardComponent'
import DashboardWidget from './components/dashboard/DashboardWidget'
import EmployeeList from './components/employee/EmployeeListComponent'
import AddEmployee from './components/employee/AddEmployeeComponent'
import ViewEmployee from './components/employee/ViewEmployeeComponent'
import EditEmployeetab1 from './components/employee/EditEmployeetab1'
import EditEmployeetab2 from './components/employee/EditEmployeetab2'
import EditEmployeetab3 from './components/employee/EditEmployeetab3'
import EditEmployeetab4 from './components/employee/EditEmployeetab4'
import EditEmployeetab5 from './components/employee/EditEmployeetab5'
import EditEmployeetab6 from './components/employee/EditEmployeetab6'
import EditEmployeetab7 from './components/employee/EditEmployeetab7'
import EditEmployeetab8 from './components/employee/EditEmployeetab8'
import Utilities from './components/utilities/UtilitiesComponent'
import EditAppointment from './components/utilities/EditAppointment'
import EditOffice from './components/utilities/EditOffice'
import Reports from './components/reports/ReportsComponent'


Vue.use(VueRouter)
Vue.use(VueSweetalert2)
Vue.use(BootstrapVue)
Vue.use(VueMoment)


Vue.component('employee-component', require('./components/dashboard/DashboardComponent.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));


const router = new VueRouter({
	mode:'history',
	routes: [
	{
		path:'/dashboard',
		name:'dashboard',
		component: DashboardWidget,
		props: {
			title:'Dashboard'
		}
	},
	{
		path:'/employee',
		name:'employee',
		component: EmployeeList,
		props: {
			title:'Employee'
		}
	},
	{
		path:'/add-employee',
		name:'addemployee',
		component: AddEmployee,
		props: {
			title:'Add Employee'
		}
	},
	{
		path:'/edit-employee-tab1/:id',
		name:'editemployeetab1',
		component: EditEmployeetab1,
		props: {
			title:'Edit Employee Tab 1'
		}
	},
	{
		path:'/edit-employee-tab2/:id',
		name:'editemployeetab2',
		component: EditEmployeetab2,
		props: {
			title:'Edit Employee Tab 2'
		}
	},
	{
		path:'/edit-employee-tab3/:id',
		name:'editemployeetab3',
		component: EditEmployeetab3,
		props: {
			title:'Edit Employee Tab 3'
		}
	},
	{
		path:'/edit-employee-tab4/:id',
		name:'editemployeetab4',
		component: EditEmployeetab4,
		props: {
			title:'Edit Employee Tab 4'
		}
	},
	{
		path:'/edit-employee-tab5/:id',
		name:'editemployeetab5',
		component: EditEmployeetab5,
		props: {
			title:'Edit Employee Tab 5'
		}
	},
	{
		path:'/edit-employee-tab6/:id',
		name:'editemployeetab6',
		component: EditEmployeetab6,
		props: {
			title:'Edit Employee Tab 6'
		}
	},
	{
		path:'/edit-employee-tab7/:id',
		name:'editemployeetab7',
		component: EditEmployeetab7,
		props: {
			title:'Edit Employee Tab 7'
		}
	},
	{
		path:'/edit-employee-tab8/:id',
		name:'editemployeetab8',
		component: EditEmployeetab8,
		props: {
			title:'Edit Employee Tab 8'
		}
	},
	{
		path:'/utilities',
		name:'utilities',
		component: Utilities,
		props: {
			title:'Utilities'
		}
	},
	{
		path:'/edit-appointment/:id',
		name:'editappointment',
		component: EditAppointment,
		props:{
			title:'Edit Appointment'
		}
	},
	{
		path:'/edit-office/:id',
		name:'editoffice',
		component: EditOffice,
		props: {
			title: 'Edit Office'
		}
	},
	{
		path:'/all-reports',
		name:'reports',
		component: Reports,
		props: {
			title:'Reports'
		}
	},
	{
		path:'/view-employee/:id',
		name:'viewemployee',
		component: ViewEmployee,
		props: {
			title:'ViewEmployee'
		}
	}
	]
});

const app = new Vue({
	el: '#app',
	components: {Dashboard},
	router,
});