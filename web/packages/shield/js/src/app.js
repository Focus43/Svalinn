//INIT FOUNDATION
$(document).foundation();

//INSTAFEED
var feed = new Instafeed({
    get: 'user',
    userId: 1010023792,
	accessToken: '15543433.8310515.b229fa1e1d4042bd9cf5c0f996683ef2',
    target: 'instagram_feed',
    resolution: 'low_resolution',
    limit: 30,
    sortBy: 'random',
    template: '<li><a href="{{link}}" target="_blank"><img src="{{image}}" /></a></li>',
    after: function(){
    	$('.source').css('background','#FFFFFF');
	    $('#instagram_feed').simplyScroll({
		    autoMode:'loop',
		    speed:1,
		    pauseOnHover:false
		});
    }
});


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
			//INSTAGRAM FEED
		    feed.run();
		    	
		}
	}
	
}(window.site = window.site || {}, jQuery));
site.ready.init();