//in case error
/*
 rm -r node_modules/
 rm package-lock.json
 npm cache clean -f
 npm install
 */

var mix = require('laravel-mix');
//require('laravel-elixir-replace');

//console.log(mix.Task);

mix.disableNotifications();

//console.log(mix);

var templatedir = "./wp-content/themes/downloadclub/";
var asset_path  = templatedir + 'assets/';

mix.setPublicPath(asset_path);


//console.log(asset_path);

//browser sync config
var appConfig = {
	"proxy": 'http://themeboxr.local'
};

mix.options({
	processCssUrls  : false,
	imgLoaderOptions: {
		enabled: false,
	}
});

var replacements = [
	['./images', '../images'],
];

mix.less(asset_path + 'less/style-default.less', asset_path + 'css/')
	.options({
		processCssUrls: false
	})
	.then(()=> {
		console.log('less compile done');
	})
	//.replace(asset_path + 'css/style-default.css', replacements)
	.styles([

	//asset_path + 'vendors/font-awesome5/css/all.min.css',
	asset_path + 'vendors/line-awesome/css/line-awesome-font-awesome.min.css',
	asset_path + 'vendors/bootstrap/css/bootstrap.min.css',
	asset_path + 'vendors/owl-carousel2/assets/owl.carousel.min.css',
	asset_path + 'vendors/owl-carousel2/assets/owl.theme.default.min.css',
	asset_path + 'vendors/magnific-popup/magnific-popup.css',
	asset_path + 'vendors/js-offcanvas/css/js-offcanvas.css',
	//asset_path + 'css/wordpress.css',
	//asset_path + 'css/woocommerce.css',
	asset_path + 'css/style-default.css'
], asset_path + 'css/downloadclub.css')
	.then(()=> {
		console.log('css compile done');
	})
	.combine([
		asset_path + 'vendors/modernizr/modernizr-custom.js',
		asset_path + 'vendors/bootstrap/js/bootstrap.bundle.js',
		asset_path + 'vendors/owl-carousel2/owl.carousel.js',
		asset_path + 'vendors/jquery-smooth-scroll/jquery.smooth-scroll.js',
		asset_path + 'vendors/magnific-popup/jquery.magnific-popup.js',
		asset_path + 'vendors/js-offcanvas/js/js-offcanvas.pkgd.min.js',
		asset_path + 'js/theme-main.js'
	], asset_path + 'js/downloadclub.js')
	.then(()=> {
		console.log('js compile done');
	})
	.version(
		[
			asset_path + 'js/downloadclub.js',
			asset_path + 'css/downloadclub.css'
		])
	.then(()=> {
		console.log('version done');
	})
	.browserSync({proxy: appConfig.proxy})