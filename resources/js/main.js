import Vue from 'vue'
import './material-icons'
import 'vue-material-design-icons/styles.css'
import FlashSuccess from './components/flash/success.js'
import StackTrace from './components/exceptions/stack-trace.vue'

Vue.component('stack-trace', StackTrace)
Vue.component('flash-success', FlashSuccess)

window.app = new Vue({
	el: "#app"
})
