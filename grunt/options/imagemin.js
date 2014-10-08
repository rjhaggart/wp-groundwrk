module.exports = {

    media: {
        files: [{
            expand: true,
            cwd: 'public/content/themes/<%= config.theme %>/lib/img',
            src: ['**/*.{png,jpg,gif}'],
            dest: 'public/content/themes/<%= config.theme %>/lib/img'
        }]
    }

};