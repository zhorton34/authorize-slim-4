import Vue from 'vue'
import camelCase from 'lodash/camelCase'
import upperFirst from 'lodash/upperFirst'

const requireMaterialIcon = require.context('vue-material-design-icons', false, /[\w-]+\.vue$/)

requireMaterialIcon.keys().forEach(name => {
	const instance = requireMaterialIcon(name)

	const element = upperFirst(
		camelCase(name.replace(/^\. \//, '')).replace(/\, \w+$/, '').replace('Vue', 'Icon')
	)

	Vue.component(element, instance.default || instance)
})
