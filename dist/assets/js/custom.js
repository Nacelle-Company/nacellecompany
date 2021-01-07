/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 20);
/******/ })
/************************************************************************/
/******/ ({

/***/ 0:
/***/ (function(module, exports) {

module.exports = jQuery;

/***/ }),

/***/ 10:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var _jquery = __webpack_require__(0);

var _jquery2 = _interopRequireDefault(_jquery);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

function _toConsumableArray(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } else { return Array.from(arr); } }

// category hover
(0, _jquery2.default)(function () {

	(0, _jquery2.default)('[data-callout-hover-reveal]').hover(function () {
		(0, _jquery2.default)(this).find('.callout-footer').slideDown(250);
	}, function () {
		(0, _jquery2.default)(this).find('.callout-footer').slideUp(250);
	});

	// // // // // //
	// scroll to top
	// // // // // //

	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,

	//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
	offset_opacity = 1200,

	//duration of the top scrolling animation (in ms)
	scroll_top_duration = 700,

	//grab the "back to top" link
	$back_to_top = (0, _jquery2.default)('.to-top');

	//hide or show the "back to top" link
	(0, _jquery2.default)(window).scroll(function () {
		(0, _jquery2.default)(this).scrollTop() > offset ? $back_to_top.addClass('to-top-visible') : $back_to_top.removeClass('to-top-visible to-top-fade-out');
		if ((0, _jquery2.default)(this).scrollTop() > offset_opacity) {
			$back_to_top.addClass('to-top-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function (event) {
		event.preventDefault();
		(0, _jquery2.default)('body,html').animate({
			scrollTop: 0
		}, scroll_top_duration);
	});
});

(0, _jquery2.default)('.tabs-title').on("mouseover", function () {

	var $this = this;

	var tab_id = (0, _jquery2.default)($this).find('a').attr('href');

	// https://stackoverflow.com/a/6672579
	(0, _jquery2.default)($this).addClass('is-active') //set the current as active
	.siblings("li") //find sibling h3 elements
	.removeClass("is-active"); // and remove the active from them

	(0, _jquery2.default)(".tabs-content .tabs-panel").siblings().hide();

	(0, _jquery2.default)(".tabs-content .tabs-panel" + tab_id).show();
});

// wordpress video
// https://cfxdesign.com/how-to-make-the-wordpress-video-shortcode-responsive/
(0, _jquery2.default)(function () {
	(0, _jquery2.default)('.mejs-overlay-loading').closest('.mejs-overlay').addClass('load'); //just a helper class

	var $video = (0, _jquery2.default)('div.video video');
	var vidWidth = $video.attr('width');
	var vidHeight = $video.attr('height');

	(0, _jquery2.default)(window).resize(function () {
		var targetWidth = (0, _jquery2.default)(this).width(); //using window width here will proportion the video to be full screen; adjust as needed
		(0, _jquery2.default)('div.video, div.video .mejs-container').css('height', Math.ceil(vidHeight * (targetWidth / vidWidth)));
	}).resize();
});

// toggle button
(0, _jquery2.default)('[data-mobile-app-toggle] .button').click(function () {
	(0, _jquery2.default)(this).siblings().removeClass('is-active');
	(0, _jquery2.default)(this).addClass('is-active');
});

// toggle catalog buttons
(0, _jquery2.default)('[data-mobile-app-toggle] .watch').click(function () {
	(0, _jquery2.default)(this).parent().toggleClass('is-displayed');
	// $(this).addClass('is-active');
});

// https://css-tricks.com/a-lightweight-masonry-solution/
// https://codepen.io/thebabydino/pen/BajGQgQ
// main talent catalog-masonry.php grid
var grids = [].concat(_toConsumableArray(document.querySelectorAll('.grid--masonry')));

if (grids.length && getComputedStyle(grids[0]).gridTemplateRows !== 'masonry') {
	var layout = function layout() {
		grids.forEach(function (grid) {
			/* get the post relayout number of columns */
			var ncol = getComputedStyle(grid._el).gridTemplateColumns.split(' ').length;

			/* if the number of columns has changed */
			if (grid.ncol !== ncol) {
				/* update number of columns */
				grid.ncol = ncol;

				/* revert to initial positioning, no margin */
				grid.items.forEach(function (c) {
					return c.style.removeProperty('margin-top');
				});

				/* if we have more than one column */
				if (grid.ncol > 1) {
					grid.items.slice(ncol).forEach(function (c, i) {
						var prev_fin = grid.items[i].getBoundingClientRect().bottom /* bottom edge of item above */
						,
						    curr_ini = c.getBoundingClientRect().top /* top edge of current item */;

						c.style.marginTop = prev_fin + grid.gap - curr_ini + 'px';
					});
				}
			}
		});
	};

	grids = grids.map(function (grid) {
		return {
			_el: grid,
			gap: parseFloat(getComputedStyle(grid).gridRowGap),
			items: [].concat(_toConsumableArray(grid.childNodes)).filter(function (c) {
				return c.nodeType === 1;
			}),
			ncol: 0
		};
	});

	addEventListener('load', function (e) {
		layout(); /* initial load */
		addEventListener('resize', layout, false); /* on resize */
	}, false);
}

/***/ }),

/***/ 20:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(10);


/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAgNDQ3OTliNjVhMTlkMjRiNzZiNWMiLCJ3ZWJwYWNrOi8vL2V4dGVybmFsIFwialF1ZXJ5XCIiLCJ3ZWJwYWNrOi8vLy4vc3JjL2Fzc2V0cy9qcy9saWIvY3VzdG9tLmpzIl0sIm5hbWVzIjpbImhvdmVyIiwiZmluZCIsInNsaWRlRG93biIsInNsaWRlVXAiLCJvZmZzZXQiLCJvZmZzZXRfb3BhY2l0eSIsInNjcm9sbF90b3BfZHVyYXRpb24iLCIkYmFja190b190b3AiLCJ3aW5kb3ciLCJzY3JvbGwiLCJzY3JvbGxUb3AiLCJhZGRDbGFzcyIsInJlbW92ZUNsYXNzIiwib24iLCJldmVudCIsInByZXZlbnREZWZhdWx0IiwiYW5pbWF0ZSIsIiR0aGlzIiwidGFiX2lkIiwiYXR0ciIsInNpYmxpbmdzIiwiaGlkZSIsInNob3ciLCJjbG9zZXN0IiwiJHZpZGVvIiwidmlkV2lkdGgiLCJ2aWRIZWlnaHQiLCJyZXNpemUiLCJ0YXJnZXRXaWR0aCIsIndpZHRoIiwiY3NzIiwiTWF0aCIsImNlaWwiLCJjbGljayIsInBhcmVudCIsInRvZ2dsZUNsYXNzIiwiZ3JpZHMiLCJkb2N1bWVudCIsInF1ZXJ5U2VsZWN0b3JBbGwiLCJsZW5ndGgiLCJnZXRDb21wdXRlZFN0eWxlIiwiZ3JpZFRlbXBsYXRlUm93cyIsImxheW91dCIsImZvckVhY2giLCJuY29sIiwiZ3JpZCIsIl9lbCIsImdyaWRUZW1wbGF0ZUNvbHVtbnMiLCJzcGxpdCIsIml0ZW1zIiwiYyIsInN0eWxlIiwicmVtb3ZlUHJvcGVydHkiLCJzbGljZSIsImkiLCJwcmV2X2ZpbiIsImdldEJvdW5kaW5nQ2xpZW50UmVjdCIsImJvdHRvbSIsImN1cnJfaW5pIiwidG9wIiwibWFyZ2luVG9wIiwiZ2FwIiwibWFwIiwicGFyc2VGbG9hdCIsImdyaWRSb3dHYXAiLCJjaGlsZE5vZGVzIiwiZmlsdGVyIiwibm9kZVR5cGUiLCJhZGRFdmVudExpc3RlbmVyIl0sIm1h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QixZQUF2QixDQUFMO0FBQUEsS0FBbkI7O0FBRUE7QUFDQSxRQUFJUCxLQUFLRCxJQUFMLEdBQVksQ0FBaEIsRUFBbUI7QUFDbEJDLFVBQUtJLEtBQUwsQ0FBV0ksS0FBWCxDQUFpQlQsSUFBakIsRUFBdUJELE9BQXZCLENBQStCLFVBQUNPLENBQUQsRUFBSUksQ0FBSixFQUFVO0FBQ3hDLFVBQUlDLFdBQVdWLEtBQUtJLEtBQUwsQ0FBV0ssQ0FBWCxFQUFjRSxxQkFBZCxHQUFzQ0MsTUFBckQsQ0FBNEQ7QUFBNUQ7QUFBQSxVQUNDQyxXQUFXUixFQUFFTSxxQkFBRixHQUEwQkcsR0FEdEMsQ0FDMEMsOEJBRDFDOztBQUdBVCxRQUFFQyxLQUFGLENBQVFTLFNBQVIsR0FBdUJMLFdBQVdWLEtBQUtnQixHQUFoQixHQUFzQkgsUUFBN0M7QUFDQSxNQUxEO0FBTUE7QUFDRDtBQUNELEdBdEJEO0FBdUJBLEVBaEM2RTs7QUFDOUV0QixTQUFRQSxNQUFNMEIsR0FBTixDQUFVO0FBQUEsU0FBUztBQUMxQmhCLFFBQUtELElBRHFCO0FBRTFCZ0IsUUFBS0UsV0FBV3ZCLGlCQUFpQkssSUFBakIsRUFBdUJtQixVQUFsQyxDQUZxQjtBQUcxQmYsVUFBTyw2QkFBSUosS0FBS29CLFVBQVQsR0FBcUJDLE1BQXJCLENBQTRCO0FBQUEsV0FBS2hCLEVBQUVpQixRQUFGLEtBQWUsQ0FBcEI7QUFBQSxJQUE1QixDQUhtQjtBQUkxQnZCLFNBQU07QUFKb0IsR0FBVDtBQUFBLEVBQVYsQ0FBUjs7QUFpQ0F3QixrQkFBaUIsTUFBakIsRUFBeUIsYUFBSztBQUM3QjFCLFdBRDZCLENBQ25CO0FBQ1YwQixtQkFBaUIsUUFBakIsRUFBMkIxQixNQUEzQixFQUFtQyxLQUFuQyxFQUY2QixDQUVhO0FBQzFDLEVBSEQsRUFHRyxLQUhIO0FBSUEsQyIsImZpbGUiOiJjdXN0b20uanMiLCJzb3VyY2VzQ29udGVudCI6WyIgXHQvLyBUaGUgbW9kdWxlIGNhY2hlXG4gXHR2YXIgaW5zdGFsbGVkTW9kdWxlcyA9IHt9O1xuXG4gXHQvLyBUaGUgcmVxdWlyZSBmdW5jdGlvblxuIFx0ZnVuY3Rpb24gX193ZWJwYWNrX3JlcXVpcmVfXyhtb2R1bGVJZCkge1xuXG4gXHRcdC8vIENoZWNrIGlmIG1vZHVsZSBpcyBpbiBjYWNoZVxuIFx0XHRpZihpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSkge1xuIFx0XHRcdHJldHVybiBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXS5leHBvcnRzO1xuIFx0XHR9XG4gXHRcdC8vIENyZWF0ZSBhIG5ldyBtb2R1bGUgKGFuZCBwdXQgaXQgaW50byB0aGUgY2FjaGUpXG4gXHRcdHZhciBtb2R1bGUgPSBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSA9IHtcbiBcdFx0XHRpOiBtb2R1bGVJZCxcbiBcdFx0XHRsOiBmYWxzZSxcbiBcdFx0XHRleHBvcnRzOiB7fVxuIFx0XHR9O1xuXG4gXHRcdC8vIEV4ZWN1dGUgdGhlIG1vZHVsZSBmdW5jdGlvblxuIFx0XHRtb2R1bGVzW21vZHVsZUlkXS5jYWxsKG1vZHVsZS5leHBvcnRzLCBtb2R1bGUsIG1vZHVsZS5leHBvcnRzLCBfX3dlYnBhY2tfcmVxdWlyZV9fKTtcblxuIFx0XHQvLyBGbGFnIHRoZSBtb2R1bGUgYXMgbG9hZGVkXG4gXHRcdG1vZHVsZS5sID0gdHJ1ZTtcblxuIFx0XHQvLyBSZXR1cm4gdGhlIGV4cG9ydHMgb2YgdGhlIG1vZHVsZVxuIFx0XHRyZXR1cm4gbW9kdWxlLmV4cG9ydHM7XG4gXHR9XG5cblxuIFx0Ly8gZXhwb3NlIHRoZSBtb2R1bGVzIG9iamVjdCAoX193ZWJwYWNrX21vZHVsZXNfXylcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubSA9IG1vZHVsZXM7XG5cbiBcdC8vIGV4cG9zZSB0aGUgbW9kdWxlIGNhY2hlXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmMgPSBpbnN0YWxsZWRNb2R1bGVzO1xuXG4gXHQvLyBkZWZpbmUgZ2V0dGVyIGZ1bmN0aW9uIGZvciBoYXJtb255IGV4cG9ydHNcbiBcdF9fd2VicGFja19yZXF1aXJlX18uZCA9IGZ1bmN0aW9uKGV4cG9ydHMsIG5hbWUsIGdldHRlcikge1xuIFx0XHRpZighX193ZWJwYWNrX3JlcXVpcmVfXy5vKGV4cG9ydHMsIG5hbWUpKSB7XG4gXHRcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIG5hbWUsIHtcbiBcdFx0XHRcdGNvbmZpZ3VyYWJsZTogZmFsc2UsXG4gXHRcdFx0XHRlbnVtZXJhYmxlOiB0cnVlLFxuIFx0XHRcdFx0Z2V0OiBnZXR0ZXJcbiBcdFx0XHR9KTtcbiBcdFx0fVxuIFx0fTtcblxuIFx0Ly8gZ2V0RGVmYXVsdEV4cG9ydCBmdW5jdGlvbiBmb3IgY29tcGF0aWJpbGl0eSB3aXRoIG5vbi1oYXJtb255IG1vZHVsZXNcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubiA9IGZ1bmN0aW9uKG1vZHVsZSkge1xuIFx0XHR2YXIgZ2V0dGVyID0gbW9kdWxlICYmIG1vZHVsZS5fX2VzTW9kdWxlID9cbiBcdFx0XHRmdW5jdGlvbiBnZXREZWZhdWx0KCkgeyByZXR1cm4gbW9kdWxlWydkZWZhdWx0J107IH0gOlxuIFx0XHRcdGZ1bmN0aW9uIGdldE1vZHVsZUV4cG9ydHMoKSB7IHJldHVybiBtb2R1bGU7IH07XG4gXHRcdF9fd2VicGFja19yZXF1aXJlX18uZChnZXR0ZXIsICdhJywgZ2V0dGVyKTtcbiBcdFx0cmV0dXJuIGdldHRlcjtcbiBcdH07XG5cbiBcdC8vIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbFxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5vID0gZnVuY3Rpb24ob2JqZWN0LCBwcm9wZXJ0eSkgeyByZXR1cm4gT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG9iamVjdCwgcHJvcGVydHkpOyB9O1xuXG4gXHQvLyBfX3dlYnBhY2tfcHVibGljX3BhdGhfX1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5wID0gXCJcIjtcblxuIFx0Ly8gTG9hZCBlbnRyeSBtb2R1bGUgYW5kIHJldHVybiBleHBvcnRzXG4gXHRyZXR1cm4gX193ZWJwYWNrX3JlcXVpcmVfXyhfX3dlYnBhY2tfcmVxdWlyZV9fLnMgPSAyMCk7XG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gd2VicGFjay9ib290c3RyYXAgNDQ3OTliNjVhMTlkMjRiNzZiNWMiLCJtb2R1bGUuZXhwb3J0cyA9IGpRdWVyeTtcblxuXG4vLy8vLy8vLy8vLy8vLy8vLy9cbi8vIFdFQlBBQ0sgRk9PVEVSXG4vLyBleHRlcm5hbCBcImpRdWVyeVwiXG4vLyBtb2R1bGUgaWQgPSAwXG4vLyBtb2R1bGUgY2h1bmtzID0gMCAxIiwiaW1wb3J0ICQgZnJvbSAnanF1ZXJ5JztcblxuLy8gY2F0ZWdvcnkgaG92ZXJcbiQoZnVuY3Rpb24oKSB7XG5cblxuICAgICQoJ1tkYXRhLWNhbGxvdXQtaG92ZXItcmV2ZWFsXScpLmhvdmVyKGZ1bmN0aW9uKCkge1xuICAgICAgICAkKHRoaXMpLmZpbmQoJy5jYWxsb3V0LWZvb3RlcicpLnNsaWRlRG93bigyNTApO1xuICAgIH0sIGZ1bmN0aW9uKCkge1xuICAgICAgICAkKHRoaXMpLmZpbmQoJy5jYWxsb3V0LWZvb3RlcicpLnNsaWRlVXAoMjUwKTt9KTtcblxuICAgICAgLy8gLy8gLy8gLy8gLy8gLy9cbiAgICAgIC8vIHNjcm9sbCB0byB0b3BcbiAgICAgIC8vIC8vIC8vIC8vIC8vIC8vXG5cbiAgICBcdC8vIGJyb3dzZXIgd2luZG93IHNjcm9sbCAoaW4gcGl4ZWxzKSBhZnRlciB3aGljaCB0aGUgXCJiYWNrIHRvIHRvcFwiIGxpbmsgaXMgc2hvd25cbiAgICBcdHZhciBvZmZzZXQgPSAzMDAsXG4gICAgXHRcdC8vYnJvd3NlciB3aW5kb3cgc2Nyb2xsIChpbiBwaXhlbHMpIGFmdGVyIHdoaWNoIHRoZSBcImJhY2sgdG8gdG9wXCIgbGluayBvcGFjaXR5IGlzIHJlZHVjZWRcbiAgICBcdFx0b2Zmc2V0X29wYWNpdHkgPSAxMjAwLFxuICAgIFx0XHQvL2R1cmF0aW9uIG9mIHRoZSB0b3Agc2Nyb2xsaW5nIGFuaW1hdGlvbiAoaW4gbXMpXG4gICAgXHRcdHNjcm9sbF90b3BfZHVyYXRpb24gPSA3MDAsXG4gICAgXHRcdC8vZ3JhYiB0aGUgXCJiYWNrIHRvIHRvcFwiIGxpbmtcbiAgICBcdFx0JGJhY2tfdG9fdG9wID0gJCgnLnRvLXRvcCcpO1xuXG4gICAgXHQvL2hpZGUgb3Igc2hvdyB0aGUgXCJiYWNrIHRvIHRvcFwiIGxpbmtcbiAgICBcdCQod2luZG93KS5zY3JvbGwoZnVuY3Rpb24oKXtcbiAgICBcdFx0KCAkKHRoaXMpLnNjcm9sbFRvcCgpID4gb2Zmc2V0ICkgPyAkYmFja190b190b3AuYWRkQ2xhc3MoJ3RvLXRvcC12aXNpYmxlJykgOiAkYmFja190b190b3AucmVtb3ZlQ2xhc3MoJ3RvLXRvcC12aXNpYmxlIHRvLXRvcC1mYWRlLW91dCcpO1xuICAgIFx0XHRpZiggJCh0aGlzKS5zY3JvbGxUb3AoKSA+IG9mZnNldF9vcGFjaXR5ICkge1xuICAgIFx0XHRcdCRiYWNrX3RvX3RvcC5hZGRDbGFzcygndG8tdG9wLWZhZGUtb3V0Jyk7XG4gICAgXHRcdH1cblx0XHR9KTtcblx0XHRcblxuICAgIFx0Ly9zbW9vdGggc2Nyb2xsIHRvIHRvcFxuICAgIFx0JGJhY2tfdG9fdG9wLm9uKCdjbGljaycsIGZ1bmN0aW9uKGV2ZW50KXtcbiAgICBcdFx0ZXZlbnQucHJldmVudERlZmF1bHQoKTtcbiAgICBcdFx0JCgnYm9keSxodG1sJykuYW5pbWF0ZSh7XG4gICAgXHRcdFx0c2Nyb2xsVG9wOiAwICxcbiAgICBcdFx0IFx0fSwgc2Nyb2xsX3RvcF9kdXJhdGlvblxuICAgIFx0XHQpO1xuXHRcdH0pO1xuXG59KTtcblxuXG4kKCcudGFicy10aXRsZScpLm9uKFwibW91c2VvdmVyXCIsIGZ1bmN0aW9uICgpIHtcblxuXHR2YXIgJHRoaXMgPSB0aGlzO1xuXG5cdHZhciB0YWJfaWQgPSAkKCR0aGlzKS5maW5kKCdhJykuYXR0cignaHJlZicpO1xuXG5cblx0Ly8gaHR0cHM6Ly9zdGFja292ZXJmbG93LmNvbS9hLzY2NzI1Nzlcblx0JCgkdGhpcylcblx0XHQuYWRkQ2xhc3MoJ2lzLWFjdGl2ZScpIC8vc2V0IHRoZSBjdXJyZW50IGFzIGFjdGl2ZVxuXHRcdC5zaWJsaW5ncyhcImxpXCIpIC8vZmluZCBzaWJsaW5nIGgzIGVsZW1lbnRzXG5cdFx0LnJlbW92ZUNsYXNzKFwiaXMtYWN0aXZlXCIpIC8vIGFuZCByZW1vdmUgdGhlIGFjdGl2ZSBmcm9tIHRoZW1cblxuXHQkKFwiLnRhYnMtY29udGVudCAudGFicy1wYW5lbFwiKS5zaWJsaW5ncygpLmhpZGUoKTtcblxuXHQkKFwiLnRhYnMtY29udGVudCAudGFicy1wYW5lbFwiICsgdGFiX2lkKS5zaG93KCk7XG5cbn0pO1xuXG4vLyB3b3JkcHJlc3MgdmlkZW9cbi8vIGh0dHBzOi8vY2Z4ZGVzaWduLmNvbS9ob3ctdG8tbWFrZS10aGUtd29yZHByZXNzLXZpZGVvLXNob3J0Y29kZS1yZXNwb25zaXZlL1xuJChmdW5jdGlvbiAoKSB7XG5cdCQoJy5tZWpzLW92ZXJsYXktbG9hZGluZycpLmNsb3Nlc3QoJy5tZWpzLW92ZXJsYXknKS5hZGRDbGFzcygnbG9hZCcpOyAvL2p1c3QgYSBoZWxwZXIgY2xhc3NcblxuXHR2YXIgJHZpZGVvID0gJCgnZGl2LnZpZGVvIHZpZGVvJyk7XG5cdHZhciB2aWRXaWR0aCA9ICR2aWRlby5hdHRyKCd3aWR0aCcpO1xuXHR2YXIgdmlkSGVpZ2h0ID0gJHZpZGVvLmF0dHIoJ2hlaWdodCcpO1xuXG5cdCQod2luZG93KS5yZXNpemUoZnVuY3Rpb24gKCkge1xuXHRcdHZhciB0YXJnZXRXaWR0aCA9ICQodGhpcykud2lkdGgoKTsgLy91c2luZyB3aW5kb3cgd2lkdGggaGVyZSB3aWxsIHByb3BvcnRpb24gdGhlIHZpZGVvIHRvIGJlIGZ1bGwgc2NyZWVuOyBhZGp1c3QgYXMgbmVlZGVkXG5cdFx0JCgnZGl2LnZpZGVvLCBkaXYudmlkZW8gLm1lanMtY29udGFpbmVyJykuY3NzKCdoZWlnaHQnLCBNYXRoLmNlaWwodmlkSGVpZ2h0ICogKHRhcmdldFdpZHRoIC8gdmlkV2lkdGgpKSk7XG5cdH0pLnJlc2l6ZSgpO1xufSk7XG5cbi8vIHRvZ2dsZSBidXR0b25cbiQoJ1tkYXRhLW1vYmlsZS1hcHAtdG9nZ2xlXSAuYnV0dG9uJykuY2xpY2soZnVuY3Rpb24gKCkge1xuXHQkKHRoaXMpLnNpYmxpbmdzKCkucmVtb3ZlQ2xhc3MoJ2lzLWFjdGl2ZScpO1xuXHQkKHRoaXMpLmFkZENsYXNzKCdpcy1hY3RpdmUnKTtcbn0pO1xuXG4vLyB0b2dnbGUgY2F0YWxvZyBidXR0b25zXG4kKCdbZGF0YS1tb2JpbGUtYXBwLXRvZ2dsZV0gLndhdGNoJykuY2xpY2soZnVuY3Rpb24gKCkge1xuXHQkKHRoaXMpLnBhcmVudCgpLnRvZ2dsZUNsYXNzKCdpcy1kaXNwbGF5ZWQnKTtcblx0Ly8gJCh0aGlzKS5hZGRDbGFzcygnaXMtYWN0aXZlJyk7XG59KTtcblxuXG4vLyBodHRwczovL2Nzcy10cmlja3MuY29tL2EtbGlnaHR3ZWlnaHQtbWFzb25yeS1zb2x1dGlvbi9cbi8vIGh0dHBzOi8vY29kZXBlbi5pby90aGViYWJ5ZGluby9wZW4vQmFqR1FnUVxuLy8gbWFpbiB0YWxlbnQgY2F0YWxvZy1tYXNvbnJ5LnBocCBncmlkXG5sZXQgZ3JpZHMgPSBbLi4uZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnLmdyaWQtLW1hc29ucnknKV07XG5cbmlmIChncmlkcy5sZW5ndGggJiYgZ2V0Q29tcHV0ZWRTdHlsZShncmlkc1swXSkuZ3JpZFRlbXBsYXRlUm93cyAhPT0gJ21hc29ucnknKSB7XG5cdGdyaWRzID0gZ3JpZHMubWFwKGdyaWQgPT4gKHtcblx0XHRfZWw6IGdyaWQsXG5cdFx0Z2FwOiBwYXJzZUZsb2F0KGdldENvbXB1dGVkU3R5bGUoZ3JpZCkuZ3JpZFJvd0dhcCksXG5cdFx0aXRlbXM6IFsuLi5ncmlkLmNoaWxkTm9kZXNdLmZpbHRlcihjID0+IGMubm9kZVR5cGUgPT09IDEpLFxuXHRcdG5jb2w6IDBcblx0fSkpO1xuXG5cdGZ1bmN0aW9uIGxheW91dCgpIHtcblx0XHRncmlkcy5mb3JFYWNoKGdyaWQgPT4ge1xuXHRcdFx0LyogZ2V0IHRoZSBwb3N0IHJlbGF5b3V0IG51bWJlciBvZiBjb2x1bW5zICovXG5cdFx0XHRsZXQgbmNvbCA9IGdldENvbXB1dGVkU3R5bGUoZ3JpZC5fZWwpLmdyaWRUZW1wbGF0ZUNvbHVtbnMuc3BsaXQoJyAnKS5sZW5ndGg7XG5cblx0XHRcdC8qIGlmIHRoZSBudW1iZXIgb2YgY29sdW1ucyBoYXMgY2hhbmdlZCAqL1xuXHRcdFx0aWYgKGdyaWQubmNvbCAhPT0gbmNvbCkge1xuXHRcdFx0XHQvKiB1cGRhdGUgbnVtYmVyIG9mIGNvbHVtbnMgKi9cblx0XHRcdFx0Z3JpZC5uY29sID0gbmNvbDtcblxuXHRcdFx0XHQvKiByZXZlcnQgdG8gaW5pdGlhbCBwb3NpdGlvbmluZywgbm8gbWFyZ2luICovXG5cdFx0XHRcdGdyaWQuaXRlbXMuZm9yRWFjaChjID0+IGMuc3R5bGUucmVtb3ZlUHJvcGVydHkoJ21hcmdpbi10b3AnKSk7XG5cblx0XHRcdFx0LyogaWYgd2UgaGF2ZSBtb3JlIHRoYW4gb25lIGNvbHVtbiAqL1xuXHRcdFx0XHRpZiAoZ3JpZC5uY29sID4gMSkge1xuXHRcdFx0XHRcdGdyaWQuaXRlbXMuc2xpY2UobmNvbCkuZm9yRWFjaCgoYywgaSkgPT4ge1xuXHRcdFx0XHRcdFx0bGV0IHByZXZfZmluID0gZ3JpZC5pdGVtc1tpXS5nZXRCb3VuZGluZ0NsaWVudFJlY3QoKS5ib3R0b20gLyogYm90dG9tIGVkZ2Ugb2YgaXRlbSBhYm92ZSAqLyxcblx0XHRcdFx0XHRcdFx0Y3Vycl9pbmkgPSBjLmdldEJvdW5kaW5nQ2xpZW50UmVjdCgpLnRvcCAvKiB0b3AgZWRnZSBvZiBjdXJyZW50IGl0ZW0gKi87XG5cblx0XHRcdFx0XHRcdGMuc3R5bGUubWFyZ2luVG9wID0gYCR7cHJldl9maW4gKyBncmlkLmdhcCAtIGN1cnJfaW5pfXB4YFxuXHRcdFx0XHRcdH0pXG5cdFx0XHRcdH1cblx0XHRcdH1cblx0XHR9KVxuXHR9XG5cblx0YWRkRXZlbnRMaXN0ZW5lcignbG9hZCcsIGUgPT4ge1xuXHRcdGxheW91dCgpOyAvKiBpbml0aWFsIGxvYWQgKi9cblx0XHRhZGRFdmVudExpc3RlbmVyKCdyZXNpemUnLCBsYXlvdXQsIGZhbHNlKSAvKiBvbiByZXNpemUgKi9cblx0fSwgZmFsc2UpO1xufVxuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyAuL3NyYy9hc3NldHMvanMvbGliL2N1c3RvbS5qcyJdLCJzb3VyY2VSb290IjoiIn0=