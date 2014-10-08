module.exports = {

    compile: {
        options: {
            mainConfigFile: 'src/content/themes/<%= config.theme %>/lib/js/build.js',
            out: 'public/content/themes/<%= config.theme %>lib/js/main.js',
            name: 'build',
            preserveLicenseComments: false,
            paths: {
                'jquery': 'empty:',
                'bootstrap': 'empty:'
            }
        }
    }

};