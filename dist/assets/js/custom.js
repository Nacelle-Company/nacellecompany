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

/***/ }),

/***/ 20:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(10);


/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAgYzU3NTZhZGZjNzgyYjg3NjA2ZTAiLCJ3ZWJwYWNrOi8vL2V4dGVybmFsIFwialF1ZXJ5XCIiLCJ3ZWJwYWNrOi8vLy4vc3JjL2Fzc2V0cy9qcy9saWIvY3VzdG9tLmpzIl0sIm5hbWVzIjpbImhvdmVyIiwiZmluZCIsInNsaWRlRG93biIsInNsaWRlVXAiLCJvZmZzZXQiLCJvZmZzZXRfb3BhY2l0eSIsInNjcm9sbF90b3BfZHVyYXRpb24iLCIkYmFja190b190b3AiLCJ3aW5kb3ciLCJzY3JvbGwiLCJzY3JvbGxUb3AiLCJhZGRDbGFzcyIsInJlbW92ZUNsYXNzIiwib24iLCJldmVudCIsInByZXZlbnREZWZhdWx0IiwiYW5pbWF0ZSIsIiR0aGlzIiwidGFiX2lkIiwiYXR0ciIsInNpYmxpbmdzIiwiaGlkZSIsInNob3ciLCJjbG9zZXN0IiwiJHZpZGVvIiwidmlkV2lkdGgiLCJ2aWRIZWlnaHQiLCJyZXNpemUiLCJ0YXJnZXRXaWR0aCIsIndpZHRoIiwiY3NzIiwiTWF0aCIsImNlaWwiLCJjbGljayIsInBhcmVudCIsInRvZ2dsZUNsYXNzIl0sIm1hcHBpbmdzIjoiO0FBQUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7OztBQUdBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLGFBQUs7QUFDTDtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLG1DQUEyQiwwQkFBMEIsRUFBRTtBQUN2RCx5Q0FBaUMsZUFBZTtBQUNoRDtBQUNBO0FBQ0E7O0FBRUE7QUFDQSw4REFBc0QsK0RBQStEOztBQUVySDtBQUNBOztBQUVBO0FBQ0E7Ozs7Ozs7O0FDN0RBLHdCOzs7Ozs7Ozs7O0FDQUE7Ozs7OztBQUVBO0FBQ0Es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SUFBRixFQUFRQyxNQUFSLEdBQWlCQyxXQUFqQixDQUE2QixjQUE3QjtBQUNBO0FBQ0EsQ0FIRCxFIiwiZmlsZSI6ImN1c3RvbS5qcyIsInNvdXJjZXNDb250ZW50IjpbIiBcdC8vIFRoZSBtb2R1bGUgY2FjaGVcbiBcdHZhciBpbnN0YWxsZWRNb2R1bGVzID0ge307XG5cbiBcdC8vIFRoZSByZXF1aXJlIGZ1bmN0aW9uXG4gXHRmdW5jdGlvbiBfX3dlYnBhY2tfcmVxdWlyZV9fKG1vZHVsZUlkKSB7XG5cbiBcdFx0Ly8gQ2hlY2sgaWYgbW9kdWxlIGlzIGluIGNhY2hlXG4gXHRcdGlmKGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdKSB7XG4gXHRcdFx0cmV0dXJuIGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdLmV4cG9ydHM7XG4gXHRcdH1cbiBcdFx0Ly8gQ3JlYXRlIGEgbmV3IG1vZHVsZSAoYW5kIHB1dCBpdCBpbnRvIHRoZSBjYWNoZSlcbiBcdFx0dmFyIG1vZHVsZSA9IGluc3RhbGxlZE1vZHVsZXNbbW9kdWxlSWRdID0ge1xuIFx0XHRcdGk6IG1vZHVsZUlkLFxuIFx0XHRcdGw6IGZhbHNlLFxuIFx0XHRcdGV4cG9ydHM6IHt9XG4gXHRcdH07XG5cbiBcdFx0Ly8gRXhlY3V0ZSB0aGUgbW9kdWxlIGZ1bmN0aW9uXG4gXHRcdG1vZHVsZXNbbW9kdWxlSWRdLmNhbGwobW9kdWxlLmV4cG9ydHMsIG1vZHVsZSwgbW9kdWxlLmV4cG9ydHMsIF9fd2VicGFja19yZXF1aXJlX18pO1xuXG4gXHRcdC8vIEZsYWcgdGhlIG1vZHVsZSBhcyBsb2FkZWRcbiBcdFx0bW9kdWxlLmwgPSB0cnVlO1xuXG4gXHRcdC8vIFJldHVybiB0aGUgZXhwb3J0cyBvZiB0aGUgbW9kdWxlXG4gXHRcdHJldHVybiBtb2R1bGUuZXhwb3J0cztcbiBcdH1cblxuXG4gXHQvLyBleHBvc2UgdGhlIG1vZHVsZXMgb2JqZWN0IChfX3dlYnBhY2tfbW9kdWxlc19fKVxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5tID0gbW9kdWxlcztcblxuIFx0Ly8gZXhwb3NlIHRoZSBtb2R1bGUgY2FjaGVcbiBcdF9fd2VicGFja19yZXF1aXJlX18uYyA9IGluc3RhbGxlZE1vZHVsZXM7XG5cbiBcdC8vIGRlZmluZSBnZXR0ZXIgZnVuY3Rpb24gZm9yIGhhcm1vbnkgZXhwb3J0c1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5kID0gZnVuY3Rpb24oZXhwb3J0cywgbmFtZSwgZ2V0dGVyKSB7XG4gXHRcdGlmKCFfX3dlYnBhY2tfcmVxdWlyZV9fLm8oZXhwb3J0cywgbmFtZSkpIHtcbiBcdFx0XHRPYmplY3QuZGVmaW5lUHJvcGVydHkoZXhwb3J0cywgbmFtZSwge1xuIFx0XHRcdFx0Y29uZmlndXJhYmxlOiBmYWxzZSxcbiBcdFx0XHRcdGVudW1lcmFibGU6IHRydWUsXG4gXHRcdFx0XHRnZXQ6IGdldHRlclxuIFx0XHRcdH0pO1xuIFx0XHR9XG4gXHR9O1xuXG4gXHQvLyBnZXREZWZhdWx0RXhwb3J0IGZ1bmN0aW9uIGZvciBjb21wYXRpYmlsaXR5IHdpdGggbm9uLWhhcm1vbnkgbW9kdWxlc1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5uID0gZnVuY3Rpb24obW9kdWxlKSB7XG4gXHRcdHZhciBnZXR0ZXIgPSBtb2R1bGUgJiYgbW9kdWxlLl9fZXNNb2R1bGUgP1xuIFx0XHRcdGZ1bmN0aW9uIGdldERlZmF1bHQoKSB7IHJldHVybiBtb2R1bGVbJ2RlZmF1bHQnXTsgfSA6XG4gXHRcdFx0ZnVuY3Rpb24gZ2V0TW9kdWxlRXhwb3J0cygpIHsgcmV0dXJuIG1vZHVsZTsgfTtcbiBcdFx0X193ZWJwYWNrX3JlcXVpcmVfXy5kKGdldHRlciwgJ2EnLCBnZXR0ZXIpO1xuIFx0XHRyZXR1cm4gZ2V0dGVyO1xuIFx0fTtcblxuIFx0Ly8gT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLm8gPSBmdW5jdGlvbihvYmplY3QsIHByb3BlcnR5KSB7IHJldHVybiBPYmplY3QucHJvdG90eXBlLmhhc093blByb3BlcnR5LmNhbGwob2JqZWN0LCBwcm9wZXJ0eSk7IH07XG5cbiBcdC8vIF9fd2VicGFja19wdWJsaWNfcGF0aF9fXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLnAgPSBcIlwiO1xuXG4gXHQvLyBMb2FkIGVudHJ5IG1vZHVsZSBhbmQgcmV0dXJuIGV4cG9ydHNcbiBcdHJldHVybiBfX3dlYnBhY2tfcmVxdWlyZV9fKF9fd2VicGFja19yZXF1aXJlX18ucyA9IDIwKTtcblxuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyB3ZWJwYWNrL2Jvb3RzdHJhcCBjNTc1NmFkZmM3ODJiODc2MDZlMCIsIm1vZHVsZS5leHBvcnRzID0galF1ZXJ5O1xuXG5cbi8vLy8vLy8vLy8vLy8vLy8vL1xuLy8gV0VCUEFDSyBGT09URVJcbi8vIGV4dGVybmFsIFwialF1ZXJ5XCJcbi8vIG1vZHVsZSBpZCA9IDBcbi8vIG1vZHVsZSBjaHVua3MgPSAwIDEiLCJpbXBvcnQgJCBmcm9tICdqcXVlcnknO1xuXG4vLyBjYXRlZ29yeSBob3ZlclxuJChmdW5jdGlvbigpIHtcblxuXG4gICAgJCgnW2RhdGEtY2FsbG91dC1ob3Zlci1yZXZlYWxdJykuaG92ZXIoZnVuY3Rpb24oKSB7XG4gICAgICAgICQodGhpcykuZmluZCgnLmNhbGxvdXQtZm9vdGVyJykuc2xpZGVEb3duKDI1MCk7XG4gICAgfSwgZnVuY3Rpb24oKSB7XG4gICAgICAgICQodGhpcykuZmluZCgnLmNhbGxvdXQtZm9vdGVyJykuc2xpZGVVcCgyNTApO30pO1xuXG4gICAgICAvLyAvLyAvLyAvLyAvLyAvL1xuICAgICAgLy8gc2Nyb2xsIHRvIHRvcFxuICAgICAgLy8gLy8gLy8gLy8gLy8gLy9cblxuICAgIFx0Ly8gYnJvd3NlciB3aW5kb3cgc2Nyb2xsIChpbiBwaXhlbHMpIGFmdGVyIHdoaWNoIHRoZSBcImJhY2sgdG8gdG9wXCIgbGluayBpcyBzaG93blxuICAgIFx0dmFyIG9mZnNldCA9IDMwMCxcbiAgICBcdFx0Ly9icm93c2VyIHdpbmRvdyBzY3JvbGwgKGluIHBpeGVscykgYWZ0ZXIgd2hpY2ggdGhlIFwiYmFjayB0byB0b3BcIiBsaW5rIG9wYWNpdHkgaXMgcmVkdWNlZFxuICAgIFx0XHRvZmZzZXRfb3BhY2l0eSA9IDEyMDAsXG4gICAgXHRcdC8vZHVyYXRpb24gb2YgdGhlIHRvcCBzY3JvbGxpbmcgYW5pbWF0aW9uIChpbiBtcylcbiAgICBcdFx0c2Nyb2xsX3RvcF9kdXJhdGlvbiA9IDcwMCxcbiAgICBcdFx0Ly9ncmFiIHRoZSBcImJhY2sgdG8gdG9wXCIgbGlua1xuICAgIFx0XHQkYmFja190b190b3AgPSAkKCcudG8tdG9wJyk7XG5cbiAgICBcdC8vaGlkZSBvciBzaG93IHRoZSBcImJhY2sgdG8gdG9wXCIgbGlua1xuICAgIFx0JCh3aW5kb3cpLnNjcm9sbChmdW5jdGlvbigpe1xuICAgIFx0XHQoICQodGhpcykuc2Nyb2xsVG9wKCkgPiBvZmZzZXQgKSA/ICRiYWNrX3RvX3RvcC5hZGRDbGFzcygndG8tdG9wLXZpc2libGUnKSA6ICRiYWNrX3RvX3RvcC5yZW1vdmVDbGFzcygndG8tdG9wLXZpc2libGUgdG8tdG9wLWZhZGUtb3V0Jyk7XG4gICAgXHRcdGlmKCAkKHRoaXMpLnNjcm9sbFRvcCgpID4gb2Zmc2V0X29wYWNpdHkgKSB7XG4gICAgXHRcdFx0JGJhY2tfdG9fdG9wLmFkZENsYXNzKCd0by10b3AtZmFkZS1vdXQnKTtcbiAgICBcdFx0fVxuXHRcdH0pO1xuXHRcdFxuXG4gICAgXHQvL3Ntb290aCBzY3JvbGwgdG8gdG9wXG4gICAgXHQkYmFja190b190b3Aub24oJ2NsaWNrJywgZnVuY3Rpb24oZXZlbnQpe1xuICAgIFx0XHRldmVudC5wcmV2ZW50RGVmYXVsdCgpO1xuICAgIFx0XHQkKCdib2R5LGh0bWwnKS5hbmltYXRlKHtcbiAgICBcdFx0XHRzY3JvbGxUb3A6IDAgLFxuICAgIFx0XHQgXHR9LCBzY3JvbGxfdG9wX2R1cmF0aW9uXG4gICAgXHRcdCk7XG5cdFx0fSk7XG5cbn0pO1xuXG5cbiQoJy50YWJzLXRpdGxlJykub24oXCJtb3VzZW92ZXJcIiwgZnVuY3Rpb24gKCkge1xuXG5cdHZhciAkdGhpcyA9IHRoaXM7XG5cblx0dmFyIHRhYl9pZCA9ICQoJHRoaXMpLmZpbmQoJ2EnKS5hdHRyKCdocmVmJyk7XG5cblxuXHQvLyBodHRwczovL3N0YWNrb3ZlcmZsb3cuY29tL2EvNjY3MjU3OVxuXHQkKCR0aGlzKVxuXHRcdC5hZGRDbGFzcygnaXMtYWN0aXZlJykgLy9zZXQgdGhlIGN1cnJlbnQgYXMgYWN0aXZlXG5cdFx0LnNpYmxpbmdzKFwibGlcIikgLy9maW5kIHNpYmxpbmcgaDMgZWxlbWVudHNcblx0XHQucmVtb3ZlQ2xhc3MoXCJpcy1hY3RpdmVcIikgLy8gYW5kIHJlbW92ZSB0aGUgYWN0aXZlIGZyb20gdGhlbVxuXG5cdCQoXCIudGFicy1jb250ZW50IC50YWJzLXBhbmVsXCIpLnNpYmxpbmdzKCkuaGlkZSgpO1xuXG5cdCQoXCIudGFicy1jb250ZW50IC50YWJzLXBhbmVsXCIgKyB0YWJfaWQpLnNob3coKTtcblxufSk7XG5cbi8vIHdvcmRwcmVzcyB2aWRlb1xuLy8gaHR0cHM6Ly9jZnhkZXNpZ24uY29tL2hvdy10by1tYWtlLXRoZS13b3JkcHJlc3MtdmlkZW8tc2hvcnRjb2RlLXJlc3BvbnNpdmUvXG4kKGZ1bmN0aW9uICgpIHtcblx0JCgnLm1lanMtb3ZlcmxheS1sb2FkaW5nJykuY2xvc2VzdCgnLm1lanMtb3ZlcmxheScpLmFkZENsYXNzKCdsb2FkJyk7IC8vanVzdCBhIGhlbHBlciBjbGFzc1xuXG5cdHZhciAkdmlkZW8gPSAkKCdkaXYudmlkZW8gdmlkZW8nKTtcblx0dmFyIHZpZFdpZHRoID0gJHZpZGVvLmF0dHIoJ3dpZHRoJyk7XG5cdHZhciB2aWRIZWlnaHQgPSAkdmlkZW8uYXR0cignaGVpZ2h0Jyk7XG5cblx0JCh3aW5kb3cpLnJlc2l6ZShmdW5jdGlvbiAoKSB7XG5cdFx0dmFyIHRhcmdldFdpZHRoID0gJCh0aGlzKS53aWR0aCgpOyAvL3VzaW5nIHdpbmRvdyB3aWR0aCBoZXJlIHdpbGwgcHJvcG9ydGlvbiB0aGUgdmlkZW8gdG8gYmUgZnVsbCBzY3JlZW47IGFkanVzdCBhcyBuZWVkZWRcblx0XHQkKCdkaXYudmlkZW8sIGRpdi52aWRlbyAubWVqcy1jb250YWluZXInKS5jc3MoJ2hlaWdodCcsIE1hdGguY2VpbCh2aWRIZWlnaHQgKiAodGFyZ2V0V2lkdGggLyB2aWRXaWR0aCkpKTtcblx0fSkucmVzaXplKCk7XG59KTtcblxuLy8gdG9nZ2xlIGJ1dHRvblxuJCgnW2RhdGEtbW9iaWxlLWFwcC10b2dnbGVdIC5idXR0b24nKS5jbGljayhmdW5jdGlvbiAoKSB7XG5cdCQodGhpcykuc2libGluZ3MoKS5yZW1vdmVDbGFzcygnaXMtYWN0aXZlJyk7XG5cdCQodGhpcykuYWRkQ2xhc3MoJ2lzLWFjdGl2ZScpO1xufSk7XG5cbi8vIHRvZ2dsZSBjYXRhbG9nIGJ1dHRvbnNcbiQoJ1tkYXRhLW1vYmlsZS1hcHAtdG9nZ2xlXSAud2F0Y2gnKS5jbGljayhmdW5jdGlvbiAoKSB7XG5cdCQodGhpcykucGFyZW50KCkudG9nZ2xlQ2xhc3MoJ2lzLWRpc3BsYXllZCcpO1xuXHQvLyAkKHRoaXMpLmFkZENsYXNzKCdpcy1hY3RpdmUnKTtcbn0pO1xuXG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gLi9zcmMvYXNzZXRzL2pzL2xpYi9jdXN0b20uanMiXSwic291cmNlUm9vdCI6IiJ9