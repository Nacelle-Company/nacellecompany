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

/***/ 10:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


// category hover
$(function () {
    $('[data-callout-hover-reveal]').hover(function () {
        $(this).find('.callout-footer').slideDown(250);
    }, function () {
        $(this).find('.callout-footer').slideUp(250);
    });
});

// ps: disable on small devices!
// var $animationElements = $('.animation-element');
// var $window = $(window);

// ps: Let's FIRST disable triggering on small devices!
//  var isMobile = window.matchMedia("only screen and (max-width: 768px)");
//  if (isMobile.matches) {
//      $animationElements.removeClass('animation-element');
//  }
//
//  function checkIfInView() {
//
//      var windowHeight = $window.height();
//      var windowTopPosition = $window.scrollTop();
//      var windowBottomPosition = (windowTopPosition + windowHeight);
//
//      $.each($animationElements, function () {
//          var $element = $(this);
//          var elementHeight = $element.outerHeight();
//          var elementTopPosition = $element.offset().top;
//          var elementBottomPosition = (elementTopPosition + elementHeight);
//
// //check to see if this current container is within viewport
//          if ((elementBottomPosition >= windowTopPosition) &&
//              (elementTopPosition <= windowBottomPosition)) {
//              $element.addClass('in-view');
//          } else {
//              $element.removeClass('in-view');
//          }
//      });
//  }
//
//  $window.on('scroll resize', checkIfInView);
//  $window.trigger('scroll');


/* @end viewport trigger script  */

/***/ }),

/***/ 20:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(10);


/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAgOTU4YzEwYjhlMWU3YzJkZDQ5NGYiLCJ3ZWJwYWNrOi8vLy4vc3JjL2Fzc2V0cy9qcy9saWIvY3VzdG9tLmpzIl0sIm5hbWVzIjpbIiQiLCJob3ZlciIsImZpbmQiLCJzbGlkZURvd24iLCJzbGlkZVVwIl0sIm1hcHBpbmdzIjoiO0FBQUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7OztBQUdBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLGFBQUs7QUFDTDtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLG1DQUEyQiwwQkFBMEIsRUFBRTtBQUN2RCx5Q0FBaUMsZUFBZTtBQUNoRDtBQUNBO0FBQ0E7O0FBRUE7QUFDQSw4REFBc0QsK0RBQStEOztBQUVySDtBQUNBOztBQUVBO0FBQ0E7Ozs7Ozs7Ozs7O0FDN0RBO0FBQ0FBLEVBQUUsWUFBVztBQUNUQSxNQUFFLDZCQUFGLEVBQWlDQyxLQUFqQyxDQUF1QyxZQUFXO0FBQzlDRCxVQUFFLElBQUYsRUFBUUUsSUFBUixDQUFhLGlCQUFiLEVBQWdDQyxTQUFoQyxDQUEwQyxHQUExQztBQUNILEtBRkQsRUFFRyxZQUFXO0FBQ1ZILFVBQUUsSUFBRixFQUFRRSxJQUFSLENBQWEsaUJBQWIsRUFBZ0NFLE9BQWhDLENBQXdDLEdBQXhDO0FBQ0gsS0FKRDtBQUtILENBTkQ7O0FBU0E7QUFDQztBQUNBOztBQUVBO0FBQ0Q7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7O0FBR0MsbUMiLCJmaWxlIjoiY3VzdG9tLmpzIiwic291cmNlc0NvbnRlbnQiOlsiIFx0Ly8gVGhlIG1vZHVsZSBjYWNoZVxuIFx0dmFyIGluc3RhbGxlZE1vZHVsZXMgPSB7fTtcblxuIFx0Ly8gVGhlIHJlcXVpcmUgZnVuY3Rpb25cbiBcdGZ1bmN0aW9uIF9fd2VicGFja19yZXF1aXJlX18obW9kdWxlSWQpIHtcblxuIFx0XHQvLyBDaGVjayBpZiBtb2R1bGUgaXMgaW4gY2FjaGVcbiBcdFx0aWYoaW5zdGFsbGVkTW9kdWxlc1ttb2R1bGVJZF0pIHtcbiBcdFx0XHRyZXR1cm4gaW5zdGFsbGVkTW9kdWxlc1ttb2R1bGVJZF0uZXhwb3J0cztcbiBcdFx0fVxuIFx0XHQvLyBDcmVhdGUgYSBuZXcgbW9kdWxlIChhbmQgcHV0IGl0IGludG8gdGhlIGNhY2hlKVxuIFx0XHR2YXIgbW9kdWxlID0gaW5zdGFsbGVkTW9kdWxlc1ttb2R1bGVJZF0gPSB7XG4gXHRcdFx0aTogbW9kdWxlSWQsXG4gXHRcdFx0bDogZmFsc2UsXG4gXHRcdFx0ZXhwb3J0czoge31cbiBcdFx0fTtcblxuIFx0XHQvLyBFeGVjdXRlIHRoZSBtb2R1bGUgZnVuY3Rpb25cbiBcdFx0bW9kdWxlc1ttb2R1bGVJZF0uY2FsbChtb2R1bGUuZXhwb3J0cywgbW9kdWxlLCBtb2R1bGUuZXhwb3J0cywgX193ZWJwYWNrX3JlcXVpcmVfXyk7XG5cbiBcdFx0Ly8gRmxhZyB0aGUgbW9kdWxlIGFzIGxvYWRlZFxuIFx0XHRtb2R1bGUubCA9IHRydWU7XG5cbiBcdFx0Ly8gUmV0dXJuIHRoZSBleHBvcnRzIG9mIHRoZSBtb2R1bGVcbiBcdFx0cmV0dXJuIG1vZHVsZS5leHBvcnRzO1xuIFx0fVxuXG5cbiBcdC8vIGV4cG9zZSB0aGUgbW9kdWxlcyBvYmplY3QgKF9fd2VicGFja19tb2R1bGVzX18pXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLm0gPSBtb2R1bGVzO1xuXG4gXHQvLyBleHBvc2UgdGhlIG1vZHVsZSBjYWNoZVxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5jID0gaW5zdGFsbGVkTW9kdWxlcztcblxuIFx0Ly8gZGVmaW5lIGdldHRlciBmdW5jdGlvbiBmb3IgaGFybW9ueSBleHBvcnRzXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmQgPSBmdW5jdGlvbihleHBvcnRzLCBuYW1lLCBnZXR0ZXIpIHtcbiBcdFx0aWYoIV9fd2VicGFja19yZXF1aXJlX18ubyhleHBvcnRzLCBuYW1lKSkge1xuIFx0XHRcdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCBuYW1lLCB7XG4gXHRcdFx0XHRjb25maWd1cmFibGU6IGZhbHNlLFxuIFx0XHRcdFx0ZW51bWVyYWJsZTogdHJ1ZSxcbiBcdFx0XHRcdGdldDogZ2V0dGVyXG4gXHRcdFx0fSk7XG4gXHRcdH1cbiBcdH07XG5cbiBcdC8vIGdldERlZmF1bHRFeHBvcnQgZnVuY3Rpb24gZm9yIGNvbXBhdGliaWxpdHkgd2l0aCBub24taGFybW9ueSBtb2R1bGVzXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLm4gPSBmdW5jdGlvbihtb2R1bGUpIHtcbiBcdFx0dmFyIGdldHRlciA9IG1vZHVsZSAmJiBtb2R1bGUuX19lc01vZHVsZSA/XG4gXHRcdFx0ZnVuY3Rpb24gZ2V0RGVmYXVsdCgpIHsgcmV0dXJuIG1vZHVsZVsnZGVmYXVsdCddOyB9IDpcbiBcdFx0XHRmdW5jdGlvbiBnZXRNb2R1bGVFeHBvcnRzKCkgeyByZXR1cm4gbW9kdWxlOyB9O1xuIFx0XHRfX3dlYnBhY2tfcmVxdWlyZV9fLmQoZ2V0dGVyLCAnYScsIGdldHRlcik7XG4gXHRcdHJldHVybiBnZXR0ZXI7XG4gXHR9O1xuXG4gXHQvLyBPYmplY3QucHJvdG90eXBlLmhhc093blByb3BlcnR5LmNhbGxcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubyA9IGZ1bmN0aW9uKG9iamVjdCwgcHJvcGVydHkpIHsgcmV0dXJuIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbChvYmplY3QsIHByb3BlcnR5KTsgfTtcblxuIFx0Ly8gX193ZWJwYWNrX3B1YmxpY19wYXRoX19cbiBcdF9fd2VicGFja19yZXF1aXJlX18ucCA9IFwiXCI7XG5cbiBcdC8vIExvYWQgZW50cnkgbW9kdWxlIGFuZCByZXR1cm4gZXhwb3J0c1xuIFx0cmV0dXJuIF9fd2VicGFja19yZXF1aXJlX18oX193ZWJwYWNrX3JlcXVpcmVfXy5zID0gMjApO1xuXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHdlYnBhY2svYm9vdHN0cmFwIDk1OGMxMGI4ZTFlN2MyZGQ0OTRmIiwiLy8gY2F0ZWdvcnkgaG92ZXJcbiQoZnVuY3Rpb24oKSB7XG4gICAgJCgnW2RhdGEtY2FsbG91dC1ob3Zlci1yZXZlYWxdJykuaG92ZXIoZnVuY3Rpb24oKSB7XG4gICAgICAgICQodGhpcykuZmluZCgnLmNhbGxvdXQtZm9vdGVyJykuc2xpZGVEb3duKDI1MCk7XG4gICAgfSwgZnVuY3Rpb24oKSB7XG4gICAgICAgICQodGhpcykuZmluZCgnLmNhbGxvdXQtZm9vdGVyJykuc2xpZGVVcCgyNTApO1xuICAgIH0pO1xufSlcblxuXG4vLyBwczogZGlzYWJsZSBvbiBzbWFsbCBkZXZpY2VzIVxuIC8vIHZhciAkYW5pbWF0aW9uRWxlbWVudHMgPSAkKCcuYW5pbWF0aW9uLWVsZW1lbnQnKTtcbiAvLyB2YXIgJHdpbmRvdyA9ICQod2luZG93KTtcblxuIC8vIHBzOiBMZXQncyBGSVJTVCBkaXNhYmxlIHRyaWdnZXJpbmcgb24gc21hbGwgZGV2aWNlcyFcbi8vICB2YXIgaXNNb2JpbGUgPSB3aW5kb3cubWF0Y2hNZWRpYShcIm9ubHkgc2NyZWVuIGFuZCAobWF4LXdpZHRoOiA3NjhweClcIik7XG4vLyAgaWYgKGlzTW9iaWxlLm1hdGNoZXMpIHtcbi8vICAgICAgJGFuaW1hdGlvbkVsZW1lbnRzLnJlbW92ZUNsYXNzKCdhbmltYXRpb24tZWxlbWVudCcpO1xuLy8gIH1cbi8vXG4vLyAgZnVuY3Rpb24gY2hlY2tJZkluVmlldygpIHtcbi8vXG4vLyAgICAgIHZhciB3aW5kb3dIZWlnaHQgPSAkd2luZG93LmhlaWdodCgpO1xuLy8gICAgICB2YXIgd2luZG93VG9wUG9zaXRpb24gPSAkd2luZG93LnNjcm9sbFRvcCgpO1xuLy8gICAgICB2YXIgd2luZG93Qm90dG9tUG9zaXRpb24gPSAod2luZG93VG9wUG9zaXRpb24gKyB3aW5kb3dIZWlnaHQpO1xuLy9cbi8vICAgICAgJC5lYWNoKCRhbmltYXRpb25FbGVtZW50cywgZnVuY3Rpb24gKCkge1xuLy8gICAgICAgICAgdmFyICRlbGVtZW50ID0gJCh0aGlzKTtcbi8vICAgICAgICAgIHZhciBlbGVtZW50SGVpZ2h0ID0gJGVsZW1lbnQub3V0ZXJIZWlnaHQoKTtcbi8vICAgICAgICAgIHZhciBlbGVtZW50VG9wUG9zaXRpb24gPSAkZWxlbWVudC5vZmZzZXQoKS50b3A7XG4vLyAgICAgICAgICB2YXIgZWxlbWVudEJvdHRvbVBvc2l0aW9uID0gKGVsZW1lbnRUb3BQb3NpdGlvbiArIGVsZW1lbnRIZWlnaHQpO1xuLy9cbi8vIC8vY2hlY2sgdG8gc2VlIGlmIHRoaXMgY3VycmVudCBjb250YWluZXIgaXMgd2l0aGluIHZpZXdwb3J0XG4vLyAgICAgICAgICBpZiAoKGVsZW1lbnRCb3R0b21Qb3NpdGlvbiA+PSB3aW5kb3dUb3BQb3NpdGlvbikgJiZcbi8vICAgICAgICAgICAgICAoZWxlbWVudFRvcFBvc2l0aW9uIDw9IHdpbmRvd0JvdHRvbVBvc2l0aW9uKSkge1xuLy8gICAgICAgICAgICAgICRlbGVtZW50LmFkZENsYXNzKCdpbi12aWV3Jyk7XG4vLyAgICAgICAgICB9IGVsc2Uge1xuLy8gICAgICAgICAgICAgICRlbGVtZW50LnJlbW92ZUNsYXNzKCdpbi12aWV3Jyk7XG4vLyAgICAgICAgICB9XG4vLyAgICAgIH0pO1xuLy8gIH1cbi8vXG4vLyAgJHdpbmRvdy5vbignc2Nyb2xsIHJlc2l6ZScsIGNoZWNrSWZJblZpZXcpO1xuLy8gICR3aW5kb3cudHJpZ2dlcignc2Nyb2xsJyk7XG5cblxuIC8qIEBlbmQgdmlld3BvcnQgdHJpZ2dlciBzY3JpcHQgICovXG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gLi9zcmMvYXNzZXRzL2pzL2xpYi9jdXN0b20uanMiXSwic291cmNlUm9vdCI6IiJ9