module.exports = {
	paths: {
		project: './',
		css: {
			entry: './assets/css/app/app.scss',
			all: './assets/css/app/**/*.scss',
      dest: './assets/css'
		},
		js: {
			entry: './assets/js/app/app.js',
      vendor: './assets/js/vendor/*.js',
      dest: './assets/js',
      all: './assets/js/**/*.js'
		},
		favicon: {
			entry: './assets/imgs/favicons/favicon.png',
			dest: './assets/imgs/favicons',
			all: './assets/imgs/favicons/**/*'
		}
	},
	names: {
		css: 'app.min.css',
		js: {
			app: 'app.min.js',
      vendor: 'vendor.min.js'
		}
	}
};
