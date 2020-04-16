import Vue from 'vue'
import RegisterComponent from './components/auth/register.vue'
import StackTrace from './components/exceptions/stack-trace.vue'

Vue.component('stack-trace', StackTrace)
Vue.component('register', RegisterComponent)

window.app = new Vue({
	el: "#app"
})
