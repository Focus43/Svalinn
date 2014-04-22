$(document).foundation();


(function (site, $) {
	'use strict';

	site.config = {};
	site.ready = {
		init: function(){
			log('PAGE INIT');	
			
			site.home.init();
			//FINALIZE PAGE
			site.ready.finalize();
		},
		test: function(input){
			log(input);
		},
		finalize: function(){
			log('PAGE FINALIZE');
		}
	}
	site.home = {
		init: function(){
			site.home.introHeight();
			$( window ).resize(function(){
				site.home.introHeight();
			});
		},
		introHeight: function(){
			var minHeight = $('.masthead .gallery').height();
			$('.masthead .intro .column').height(minHeight);
		}
		
	}
	
	
}(window.site = window.site || {}, jQuery));

site.ready.init();