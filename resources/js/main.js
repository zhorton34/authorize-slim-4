import Vue from 'vue'

import Register from '@Component/auth/register.js'

Vue.component('register', Register)

window.app = new Vue({
	el: '#app'
});
