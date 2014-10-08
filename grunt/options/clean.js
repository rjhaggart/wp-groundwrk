module.exports = {

	config: ['config/config.php'],
	all_themes: ['public/content/themes/'],
	current_theme: ['public/content/themes/<%= config.theme %>/'],
	img: ['public/content/themes/<%= config.theme %>/lib/img/'],
	scripts: ['public/content/themes/<%= config.theme %>/lib/js/']

};