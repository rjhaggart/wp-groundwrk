
module.exports = {

	install: {
		options: {
			targetDir: 'src/content/themes/<%= config.theme %>/lib/vendors/',
			layout: 'byComponent',
			install: true,
			cleanTargetDir: true,
			cleanBowerDir: true,
		}
	}

};