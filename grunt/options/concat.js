
module.exports = {

	bootstrap_js: {
		src: 'vendors/bootstrap/js/**.js',
		dest: 'dist/<%= config.media %>/vendors/bootstrap/js/bootstrap.js'
	},
	scripts: {
		src: 'src/content/themes/<%= config.theme %>/lib/js/**.js',
		dest: 'public/content/themes/<%= config.theme %>/lib/js/main.js'
	}

};