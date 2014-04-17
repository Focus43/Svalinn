(function (debug, $) {
	'use strict';

	debug.config = {
		baselineAdjust: -10,
		gridColumns: 6,
		lineHeight: function () {
			var value = $('body').css('line-height');
			return (value.indexOf('px') > -1) ? value.replace('px', '') : value * sb.rwd.fontSize;
		}
	};

	debug.controls = {
		init: function(){
			var $controls = $('<div id="debug-controls">GRID</div>').click(function(){
				console.log('click');
				if($('#debug-baseline').length != 0){
					$(debug.baseline.off);
				}else{
					$(debug.baseline.on);
				}
			}).appendTo('body');
		}
	}

	debug.baseline = {
		off: function () {
			$('#debug-baseline').remove();
		},

		on: function () {
			var config = debug.config,
				baselineLength = $(document).height()/5,
				i,
				output = [];
			console.log($(document).height());
			for (i = 0; i <= baselineLength; i++) {
				output.push('<li></li>');
			}

			$('body').append('<ol id="debug-baseline">' + output.join('') + '</ol>');
		}
	};
	
	
}(window.debug = window.debug || {}, jQuery));
$(debug.controls.init);