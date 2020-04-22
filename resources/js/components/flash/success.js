export default {
	name: 'flash-success',

	data: () => ({
		flash: true
	}),

	mounted() {
		setTimeout(() => this.flash = false, 5000)
	}
}
