import Vue from 'vue'
import './material-icons'
import 'vue-material-design-icons/styles.css'
import StackTrace from './components/exceptions/stack-trace.vue'

Vue.component('stack-trace', StackTrace)

window.app = new Vue({
	el: "#app"
})
