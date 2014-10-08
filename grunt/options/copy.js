module.exports = {

	config_local: {
		files: [{
			expand: true,
			flatten: true,
			src: ['src/config/env/local/config.php'],
			dest: 'config/'
		}]
	},
	wp_plugins: {
		files: [{
			expand: true,
			cwd: 'vendor/rossjha/wp-dev-repos/',
			src: ['plugins/**'],
			dest: 'public/content/'
		}]
	},
	all_themes: {
		files: [{
			expand: true,
			cwd: 'src/content/',
			src: ['themes/**'],
			dest: 'public/content/'
		}]
	},
	current_theme: {
		files: [{
			expand: true,
			cwd: 'src/content/themes/',
			src: ['<%= config.theme %>/**'],
			dest: 'public/content/themes/'
		}]
	},
	vendor_themes: {
		files: [{
			expand: true,
			cwd: 'vendor/rossjha/wp-dev-repos/',
			src: ['themes/**'],
			dest: 'public/content/'
		}]
	},
	img: {
		files: [{
			expand: true,
			cwd: 'src/content/themes/<%= config.theme %>/lib/',
			src: ['img/**'],
			dest: 'public/content/themes/<%= config.theme %>/lib/'
		}]
	},
	htaccess: {
		files: [{
			expand: true,
			cwd: 'src/',
			src: ['.htaccess'],
			dest: 'public/'
		}]
	}

};