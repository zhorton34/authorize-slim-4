import Vue from 'vue'
import './material-icons.js'
import TraceStack from './components/exceptions/trace.vue'
import RegisterComponent from './components/auth/register.vue'

Vue.component('register', RegisterComponent)
Vue.component('stack-trace', TraceStack)

window.app = new Vue({
	el: "#app"
})
