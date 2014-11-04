$(document).ready(function(){
	var scrollInt = 0;
	

	/*********************************************
	HOMEPAGE SCROLL
	*********************************************/
	var scrollInt = 0;
	var scrollTotal = 5;
	var scrollMoving = false;
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
		console.log( 'CLICK TO INT: '+scrollInt );
		scrollMoving = true;
		$("html, body").animate({ scrollTop: newInt*new_top},750,'easeOutCirc',function(){
			scrollMoving = false;
		});
	});
	//TRACK
	function trackScroll(){
		$('article:in-viewport, blockquote:in-viewport').each(function() {
			scrollInt = $(this).data('int');
			//console.log( 'INT: '+scrollInt );
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
		
		//CONTROLS
		if(scrollInt > 0){
			$('.scroll-down').removeClass('down-only');
		}
		scrollReposition();
		
	}
	if($(window).width() > 1025){
		$(window).bind('scroll', trackScroll);
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
				        console.log('end:'+Math.random());
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
		console.log(current_top+'/'+new_top);
		$("html, body").animate({ scrollTop: scrollInt*new_top}, 500);
	}, 6000);
	*/
	/*********************************************
	HOMEPAGE RESIZE
	*********************************************/
	setFull();
	
	$(window).resize(function(){
		setFull();
		scrollReposition();
	});
	function setFull(){
		if( $(window).width() > 1100 ){
			$('.full').height( $(window).height() );
			$('.scroll-down').css('margin-top', $(window).height()*0.9 );
		}else{
			$('.full').height('auto');
			$('.scroll-down').css('margin-top', '-10%');
		}
		
	}
	
	
	
	

});