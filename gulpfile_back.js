//help https://scotch.io/tutorials/using-laravel-mix-with-webpack-for-all-your-assets

process.env.DISABLE_NOTIFIER = true;

var elixir = require('laravel-elixir'); // Require Elixier

var templatedir = "./wp-content/themes/downloadclub/";
var asset_path = templatedir + 'assets/';


elixir.config.assetsPath = asset_path;
elixir.config.publicPath = asset_path;

//browser sync config
var appConfig = {
	"proxy": 'http://themeboxr.local'
};



elixir((mix) => {
	mix.less(asset_path + 'less/style-default.less', asset_path+'css/style-default.css')
	.styles([
		asset_path + 'vendors/js-offcanvas/css/js-offcanvas.css',
		//asset_path + 'vendors/font-awesome5/css/all.min.css',
		asset_path + 'vendors/line-awesome/css/line-awesome-font-awesome.min.css',
		asset_path + 'vendors/bootstrap/css/bootstrap.min.css',
		asset_path + 'vendors/owl-carousel2/assets/owl.carousel.min.css',
		asset_path + 'vendors/owl-carousel2/assets/owl.theme.default.min.css',
		asset_path + 'vendors/magnific-popup/magnific-popup.css',
		//asset_path + 'css/wordpress.css',
		//asset_path + 'css/woocommerce.css',
		asset_path + 'css/style-default.css'
	], asset_path + 'css/downloadclub.css')
	.scripts([
		asset_path + 'vendors/modernizr/modernizr-custom.js',
		asset_path + 'vendors/bootstrap/js/bootstrap.bundle.min.js',
		asset_path + 'vendors/owl-carousel2/owl.carousel.min.js',
		asset_path + 'vendors/jquery-smooth-scroll/jquery.smooth-scroll.min.js',
		asset_path + 'vendors/magnific-popup/jquery.magnific-popup.min.js',
		//asset_path + 'js/skip-link-focus-fix.js',
		asset_path + 'vendors/js-offcanvas/js/js-offcanvas.pkgd.min.js',
		asset_path + 'js/theme-main.js'
	], asset_path + 'js/downloadclub.js')
	.browserSync({proxy          : appConfig.proxy })
});
