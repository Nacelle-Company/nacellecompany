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
    $back_to_top = $('.cd-top');

    //hide or show the "back to top" link
    $(window).scroll(function () {
        $(this).scrollTop() > offset ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
        if ($(this).scrollTop() > offset_opacity) {
            $back_to_top.addClass('cd-fade-out');
        }
    });

    //smooth scroll to top
    $back_to_top.on('click', function (event) {
        event.preventDefault();
        $('body,html').animate({
            scrollTop: 0
        }, scroll_top_duration);
    });
});

/***/ }),

/***/ 20:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(10);


/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vd2VicGFjay9ib290c3RyYXAgOGY4OTE5YWI2NWIyYTQwYzIzYTIiLCJ3ZWJwYWNrOi8vLy4vc3JjL2Fzc2V0cy9qcy9saWIvY3VzdG9tLmpzIl0sIm5hbWVzIjpbIiQiLCJob3ZlciIsImZpbmQiLCJzbGlkZURvd24iLCJzbGlkZVVwIiwib2Zmc2V0Iiwib2Zmc2V0X29wYWNpdHkiLCJzY3JvbGxfdG9wX2R1cmF0aW9uIiwiJGJhY2tfdG9fdG9wIiwid2luZG93Iiwic2Nyb2xsIiwic2Nyb2xsVG9wIiwiYWRkQ2xhc3MiLCJyZW1vdmVDbGFzcyIsIm9uIiwiZXZlbnQiLCJwcmV2ZW50RGVmYXVsdCIsImFuaW1hdGUiXSwibWFwcGluZ3MiOiI7QUFBQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7O0FBR0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsYUFBSztBQUNMO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsbUNBQTJCLDBCQUEwQixFQUFFO0FBQ3ZELHlDQUFpQyxlQUFlO0FBQ2hEO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLDhEQUFzRCwrREFBK0Q7O0FBRXJIO0FBQ0E7O0FBRUE7QUFDQTs7Ozs7Ozs7Ozs7QUM3REE7QUFDQUEsRUFBRSxZQUFXOztBQUdUQSxNQUFFLDZCQUFGLEVBQWlDQyxLQUFqQyxDQUF1QyxZQUFXO0FBQzlDRCxVQUFFLElBQUYsRUFBUUUsSUFBUixDQUFhLGlCQUFiLEVBQWdDQyxTQUFoQyxDQUEwQyxHQUExQztBQUNILEtBRkQsRUFFRyxZQUFXO0FBQ1ZILFVBQUUsSUFBRixFQUFRRSxJQUFSLENBQWEsaUJBQWIsRUFBZ0NFLE9BQWhDLENBQXdDLEdBQXhDO0FBQThDLEtBSGxEOztBQUtFO0FBQ0E7QUFDQTs7QUFFRDtBQUNBLFFBQUlDLFNBQVMsR0FBYjs7QUFDQztBQUNBQyxxQkFBaUIsSUFGbEI7O0FBR0M7QUFDQUMsMEJBQXNCLEdBSnZCOztBQUtDO0FBQ0FDLG1CQUFlUixFQUFFLFNBQUYsQ0FOaEI7O0FBUUE7QUFDQUEsTUFBRVMsTUFBRixFQUFVQyxNQUFWLENBQWlCLFlBQVU7QUFDeEJWLFVBQUUsSUFBRixFQUFRVyxTQUFSLEtBQXNCTixNQUF4QixHQUFtQ0csYUFBYUksUUFBYixDQUFzQixlQUF0QixDQUFuQyxHQUE0RUosYUFBYUssV0FBYixDQUF5QiwyQkFBekIsQ0FBNUU7QUFDQSxZQUFJYixFQUFFLElBQUYsRUFBUVcsU0FBUixLQUFzQkwsY0FBMUIsRUFBMkM7QUFDMUNFLHlCQUFhSSxRQUFiLENBQXNCLGFBQXRCO0FBQ0E7QUFDRCxLQUxEOztBQU9BO0FBQ0FKLGlCQUFhTSxFQUFiLENBQWdCLE9BQWhCLEVBQXlCLFVBQVNDLEtBQVQsRUFBZTtBQUN2Q0EsY0FBTUMsY0FBTjtBQUNBaEIsVUFBRSxXQUFGLEVBQWVpQixPQUFmLENBQXVCO0FBQ3RCTix1QkFBVztBQURXLFNBQXZCLEVBRUtKLG1CQUZMO0FBSUEsS0FORDtBQVNKLENBdkNELEUiLCJmaWxlIjoiY3VzdG9tLmpzIiwic291cmNlc0NvbnRlbnQiOlsiIFx0Ly8gVGhlIG1vZHVsZSBjYWNoZVxuIFx0dmFyIGluc3RhbGxlZE1vZHVsZXMgPSB7fTtcblxuIFx0Ly8gVGhlIHJlcXVpcmUgZnVuY3Rpb25cbiBcdGZ1bmN0aW9uIF9fd2VicGFja19yZXF1aXJlX18obW9kdWxlSWQpIHtcblxuIFx0XHQvLyBDaGVjayBpZiBtb2R1bGUgaXMgaW4gY2FjaGVcbiBcdFx0aWYoaW5zdGFsbGVkTW9kdWxlc1ttb2R1bGVJZF0pIHtcbiBcdFx0XHRyZXR1cm4gaW5zdGFsbGVkTW9kdWxlc1ttb2R1bGVJZF0uZXhwb3J0cztcbiBcdFx0fVxuIFx0XHQvLyBDcmVhdGUgYSBuZXcgbW9kdWxlIChhbmQgcHV0IGl0IGludG8gdGhlIGNhY2hlKVxuIFx0XHR2YXIgbW9kdWxlID0gaW5zdGFsbGVkTW9kdWxlc1ttb2R1bGVJZF0gPSB7XG4gXHRcdFx0aTogbW9kdWxlSWQsXG4gXHRcdFx0bDogZmFsc2UsXG4gXHRcdFx0ZXhwb3J0czoge31cbiBcdFx0fTtcblxuIFx0XHQvLyBFeGVjdXRlIHRoZSBtb2R1bGUgZnVuY3Rpb25cbiBcdFx0bW9kdWxlc1ttb2R1bGVJZF0uY2FsbChtb2R1bGUuZXhwb3J0cywgbW9kdWxlLCBtb2R1bGUuZXhwb3J0cywgX193ZWJwYWNrX3JlcXVpcmVfXyk7XG5cbiBcdFx0Ly8gRmxhZyB0aGUgbW9kdWxlIGFzIGxvYWRlZFxuIFx0XHRtb2R1bGUubCA9IHRydWU7XG5cbiBcdFx0Ly8gUmV0dXJuIHRoZSBleHBvcnRzIG9mIHRoZSBtb2R1bGVcbiBcdFx0cmV0dXJuIG1vZHVsZS5leHBvcnRzO1xuIFx0fVxuXG5cbiBcdC8vIGV4cG9zZSB0aGUgbW9kdWxlcyBvYmplY3QgKF9fd2VicGFja19tb2R1bGVzX18pXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLm0gPSBtb2R1bGVzO1xuXG4gXHQvLyBleHBvc2UgdGhlIG1vZHVsZSBjYWNoZVxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5jID0gaW5zdGFsbGVkTW9kdWxlcztcblxuIFx0Ly8gZGVmaW5lIGdldHRlciBmdW5jdGlvbiBmb3IgaGFybW9ueSBleHBvcnRzXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmQgPSBmdW5jdGlvbihleHBvcnRzLCBuYW1lLCBnZXR0ZXIpIHtcbiBcdFx0aWYoIV9fd2VicGFja19yZXF1aXJlX18ubyhleHBvcnRzLCBuYW1lKSkge1xuIFx0XHRcdE9iamVjdC5kZWZpbmVQcm9wZXJ0eShleHBvcnRzLCBuYW1lLCB7XG4gXHRcdFx0XHRjb25maWd1cmFibGU6IGZhbHNlLFxuIFx0XHRcdFx0ZW51bWVyYWJsZTogdHJ1ZSxcbiBcdFx0XHRcdGdldDogZ2V0dGVyXG4gXHRcdFx0fSk7XG4gXHRcdH1cbiBcdH07XG5cbiBcdC8vIGdldERlZmF1bHRFeHBvcnQgZnVuY3Rpb24gZm9yIGNvbXBhdGliaWxpdHkgd2l0aCBub24taGFybW9ueSBtb2R1bGVzXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLm4gPSBmdW5jdGlvbihtb2R1bGUpIHtcbiBcdFx0dmFyIGdldHRlciA9IG1vZHVsZSAmJiBtb2R1bGUuX19lc01vZHVsZSA/XG4gXHRcdFx0ZnVuY3Rpb24gZ2V0RGVmYXVsdCgpIHsgcmV0dXJuIG1vZHVsZVsnZGVmYXVsdCddOyB9IDpcbiBcdFx0XHRmdW5jdGlvbiBnZXRNb2R1bGVFeHBvcnRzKCkgeyByZXR1cm4gbW9kdWxlOyB9O1xuIFx0XHRfX3dlYnBhY2tfcmVxdWlyZV9fLmQoZ2V0dGVyLCAnYScsIGdldHRlcik7XG4gXHRcdHJldHVybiBnZXR0ZXI7XG4gXHR9O1xuXG4gXHQvLyBPYmplY3QucHJvdG90eXBlLmhhc093blByb3BlcnR5LmNhbGxcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubyA9IGZ1bmN0aW9uKG9iamVjdCwgcHJvcGVydHkpIHsgcmV0dXJuIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbChvYmplY3QsIHByb3BlcnR5KTsgfTtcblxuIFx0Ly8gX193ZWJwYWNrX3B1YmxpY19wYXRoX19cbiBcdF9fd2VicGFja19yZXF1aXJlX18ucCA9IFwiXCI7XG5cbiBcdC8vIExvYWQgZW50cnkgbW9kdWxlIGFuZCByZXR1cm4gZXhwb3J0c1xuIFx0cmV0dXJuIF9fd2VicGFja19yZXF1aXJlX18oX193ZWJwYWNrX3JlcXVpcmVfXy5zID0gMjApO1xuXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHdlYnBhY2svYm9vdHN0cmFwIDhmODkxOWFiNjViMmE0MGMyM2EyIiwiLy8gY2F0ZWdvcnkgaG92ZXJcbiQoZnVuY3Rpb24oKSB7XG5cblxuICAgICQoJ1tkYXRhLWNhbGxvdXQtaG92ZXItcmV2ZWFsXScpLmhvdmVyKGZ1bmN0aW9uKCkge1xuICAgICAgICAkKHRoaXMpLmZpbmQoJy5jYWxsb3V0LWZvb3RlcicpLnNsaWRlRG93bigyNTApO1xuICAgIH0sIGZ1bmN0aW9uKCkge1xuICAgICAgICAkKHRoaXMpLmZpbmQoJy5jYWxsb3V0LWZvb3RlcicpLnNsaWRlVXAoMjUwKTt9KTtcblxuICAgICAgLy8gLy8gLy8gLy8gLy8gLy9cbiAgICAgIC8vIHNjcm9sbCB0byB0b3BcbiAgICAgIC8vIC8vIC8vIC8vIC8vIC8vXG5cbiAgICBcdC8vIGJyb3dzZXIgd2luZG93IHNjcm9sbCAoaW4gcGl4ZWxzKSBhZnRlciB3aGljaCB0aGUgXCJiYWNrIHRvIHRvcFwiIGxpbmsgaXMgc2hvd25cbiAgICBcdHZhciBvZmZzZXQgPSAzMDAsXG4gICAgXHRcdC8vYnJvd3NlciB3aW5kb3cgc2Nyb2xsIChpbiBwaXhlbHMpIGFmdGVyIHdoaWNoIHRoZSBcImJhY2sgdG8gdG9wXCIgbGluayBvcGFjaXR5IGlzIHJlZHVjZWRcbiAgICBcdFx0b2Zmc2V0X29wYWNpdHkgPSAxMjAwLFxuICAgIFx0XHQvL2R1cmF0aW9uIG9mIHRoZSB0b3Agc2Nyb2xsaW5nIGFuaW1hdGlvbiAoaW4gbXMpXG4gICAgXHRcdHNjcm9sbF90b3BfZHVyYXRpb24gPSA3MDAsXG4gICAgXHRcdC8vZ3JhYiB0aGUgXCJiYWNrIHRvIHRvcFwiIGxpbmtcbiAgICBcdFx0JGJhY2tfdG9fdG9wID0gJCgnLmNkLXRvcCcpO1xuXG4gICAgXHQvL2hpZGUgb3Igc2hvdyB0aGUgXCJiYWNrIHRvIHRvcFwiIGxpbmtcbiAgICBcdCQod2luZG93KS5zY3JvbGwoZnVuY3Rpb24oKXtcbiAgICBcdFx0KCAkKHRoaXMpLnNjcm9sbFRvcCgpID4gb2Zmc2V0ICkgPyAkYmFja190b190b3AuYWRkQ2xhc3MoJ2NkLWlzLXZpc2libGUnKSA6ICRiYWNrX3RvX3RvcC5yZW1vdmVDbGFzcygnY2QtaXMtdmlzaWJsZSBjZC1mYWRlLW91dCcpO1xuICAgIFx0XHRpZiggJCh0aGlzKS5zY3JvbGxUb3AoKSA+IG9mZnNldF9vcGFjaXR5ICkge1xuICAgIFx0XHRcdCRiYWNrX3RvX3RvcC5hZGRDbGFzcygnY2QtZmFkZS1vdXQnKTtcbiAgICBcdFx0fVxuICAgIFx0fSk7XG5cbiAgICBcdC8vc21vb3RoIHNjcm9sbCB0byB0b3BcbiAgICBcdCRiYWNrX3RvX3RvcC5vbignY2xpY2snLCBmdW5jdGlvbihldmVudCl7XG4gICAgXHRcdGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XG4gICAgXHRcdCQoJ2JvZHksaHRtbCcpLmFuaW1hdGUoe1xuICAgIFx0XHRcdHNjcm9sbFRvcDogMCAsXG4gICAgXHRcdCBcdH0sIHNjcm9sbF90b3BfZHVyYXRpb25cbiAgICBcdFx0KTtcbiAgICBcdH0pO1xuXG5cbn0pXG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gLi9zcmMvYXNzZXRzL2pzL2xpYi9jdXN0b20uanMiXSwic291cmNlUm9vdCI6IiJ9