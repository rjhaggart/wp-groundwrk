function loadConfig(path) {

    var glob = require('glob');

    var object = {};
    var key;

    glob.sync('*', {
        cwd: path
    }).forEach(function(option) {
        key = option.replace(/\.js$/, '');
        object[key] = require(path + option);
    });

    return object;

}

module.exports = function(grunt) {

    var config = {
        pkg: grunt.file.readJSON('package.json'),
        config: grunt.file.readJSON('grunt/config.json')
    };

    require('load-grunt-tasks')(grunt);

    grunt.util._.extend(config, loadConfig('./grunt/options/'));

    grunt.initConfig(config);

    // Tasks //////////////////////////////////////////////////////////////////

    // WordPress Setup //////////////////////////

    grunt.registerTask('styles', ['bower', 'less:theme']);

    grunt.registerTask('img', ['clean:img', 'copy:img', 'imagemin']);

    grunt.registerTask('scripts', ['clean:scripts', 'concat:scripts', 'rename:jrespond']);

    /////////////////////////////////////////////

    grunt.registerTask('all_themes', ['styles', 'clean:all_themes', 'copy:vendor_themes', 'copy:all_themes', 'scripts', 'uglify', 'img', 'copy:htaccess']);

    grunt.registerTask('setup', ['remove:wp_assets', 'composer:update', 'copy:wp_plugins', 'all_themes']);

    grunt.registerTask('config_local', ['copy:config_local']);

	/////////////////////////////////////////////

    grunt.registerTask('default', ['less:theme', 'clean:current_theme', 'copy:current_theme', 'scripts', 'uglify', 'img', 'copy:htaccess']);
    
};