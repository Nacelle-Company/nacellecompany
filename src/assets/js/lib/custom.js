// category hover
$(function() {
    $('[data-callout-hover-reveal]').hover(function() {
        $(this).find('.callout-footer').slideDown(250);
    }, function() {
        $(this).find('.callout-footer').slideUp(250);
    });
})


// sticky footer
$(window).bind("load", function () {
   var footer = $("#footer");
   var pos = footer.position();
   var height = $(window).height();
   height = height - pos.top;
   height = height - footer.height();
   if (height > 0) {
       footer.css({
           'margin-top': height + 'px'
       });
   }
});
