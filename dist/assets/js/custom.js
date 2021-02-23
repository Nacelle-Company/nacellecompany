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

(0, _jquery2.default)('.vertical .tabs-title').on("mouseover", function () {

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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAgNzYyMmMwMDg3YTFhMTk4ODQyMGEiLCJ3ZWJwYWNrOi8vL2V4dGVybmFsIFwialF1ZXJ5XCIiLCJ3ZWJwYWNrOi8vLy4vc3JjL2Fzc2V0cy9qcy9saWIvY3VzdG9tLmpzIl0sIm5hbWVzIjpbImhvdmVyIiwiZmluZCIsInNsaWRlRG93biIsInNsaWRlVXAiLCJvZmZzZXQiLCJvZmZzZXRfb3BhY2l0eSIsInNjcm9sbF90b3BfZHVyYXRpb24iLCIkYmFja190b190b3AiLCJ3aW5kb3ciLCJzY3JvbGwiLCJzY3JvbGxUb3AiLCJhZGRDbGFzcyIsInJlbW92ZUNsYXNzIiwib24iLCJldmVudCIsInByZXZlbnREZWZhdWx0IiwiYW5pbWF0ZSIsIiR0aGlzIiwidGFiX2lkIiwiYXR0ciIsInNpYmxpbmdzIiwiaGlkZSIsInNob3ciLCJjbG9zZXN0IiwiJHZpZGVvIiwidmlkV2lkdGgiLCJ2aWRIZWlnaHQiLCJyZXNpemUiLCJ0YXJnZXRXaWR0aCIsIndpZHRoIiwiY3NzIiwiTWF0aCIsImNlaWwiLCJjbGljayIsInBhcmVudCIsInRvZ2dsZUNsYXNzIiwiZ3JpZHMiLCJkb2N1bWVudCIsInF1ZXJ5U2VsZWN0b3JBbGwiLCJsZW5ndGgiLCJnZXRDb21wdXRlZFN0eWxlIiwiZ3JpZFRlbXBsYXRlUm93cyIsImxheW91dCIsImZvckVhY2giLCJuY29sIiwiZ3JpZCIsIl9lbCIsImdyaWRUZW1wbGF0ZUNvbHVtbnMiLCJzcGxpdCIsIml0ZW1zIiwiYyIsInN0eWxlIiwicmVtb3ZlUHJvcGVydHkiLCJzbGljZSIsImkiLCJwcmV2X2ZpbiIsImdldEJvdW5kaW5nQ2xpZW50UmVjdCIsImJvdHRvbSIsImN1cnJfaW5pIiwidG9wIiwibWFyZ2luVG9wIiwiZ2FwIiwibWFwIiwicGFyc2VGbG9hdCIsImdyaWRSb3dHYXAiLCJjaGlsZE5vZGVzIiwiZmlsdGVyIiwibm9kZVR5cGUiLCJhZGRFdmVudExpc3RlbmVyIl0sIm1h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dUIsWUFBdkIsQ0FBTDtBQUFBLEtBQW5COztBQUVBO0FBQ0EsUUFBSVAsS0FBS0QsSUFBTCxHQUFZLENBQWhCLEVBQW1CO0FBQ2xCQyxVQUFLSSxLQUFMLENBQVdJLEtBQVgsQ0FBaUJULElBQWpCLEVBQXVCRCxPQUF2QixDQUErQixVQUFDTyxDQUFELEVBQUlJLENBQUosRUFBVTtBQUN4QyxVQUFJQyxXQUFXVixLQUFLSSxLQUFMLENBQVdLLENBQVgsRUFBY0UscUJBQWQsR0FBc0NDLE1BQXJELENBQTREO0FBQTVEO0FBQUEsVUFDQ0MsV0FBV1IsRUFBRU0scUJBQUYsR0FBMEJHLEdBRHRDLENBQzBDLDhCQUQxQzs7QUFHQVQsUUFBRUMsS0FBRixDQUFRUyxTQUFSLEdBQXVCTCxXQUFXVixLQUFLZ0IsR0FBaEIsR0FBc0JILFFBQTdDO0FBQ0EsTUFMRDtBQU1BO0FBQ0Q7QUFDRCxHQXRCRDtBQXVCQSxFQWhDNkU7O0FBQzlFdEIsU0FBUUEsTUFBTTBCLEdBQU4sQ0FBVTtBQUFBLFNBQVM7QUFDMUJoQixRQUFLRCxJQURxQjtBQUUxQmdCLFFBQUtFLFdBQVd2QixpQkFBaUJLLElBQWpCLEVBQXVCbUIsVUFBbEMsQ0FGcUI7QUFHMUJmLFVBQU8sNkJBQUlKLEtBQUtvQixVQUFULEdBQXFCQyxNQUFyQixDQUE0QjtBQUFBLFdBQUtoQixFQUFFaUIsUUFBRixLQUFlLENBQXBCO0FBQUEsSUFBNUIsQ0FIbUI7QUFJMUJ2QixTQUFNO0FBSm9CLEdBQVQ7QUFBQSxFQUFWLENBQVI7O0FBaUNBd0Isa0JBQWlCLE1BQWpCLEVBQXlCLGFBQUs7QUFDN0IxQixXQUQ2QixDQUNuQjtBQUNWMEIsbUJBQWlCLFFBQWpCLEVBQTJCMUIsTUFBM0IsRUFBbUMsS0FBbkMsRUFGNkIsQ0FFYTtBQUMxQyxFQUhELEVBR0csS0FISDtBQUlBLEMiLCJmaWxlIjoiY3VzdG9tLmpzIiwic291cmNlc0NvbnRlbnQiOlsiIFx0Ly8gVGhlIG1vZHVsZSBjYWNoZVxuIFx0dmFyIGluc3RhbGxlZE1vZHVsZXMgPSB7fTtcblxuIFx0Ly8gVGhlIHJlcXVpcmUgZnVuY3Rpb25cbiBcdGZ1bmN0aW9uIF9fd2VicGFja19yZXF1aXJlX18obW9kdWxlSWQpIHtcblxuIFx0XHQvLyBDaGVjayBpZiBtb2R1bGUgaXMgaW4gY2FjaGVcbiBcdFx0aWYoaW5zdGFsbGVkTW9kdWxlc1ttb2R1bGVJZF0pIHtcbiBcdFx0XHRyZXR1cm4gaW5zdGFsbGVkTW9kdWxlc1ttb2R1bGVJZF0uZXhwb3J0cztcbiBcdFx0fVxuIFx0XHQvLyBDcmVhdGUgYSBuZXcgbW9kdWxlIChhbmQgcHV0IGl0IGludG8gdGhlIGNhY2hlKVxuIFx0XHR2YXIgbW9kdWxlID0gaW5zdGFsbGVkTW9kdWxlc1ttb2R1bGVJZF0gPSB7XG4gXHRcdFx0aTogbW9kdWxlSWQsXG4gXHRcdFx0bDogZmFsc2UsXG4gXHRcdFx0ZXhwb3J0czoge31cbiBcdFx0fTtcblxuIFx0XHQvLyBFeGVjdXRlIHRoZSBtb2R1bGUgZnVuY3Rpb25cbiBcdFx0bW9kdWxlc1ttb2R1bGVJZF0uY2FsbChtb2R1bGUuZXhwb3J0cywgbW9kdWxlLCBtb2R1bGUuZXhwb3J0cywgX193ZWJwYWNrX3JlcXVpcmVfXyk7XG5cbiBcdFx0Ly8gRmxhZyB0aGUgbW9kdWxlIGFzIGxvYWRlZFxuIFx0XHRtb2R1bGUubCA9IHRydWU7XG5cbiBcdFx0Ly8gUmV0dXJuIHRoZSBleHBvcnRzIG9mIHRoZSBtb2R1bGVcbiBcdFx0cmV0dXJuIG1vZHVsZS5leHBvcnRzO1xuIFx0fVxuXG5cbiBcdC8vIGV4cG9zZSB0aGUgbW9kdWxlcyBvYmplY3QgKF9fd2VicGFja19tb2R1bGVzX18pXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLm0gPSBtb2R1bGVzO1xuXG4gXHQvLyBleHBvc2UgdGhlIG1vZHVsZSBjYWNoZVxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5jID0gaW5zdGFsbGVkTW9kdWxlcztcblxuIFx0Ly8gZGVmaW5lIGdldHRlciBmdW5jdGlvbiBmb3IgaGFybW9ueSBleHBvcnRzXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmQgPSBmdW5jdGlvbihleHBvcnRzLCBuYW1lLCBnZXR0ZXIpIHtcbiBcdFx0aWYoIV9fd2VicGFja19yZXF1aXJlX18ubyhleHBvcnRzLCBuYW1lKSkge1xuIFx0XHRcdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCBuYW1lLCB7XG4gXHRcdFx0XHRjb25maWd1cmFibGU6IGZhbHNlLFxuIFx0XHRcdFx0ZW51bWVyYWJsZTogdHJ1ZSxcbiBcdFx0XHRcdGdldDogZ2V0dGVyXG4gXHRcdFx0fSk7XG4gXHRcdH1cbiBcdH07XG5cbiBcdC8vIGdldERlZmF1bHRFeHBvcnQgZnVuY3Rpb24gZm9yIGNvbXBhdGliaWxpdHkgd2l0aCBub24taGFybW9ueSBtb2R1bGVzXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLm4gPSBmdW5jdGlvbihtb2R1bGUpIHtcbiBcdFx0dmFyIGdldHRlciA9IG1vZHVsZSAmJiBtb2R1bGUuX19lc01vZHVsZSA/XG4gXHRcdFx0ZnVuY3Rpb24gZ2V0RGVmYXVsdCgpIHsgcmV0dXJuIG1vZHVsZVsnZGVmYXVsdCddOyB9IDpcbiBcdFx0XHRmdW5jdGlvbiBnZXRNb2R1bGVFeHBvcnRzKCkgeyByZXR1cm4gbW9kdWxlOyB9O1xuIFx0XHRfX3dlYnBhY2tfcmVxdWlyZV9fLmQoZ2V0dGVyLCAnYScsIGdldHRlcik7XG4gXHRcdHJldHVybiBnZXR0ZXI7XG4gXHR9O1xuXG4gXHQvLyBPYmplY3QucHJvdG90eXBlLmhhc093blByb3BlcnR5LmNhbGxcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubyA9IGZ1bmN0aW9uKG9iamVjdCwgcHJvcGVydHkpIHsgcmV0dXJuIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbChvYmplY3QsIHByb3BlcnR5KTsgfTtcblxuIFx0Ly8gX193ZWJwYWNrX3B1YmxpY19wYXRoX19cbiBcdF9fd2VicGFja19yZXF1aXJlX18ucCA9IFwiXCI7XG5cbiBcdC8vIExvYWQgZW50cnkgbW9kdWxlIGFuZCByZXR1cm4gZXhwb3J0c1xuIFx0cmV0dXJuIF9fd2VicGFja19yZXF1aXJlX18oX193ZWJwYWNrX3JlcXVpcmVfXy5zID0gMjApO1xuXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHdlYnBhY2svYm9vdHN0cmFwIDc2MjJjMDA4N2ExYTE5ODg0MjBhIiwibW9kdWxlLmV4cG9ydHMgPSBqUXVlcnk7XG5cblxuLy8vLy8vLy8vLy8vLy8vLy8vXG4vLyBXRUJQQUNLIEZPT1RFUlxuLy8gZXh0ZXJuYWwgXCJqUXVlcnlcIlxuLy8gbW9kdWxlIGlkID0gMFxuLy8gbW9kdWxlIGNodW5rcyA9IDAgMSIsImltcG9ydCAkIGZyb20gJ2pxdWVyeSc7XG5cbi8vIGNhdGVnb3J5IGhvdmVyXG4kKGZ1bmN0aW9uKCkge1xuXG5cbiAgICAkKCdbZGF0YS1jYWxsb3V0LWhvdmVyLXJldmVhbF0nKS5ob3ZlcihmdW5jdGlvbigpIHtcbiAgICAgICAgJCh0aGlzKS5maW5kKCcuY2FsbG91dC1mb290ZXInKS5zbGlkZURvd24oMjUwKTtcbiAgICB9LCBmdW5jdGlvbigpIHtcbiAgICAgICAgJCh0aGlzKS5maW5kKCcuY2FsbG91dC1mb290ZXInKS5zbGlkZVVwKDI1MCk7fSk7XG5cbiAgICAgIC8vIC8vIC8vIC8vIC8vIC8vXG4gICAgICAvLyBzY3JvbGwgdG8gdG9wXG4gICAgICAvLyAvLyAvLyAvLyAvLyAvL1xuXG4gICAgXHQvLyBicm93c2VyIHdpbmRvdyBzY3JvbGwgKGluIHBpeGVscykgYWZ0ZXIgd2hpY2ggdGhlIFwiYmFjayB0byB0b3BcIiBsaW5rIGlzIHNob3duXG4gICAgXHR2YXIgb2Zmc2V0ID0gMzAwLFxuICAgIFx0XHQvL2Jyb3dzZXIgd2luZG93IHNjcm9sbCAoaW4gcGl4ZWxzKSBhZnRlciB3aGljaCB0aGUgXCJiYWNrIHRvIHRvcFwiIGxpbmsgb3BhY2l0eSBpcyByZWR1Y2VkXG4gICAgXHRcdG9mZnNldF9vcGFjaXR5ID0gMTIwMCxcbiAgICBcdFx0Ly9kdXJhdGlvbiBvZiB0aGUgdG9wIHNjcm9sbGluZyBhbmltYXRpb24gKGluIG1zKVxuICAgIFx0XHRzY3JvbGxfdG9wX2R1cmF0aW9uID0gNzAwLFxuICAgIFx0XHQvL2dyYWIgdGhlIFwiYmFjayB0byB0b3BcIiBsaW5rXG4gICAgXHRcdCRiYWNrX3RvX3RvcCA9ICQoJy50by10b3AnKTtcblxuICAgIFx0Ly9oaWRlIG9yIHNob3cgdGhlIFwiYmFjayB0byB0b3BcIiBsaW5rXG4gICAgXHQkKHdpbmRvdykuc2Nyb2xsKGZ1bmN0aW9uKCl7XG4gICAgXHRcdCggJCh0aGlzKS5zY3JvbGxUb3AoKSA+IG9mZnNldCApID8gJGJhY2tfdG9fdG9wLmFkZENsYXNzKCd0by10b3AtdmlzaWJsZScpIDogJGJhY2tfdG9fdG9wLnJlbW92ZUNsYXNzKCd0by10b3AtdmlzaWJsZSB0by10b3AtZmFkZS1vdXQnKTtcbiAgICBcdFx0aWYoICQodGhpcykuc2Nyb2xsVG9wKCkgPiBvZmZzZXRfb3BhY2l0eSApIHtcbiAgICBcdFx0XHQkYmFja190b190b3AuYWRkQ2xhc3MoJ3RvLXRvcC1mYWRlLW91dCcpO1xuICAgIFx0XHR9XG5cdFx0fSk7XG5cdFx0XG5cbiAgICBcdC8vc21vb3RoIHNjcm9sbCB0byB0b3BcbiAgICBcdCRiYWNrX3RvX3RvcC5vbignY2xpY2snLCBmdW5jdGlvbihldmVudCl7XG4gICAgXHRcdGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XG4gICAgXHRcdCQoJ2JvZHksaHRtbCcpLmFuaW1hdGUoe1xuICAgIFx0XHRcdHNjcm9sbFRvcDogMCAsXG4gICAgXHRcdCBcdH0sIHNjcm9sbF90b3BfZHVyYXRpb25cbiAgICBcdFx0KTtcblx0XHR9KTtcblxufSk7XG5cblxuJCgnLnZlcnRpY2FsIC50YWJzLXRpdGxlJykub24oXCJtb3VzZW92ZXJcIiwgZnVuY3Rpb24gKCkge1xuXG5cdHZhciAkdGhpcyA9IHRoaXM7XG5cblx0dmFyIHRhYl9pZCA9ICQoJHRoaXMpLmZpbmQoJ2EnKS5hdHRyKCdocmVmJyk7XG5cblxuXHQvLyBodHRwczovL3N0YWNrb3ZlcmZsb3cuY29tL2EvNjY3MjU3OVxuXHQkKCR0aGlzKVxuXHRcdC5hZGRDbGFzcygnaXMtYWN0aXZlJykgLy9zZXQgdGhlIGN1cnJlbnQgYXMgYWN0aXZlXG5cdFx0LnNpYmxpbmdzKFwibGlcIikgLy9maW5kIHNpYmxpbmcgaDMgZWxlbWVudHNcblx0XHQucmVtb3ZlQ2xhc3MoXCJpcy1hY3RpdmVcIikgLy8gYW5kIHJlbW92ZSB0aGUgYWN0aXZlIGZyb20gdGhlbVxuXG5cdCQoXCIudGFicy1jb250ZW50IC50YWJzLXBhbmVsXCIpLnNpYmxpbmdzKCkuaGlkZSgpO1xuXG5cdCQoXCIudGFicy1jb250ZW50IC50YWJzLXBhbmVsXCIgKyB0YWJfaWQpLnNob3coKTtcblxufSk7XG5cbi8vIHdvcmRwcmVzcyB2aWRlb1xuLy8gaHR0cHM6Ly9jZnhkZXNpZ24uY29tL2hvdy10by1tYWtlLXRoZS13b3JkcHJlc3MtdmlkZW8tc2hvcnRjb2RlLXJlc3BvbnNpdmUvXG4kKGZ1bmN0aW9uICgpIHtcblx0JCgnLm1lanMtb3ZlcmxheS1sb2FkaW5nJykuY2xvc2VzdCgnLm1lanMtb3ZlcmxheScpLmFkZENsYXNzKCdsb2FkJyk7IC8vanVzdCBhIGhlbHBlciBjbGFzc1xuXG5cdHZhciAkdmlkZW8gPSAkKCdkaXYudmlkZW8gdmlkZW8nKTtcblx0dmFyIHZpZFdpZHRoID0gJHZpZGVvLmF0dHIoJ3dpZHRoJyk7XG5cdHZhciB2aWRIZWlnaHQgPSAkdmlkZW8uYXR0cignaGVpZ2h0Jyk7XG5cblx0JCh3aW5kb3cpLnJlc2l6ZShmdW5jdGlvbiAoKSB7XG5cdFx0dmFyIHRhcmdldFdpZHRoID0gJCh0aGlzKS53aWR0aCgpOyAvL3VzaW5nIHdpbmRvdyB3aWR0aCBoZXJlIHdpbGwgcHJvcG9ydGlvbiB0aGUgdmlkZW8gdG8gYmUgZnVsbCBzY3JlZW47IGFkanVzdCBhcyBuZWVkZWRcblx0XHQkKCdkaXYudmlkZW8sIGRpdi52aWRlbyAubWVqcy1jb250YWluZXInKS5jc3MoJ2hlaWdodCcsIE1hdGguY2VpbCh2aWRIZWlnaHQgKiAodGFyZ2V0V2lkdGggLyB2aWRXaWR0aCkpKTtcblx0fSkucmVzaXplKCk7XG59KTtcblxuLy8gdG9nZ2xlIGJ1dHRvblxuJCgnW2RhdGEtbW9iaWxlLWFwcC10b2dnbGVdIC5idXR0b24nKS5jbGljayhmdW5jdGlvbiAoKSB7XG5cdCQodGhpcykuc2libGluZ3MoKS5yZW1vdmVDbGFzcygnaXMtYWN0aXZlJyk7XG5cdCQodGhpcykuYWRkQ2xhc3MoJ2lzLWFjdGl2ZScpO1xufSk7XG5cbi8vIHRvZ2dsZSBjYXRhbG9nIGJ1dHRvbnNcbiQoJ1tkYXRhLW1vYmlsZS1hcHAtdG9nZ2xlXSAud2F0Y2gnKS5jbGljayhmdW5jdGlvbiAoKSB7XG5cdCQodGhpcykucGFyZW50KCkudG9nZ2xlQ2xhc3MoJ2lzLWRpc3BsYXllZCcpO1xuXHQvLyAkKHRoaXMpLmFkZENsYXNzKCdpcy1hY3RpdmUnKTtcbn0pO1xuXG5cbi8vIGh0dHBzOi8vY3NzLXRyaWNrcy5jb20vYS1saWdodHdlaWdodC1tYXNvbnJ5LXNvbHV0aW9uL1xuLy8gaHR0cHM6Ly9jb2RlcGVuLmlvL3RoZWJhYnlkaW5vL3Blbi9CYWpHUWdRXG4vLyBtYWluIHRhbGVudCBjYXRhbG9nLW1hc29ucnkucGhwIGdyaWRcbmxldCBncmlkcyA9IFsuLi5kb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcuZ3JpZC0tbWFzb25yeScpXTtcblxuaWYgKGdyaWRzLmxlbmd0aCAmJiBnZXRDb21wdXRlZFN0eWxlKGdyaWRzWzBdKS5ncmlkVGVtcGxhdGVSb3dzICE9PSAnbWFzb25yeScpIHtcblx0Z3JpZHMgPSBncmlkcy5tYXAoZ3JpZCA9PiAoe1xuXHRcdF9lbDogZ3JpZCxcblx0XHRnYXA6IHBhcnNlRmxvYXQoZ2V0Q29tcHV0ZWRTdHlsZShncmlkKS5ncmlkUm93R2FwKSxcblx0XHRpdGVtczogWy4uLmdyaWQuY2hpbGROb2Rlc10uZmlsdGVyKGMgPT4gYy5ub2RlVHlwZSA9PT0gMSksXG5cdFx0bmNvbDogMFxuXHR9KSk7XG5cblx0ZnVuY3Rpb24gbGF5b3V0KCkge1xuXHRcdGdyaWRzLmZvckVhY2goZ3JpZCA9PiB7XG5cdFx0XHQvKiBnZXQgdGhlIHBvc3QgcmVsYXlvdXQgbnVtYmVyIG9mIGNvbHVtbnMgKi9cblx0XHRcdGxldCBuY29sID0gZ2V0Q29tcHV0ZWRTdHlsZShncmlkLl9lbCkuZ3JpZFRlbXBsYXRlQ29sdW1ucy5zcGxpdCgnICcpLmxlbmd0aDtcblxuXHRcdFx0LyogaWYgdGhlIG51bWJlciBvZiBjb2x1bW5zIGhhcyBjaGFuZ2VkICovXG5cdFx0XHRpZiAoZ3JpZC5uY29sICE9PSBuY29sKSB7XG5cdFx0XHRcdC8qIHVwZGF0ZSBudW1iZXIgb2YgY29sdW1ucyAqL1xuXHRcdFx0XHRncmlkLm5jb2wgPSBuY29sO1xuXG5cdFx0XHRcdC8qIHJldmVydCB0byBpbml0aWFsIHBvc2l0aW9uaW5nLCBubyBtYXJnaW4gKi9cblx0XHRcdFx0Z3JpZC5pdGVtcy5mb3JFYWNoKGMgPT4gYy5zdHlsZS5yZW1vdmVQcm9wZXJ0eSgnbWFyZ2luLXRvcCcpKTtcblxuXHRcdFx0XHQvKiBpZiB3ZSBoYXZlIG1vcmUgdGhhbiBvbmUgY29sdW1uICovXG5cdFx0XHRcdGlmIChncmlkLm5jb2wgPiAxKSB7XG5cdFx0XHRcdFx0Z3JpZC5pdGVtcy5zbGljZShuY29sKS5mb3JFYWNoKChjLCBpKSA9PiB7XG5cdFx0XHRcdFx0XHRsZXQgcHJldl9maW4gPSBncmlkLml0ZW1zW2ldLmdldEJvdW5kaW5nQ2xpZW50UmVjdCgpLmJvdHRvbSAvKiBib3R0b20gZWRnZSBvZiBpdGVtIGFib3ZlICovLFxuXHRcdFx0XHRcdFx0XHRjdXJyX2luaSA9IGMuZ2V0Qm91bmRpbmdDbGllbnRSZWN0KCkudG9wIC8qIHRvcCBlZGdlIG9mIGN1cnJlbnQgaXRlbSAqLztcblxuXHRcdFx0XHRcdFx0Yy5zdHlsZS5tYXJnaW5Ub3AgPSBgJHtwcmV2X2ZpbiArIGdyaWQuZ2FwIC0gY3Vycl9pbml9cHhgXG5cdFx0XHRcdFx0fSlcblx0XHRcdFx0fVxuXHRcdFx0fVxuXHRcdH0pXG5cdH1cblxuXHRhZGRFdmVudExpc3RlbmVyKCdsb2FkJywgZSA9PiB7XG5cdFx0bGF5b3V0KCk7IC8qIGluaXRpYWwgbG9hZCAqL1xuXHRcdGFkZEV2ZW50TGlzdGVuZXIoJ3Jlc2l6ZScsIGxheW91dCwgZmFsc2UpIC8qIG9uIHJlc2l6ZSAqL1xuXHR9LCBmYWxzZSk7XG59XG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIC4vc3JjL2Fzc2V0cy9qcy9saWIvY3VzdG9tLmpzIl0sInNvdXJjZVJvb3QiOiIifQ==