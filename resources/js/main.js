import Vue from 'vue'
import RegisterComponent from './components/auth/register.vue'

Vue.component('register', RegisterComponent)

window.app = new Vue({
	el: "#app"
})
