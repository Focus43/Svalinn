//INIT FOUNDATION
$(document).foundation();

//INIT SITE
(function (site, $) {
	'use strict';

	site.config = {};
	site.ready = {
		init: function(){
			
			//LOAD HOMEPAGE
			if( $('body').hasClass('home') ) site.home.init();
			
			//FINALIZE PAGE
			this.finalize();
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
			log('HOME INIT');
			$(".upper").fitVids();			
		}
	}
	
}(window.site = window.site || {}, jQuery));
site.ready.init();