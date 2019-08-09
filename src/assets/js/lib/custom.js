import $ from 'jquery';

// category hover
$(function() {


    $('[data-callout-hover-reveal]').hover(function() {
        $(this).find('.callout-footer').slideDown(250);
    }, function() {
        $(this).find('.callout-footer').slideUp(250);});

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
    	$(window).scroll(function(){
    		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
    		if( $(this).scrollTop() > offset_opacity ) {
    			$back_to_top.addClass('cd-fade-out');
    		}
    	});

    	//smooth scroll to top
    	$back_to_top.on('click', function(event){
    		event.preventDefault();
    		$('body,html').animate({
    			scrollTop: 0 ,
    		 	}, scroll_top_duration
    		);
    	});


});


// var target = document.getElementById("partners-tabs");
// var options = {}; //Define options e.g. "option1" : "value1", etc.									

// var elem = new Foundation.Tabs($(target), options);
// var elem = $('[data-tabs]');

// // $('[data-tabs]').on('change.zf.tabs', function () {


// $('.tabs-title').on("mouseover", function () {
// 	//Find the associated panel id.
// 	var panelId = $(this).find("a").attr("href").substring(1);
// 	var tabContents = document.getElementById(panelId);
// 	//Use the "tabs" object to select the associated panel.
// 	elem.selectTab($(tabContents));
// 	//Show the tab contents.
// 	$(tabContents).show();
// }).on("mouseout", function () {
// 	var panelId = $(this).find("a").attr("href").substring(1);
// 	$(this).find("a").attr("aria-selected", "false");
// 	var tabContents = document.getElementById(panelId);
// 	//Hide the tab contents.
// 	$(tabContents).hide();
// });


$('.tabs-title').on("mouseover", function () {

	var $this = this;

	var tab_id = $($this).find('a').attr('href');


	// https://stackoverflow.com/a/6672579
	$($this)
		.addClass('is-active') //set the current as active
		.siblings("li") //find sibling h3 elements
		.removeClass("is-active") // and remove the active from them

	$(".tabs-content .tabs-panel").siblings().hide();

	$(".tabs-content .tabs-panel" + tab_id).show();

});

// wordpress video
// https://cfxdesign.com/how-to-make-the-wordpress-video-shortcode-responsive/
$(function () {
	$('.mejs-overlay-loading').closest('.mejs-overlay').addClass('load'); //just a helper class

	var $video = $('div.video video');
	var vidWidth = $video.attr('width');
	var vidHeight = $video.attr('height');

	$(window).resize(function () {
		var targetWidth = $(this).width(); //using window width here will proportion the video to be full screen; adjust as needed
		$('div.video, div.video .mejs-container').css('height', Math.ceil(vidHeight * (targetWidth / vidWidth)));
	}).resize();
});