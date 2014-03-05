// usage: log('inside coolFunc',this,arguments);
// http://paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
window.log=function(){log.history=log.history||[];log.history.push(arguments);if(this.console){console.log(Array.prototype.slice.call(arguments))}};

// ussage $('#fb').FBCount('facebook_page_name');
// https://github.com/jasonjgeiger/minimalFBcount
(function(e){e.fn.FBCount=function(t){var n=e(this);var r=e.ajax("https://graph.facebook.com/"+t).done(function(r){var s=i(r.likes);var o=e('<div class="fbc" id="'+t+'"><div class="fbc-logo"><span></span><img src="_/img/fb_count.png"/></div><div class="fbc-like">Like</div><div class="fbc-slide"><div class="fbc-count">'+s+'</div><div class="fbc-arrow">&#11015;</div></div></div>');var u=n.replaceWith(o);e("#"+t).click(function(){window.open("http://facebook.com/"+t,"_blank")})});var i=function(e){if(e<1e3)return Math.round(e*10)/10;e=e/1e3;if(e<1e3)return Math.round(e*10)/10+"k";e=e/1e3;return Math.round(e*10)/10+"m"}}})(jQuery);
