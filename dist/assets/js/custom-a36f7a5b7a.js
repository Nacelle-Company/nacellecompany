!function(t){function e(a){if(o[a])return o[a].exports;var i=o[a]={i:a,l:!1,exports:{}};return t[a].call(i.exports,i,i.exports,e),i.l=!0,i.exports}var o={};return e.m=t,e.c=o,e.d=function(t,o,a){e.o(t,o)||Object.defineProperty(t,o,{configurable:!1,enumerable:!0,get:a})},e.n=function(t){var o=t&&t.__esModule?function(){return t["default"]}:function(){return t};return e.d(o,"a",o),o},e.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},e.p="",e(e.s=20)}({0:function(t,e){t.exports=jQuery},10:function(t,e,o){"use strict";function a(t){return t&&t.__esModule?t:{"default":t}}var i=o(0),l=a(i);(0,l["default"])(function(){(0,l["default"])("[data-callout-hover-reveal]").hover(function(){(0,l["default"])(this).find(".callout-footer").slideDown(250)},function(){(0,l["default"])(this).find(".callout-footer").slideUp(250)});var t=300,e=1200,o=700,a=(0,l["default"])(".cd-top");(0,l["default"])(window).scroll(function(){(0,l["default"])(this).scrollTop()>t?a.addClass("cd-is-visible"):a.removeClass("cd-is-visible cd-fade-out"),(0,l["default"])(this).scrollTop()>e&&a.addClass("cd-fade-out")}),a.on("click",function(t){t.preventDefault(),(0,l["default"])("body,html").animate({scrollTop:0},o)})}),(0,l["default"])(".tabs-title").on("mouseover",function(){var t=this,e=(0,l["default"])(t).find("a").attr("href");(0,l["default"])(t).addClass("is-active").siblings("li").removeClass("is-active"),(0,l["default"])(".tabs-content .tabs-panel").siblings().hide(),(0,l["default"])(".tabs-content .tabs-panel"+e).show()}),(0,l["default"])(function(){(0,l["default"])(".mejs-overlay-loading").closest(".mejs-overlay").addClass("load");var t=(0,l["default"])("div.video video"),e=t.attr("width"),o=t.attr("height");(0,l["default"])(window).resize(function(){var t=(0,l["default"])(this).width();(0,l["default"])("div.video, div.video .mejs-container").css("height",Math.ceil(o*(t/e)))}).resize()})},20:function(t,e,o){t.exports=o(10)}});