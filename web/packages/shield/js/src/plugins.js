/* consolelog
   usage: log('inside coolFunc',this,arguments);
   http://paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
*/
window.log=function(){log.history=log.history||[];log.history.push(arguments);if(this.console){console.log(Array.prototype.slice.call(arguments))}};

/* minimalFBcount
   ussage $('#fb').FBCount('facebook_page_name');
   https://github.com/jasonjgeiger/minimalFBcount
*/
;(function(e){e.fn.FBCount=function(t){var n=e(this);var r=e.ajax("https://graph.facebook.com/"+t).done(function(r){var s=i(r.likes);var o=e('<div class="fbc" id="'+t+'"><div class="fbc-logo"><span></span><img src="_/img/fb_count.png"/></div><div class="fbc-like">Like</div><div class="fbc-slide"><div class="fbc-count">'+s+'</div><div class="fbc-arrow">&#11015;</div></div></div>');var u=n.replaceWith(o);e("#"+t).click(function(){window.open("http://facebook.com/"+t,"_blank")})});var i=function(e){if(e<1e3)return Math.round(e*10)/10;e=e/1e3;if(e<1e3)return Math.round(e*10)/10+"k";e=e/1e3;return Math.round(e*10)/10+"m"}}})(jQuery);
/* FitVids 1.0.3 
	
*/
;(function(e){"use strict";e.fn.fitVids=function(t){var n={customSelector:null};if(!document.getElementById("fit-vids-style")){var r=document.createElement("div"),i=document.getElementsByTagName("base")[0]||document.getElementsByTagName("script")[0],s="&shy;<style>.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}</style>";r.className="fit-vids-style";r.id="fit-vids-style";r.style.display="none";r.innerHTML=s;i.parentNode.insertBefore(r,i)}if(t){e.extend(n,t)}return this.each(function(){var t=["iframe[src*='player.vimeo.com']","iframe[src*='youtube.com']","iframe[src*='youtube-nocookie.com']","iframe[src*='kickstarter.com'][src*='video.html']","object","embed"];if(n.customSelector){t.push(n.customSelector)}var r=e(this).find(t.join(","));r=r.not("object object");r.each(function(){var t=e(this);if(this.tagName.toLowerCase()==="embed"&&t.parent("object").length||t.parent(".fluid-width-video-wrapper").length){return}var n=this.tagName.toLowerCase()==="object"||t.attr("height")&&!isNaN(parseInt(t.attr("height"),10))?parseInt(t.attr("height"),10):t.height(),r=!isNaN(parseInt(t.attr("width"),10))?parseInt(t.attr("width"),10):t.width(),i=n/r;if(!t.attr("id")){var s="fitvid"+Math.floor(Math.random()*999999);t.attr("id",s)}t.wrap('<div class="fluid-width-video-wrapper"></div>').parent(".fluid-width-video-wrapper").css("padding-top",i*100+"%");t.removeAttr("height").removeAttr("width")})})}})(window.jQuery||window.Zepto);