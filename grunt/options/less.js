module.exports = {

    theme: {
        options: {
        	cleancss: true,
            rootpath: '',
            paths: ['src/content/themes/<%= config.theme %>/lib/vendors/bootstrap/less'],
            sourceMap: true,
            sourceMapFilename: 'src/content/themes/<%= config.theme %>/lib/css/style.map',
            sourceMapRootpath: '/',
            outputSourceFiles: true
        },
        files: {
			'src/content/themes/<%= config.theme %>/lib/css/style.css': 'src/content/themes/<%= config.theme %>/lib/less/style.less'
        }
    }

};