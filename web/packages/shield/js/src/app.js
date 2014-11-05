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
var curr_callout = '';
var callout_target = '';
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
			
			//
			site.footer_nav.init();
			//
			site.navigation.init();
			
			if (!Modernizr.svg) {
			    var imgs = document.getElementsByTagName('img');
			    var svgExtension = /.*\.svg$/
			    var l = imgs.length;
			    for(var i = 0; i < l; i++) {
			        if(imgs[i].src.match(svgExtension)) {
			            imgs[i].src = imgs[i].src.slice(0, -3) + 'png';
			            console.log(imgs[i].src);
			        }
			    }
			}
			
		},
		finalize: function(){
			log('PAGE FINALIZE');
		}
	}
	site.home = {
		init: function(){
			log('HOME INIT');		
			//INSTAGRAM FEED
		    //feed.run();
	    
		}
		
	},
	site.navigation = {
		init: function(){
			if( !$('body').hasClass('home') && $(window).width() > 1025){
				$(window).bind('scroll',this.scrollListener);
				
			}
		},
		scrollListener: function(){
			var threshold = $(window).height() * .33;
			//log('threshold: '+threshold);
			if($(window).scrollTop() > threshold){
				$('.primary-nav-container').css({background:'rgba(20, 42, 56, 1.0)'});
			}else{
				$('.primary-nav-container').css({background:'rgba(20, 42, 56, 0.75)'});
			}
		}
	}
	site.footer_nav = {
		init: function(){
			$('.footer-nav .callout').addClass('hide');
			$('.footer-nav a').click(function(e){
				e.preventDefault();
				log('click');
				callout_target = '#callout-'+$(this).data('target');
				if( curr_callout != callout_target ){
					site.footer_nav.openCallout(callout_target);
					log(this);			
				}else{
					site.footer_nav.closeCallout();
					
				}
				
			});
			if( !WURFL.is_mobile && !WURFL.is_tablet ){
				$(window).bind('scroll',this.scrollListener);
			}
		},
		openCallout: function(callout_target){
			$('.callouts').removeClass('closed');
			$(curr_callout).addClass('hide');
			$(callout_target).removeClass('hide');
				
			curr_callout = callout_target;
		},
		closeCallout: function(){
			$('.callouts').addClass('closed');
			$('.callout').addClass('hide');
			$(callout_target).removeClass('hide');
			
			curr_callout = '';
		},
		scrollListener: function(){
			var docHeight = $(document).height()-$(window).height();
			var offset = docHeight - $('.footer').outerHeight();
			//log( $(window).scrollTop() + ' / ' + offset);
			
			if( $('.footer-nav').isFixed() ){
				$('.callouts').addClass('closed');
			}
			
			if($(window).scrollTop() >= offset && $('.footer-nav').isFixed() ){
				log('time to detach');
				if( $('.callouts').hasClass('closed') ){
					
					$('.footer-nav').css('position','relative');
				}
			}else if( offset > $(window).scrollTop() && !$('.footer-nav').isFixed() ){
				log('time to attach');
				if( $('.callouts').hasClass('closed') ){
					
					$('.footer-nav').css('position','fixed');
					
				}else if( (offset-400) > $(window).scrollTop() && !$('.callouts').hasClass('closed') ){
					
					$('.callouts').addClass('closed');
					setTimeout(function(){
						$('.footer-nav').css('position','fixed');
					}, 500);
				
				}	
			}
		}
	}	
	
}(window.site = window.site || {}, jQuery));
site.ready.init();


/*********************************************
EXTENDED HELP FUNCTIONS
*********************************************/
$(document).ready(function(){
	$.fn.extend({
		isFixed: function() {
			var $element = $(this);
			var $checkElements = $element.add($element.parents());
			var isFixed = false;
			$checkElements.each(function(){
				if ($(this).css("position") === "fixed") {
					isFixed = true;
					return false;
				}
			});
			return isFixed;
	   	}
	});
});

	