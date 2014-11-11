$(document).ready(function(){
	var scrollInt = 0;
	var scrollTotal = 5;
	var scrollMoving = false;
	

	
	/*********************************************
	HOMEPAGE SCROLL
	*********************************************/
	//CLICK
	$('.scroll-down a').click(function(e){
		e.preventDefault();
		var new_top = $(window).height();
		if( $(this).hasClass('down') ){
			newInt = scrollInt+1;
		}
		if( $(this).hasClass('up') ){
			newInt = scrollInt-1;
		}
		//log( 'CLICK TO INT: '+scrollInt );
		scrollMoving = true;
		$("html, body").animate({ scrollTop: newInt*new_top},750,'easeOutCirc',function(){
			scrollMoving = false;
		});
	});
	//TRACK
	function trackScroll(){
		$('article:in-viewport, blockquote:in-viewport').each(function() {
			scrollInt = $(this).data('int');
			//log( 'INT: '+scrollInt );
			$(this).find('.bg-image').css({
				'-webkit-transform':'translate3d(0px, 0px, 0px) scale(1.05,1.05)',
				'-webkit-transition-delay': '2000ms',
				'-webkit-transition': 'all 5000ms'
			});
	
		});
		$('article:above-the-top, article:below-the-fold, blockquote:below-the-fold').each(function() {
			$(this).find('.bg-image').css({
				'-webkit-transform':'translate3d(0px, 0px, 0px) scale(1.0,1.0)',
				'-webkit-transition-delay': '2000ms',
				'-webkit-transition': 'all 5000ms'
			});
	
		});
		if( !WURFL.is_mobile ){
			//CONTROLS
			//log($(window).scrollTop() +'>'+ $(window).height());
			if($(window).scrollTop() > 100){
				$('.scroll-down').removeClass('down-only');
			}else{
				$('.scroll-down').addClass('down-only');
			}
			//scrollReposition();
		}
	}
	//REPOSITION
	function scrollReposition(){
		if(scrollMoving == false){
			clearTimeout($.data(this, 'scrollTimer'));
		    $.data(this, 'scrollTimer', setTimeout(function() {
		        // do something
		        scrollMoving == true;
		        var new_top = $(window).height();
		        $("html:animated, body:animated").stop( true, true );
		        $("html, body").not(':animated').animate(
			        {scrollTop: scrollInt*new_top},
			        750,
			        'easeOutCirc',
			        function(){
				        //log('end:'+Math.random());
				        scrollMoving == false;
			        }
		        );
		        
		    }, 500));
	    }
    }
	
	//AUTOMATE
	/*
	setInterval(function(){
		scrollInt++;
		current_top = $(document).scrollTop();
		new_top = $(window).height();
		log(current_top+'/'+new_top);
		$("html, body").animate({ scrollTop: scrollInt*new_top}, 500);
	}, 6000);
	*/
	
	/*********************************************
	HOMEPAGE RESIZE
	*********************************************/
	function setFull(){
		if( $(window).width() > 1100 ){
			$('.full').height( $(window).height() );
			$('.scroll-down').css('margin-top', $(window).height()*0.9 );
		}else{
			$('.full').height('auto');
			$('.scroll-down').css('margin-top', '-10%');
		}
		
	}
	
	/*********************************************
	INITALIZE
	*********************************************/
	//IMPLEMENT SCROLLER
	$(window).bind('scroll', trackScroll);
	//IMPLEMENT FULL HEIGHT
	setFull();
	//IMPLEMENT RESIZE
	if( !WURFL.is_mobile ){
		$(window).resize(function(){
			setFull();
			//scrollReposition();
		});
	}
	
	
	/*********************************************
	MOBILE/TABLET EXPERIENCE
	*********************************************/
	$('article .inner a.down').click(function(e){
		e.preventDefault();
		var new_top = $(window).height() + $('.header').height();
		newInt = $(this).data('int');
		scrollMoving = true;
		$("html, body").animate({ scrollTop: newInt*new_top},750,'easeOutCirc',function(){
			scrollMoving = false;
		});
	});
	if( WURFL.is_mobile && WURFL.form_factor == "Tablet" ){
		$('article .bg-image').height( ($(window).height()*0.6)+60 );
		$('article .block').height( ($(window).height()*0.4)+60);
		$('article .bg-image').css({'background-position':'50% 0'});
		$('blockquote, blockquote .bg-image,blockquote .quote_gallery').height( $(window).height() - $('.footer').height() );
		//ADJUST INTRO FOR NAV HEIGHT
		$('.article-0 .bg-image').height( ($(window).height()*0.6) - $('.header').height() );
	}

});