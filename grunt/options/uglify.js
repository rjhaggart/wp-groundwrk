
module.exports = {

	vendors: {
		options:{
			mangle: false
		},
		files: [{
			expand: true,
			cwd: 'public/content/themes/<%= config.theme %>/lib/vendors',
			src: '**/*.js',
			dest: 'public/content/themes/<%= config.theme %>/lib/vendors'
		}]
	},
	scripts: {
		options:{
			mangle: false
		},
		files: [{
			expand: true,
			cwd: 'public/content/themes/<%= config.theme %>/lib/js',
			src: '**/*.js',
			dest: 'public/content/themes/<%= config.theme %>/js'
		}]
	}

};