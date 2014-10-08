module.exports = {

    options: {
        livereload: true
    },
    jshint: {
        files: ['src/content/themes/<%= config.theme %>/lib/js/*.js'],
        tasks: ['jshint']
    },
    assets: {
        files: ['src/content/themes/<%= config.theme %>/**/*.{less,js,json,mst,php,twig}'],
        tasks: ['default']
    },
    imagemin: {
        files: ['src/content/themes/<%= config.theme %>/**/*.{png,jpg,gif}'],
        tasks: ['img']
    }

};