// hover effect
jQuery(document).ready(function() {
  jQuery('div.demo-show span').add('div.demo-show2 span').hover(function() {
    jQuery(this).addClass('hover');
  }, function() {
    jQuery(this).removeClass('hover');
  });
});

// independently show and hide
jQuery(document).ready(function() {
  jQuery('div.demo-show:eq(0) > div').hide();  
  jQuery('div.demo-show:eq(0) > span').click(function() {
    jQuery(this).next().slideToggle('fast');
  });
});

// one showing at a time

jQuery(document).ready(function() {
  jQuery('div.demo-show:eq(1) > div:gt(0)').hide();  
  jQuery('div.demo-show:eq(1) > span').click(function() {
    jQuery(this).next('div:hidden').slideDown('fast')
    .siblings('div:visible').slideUp('fast');
  });
});


//simultaneous showing and hiding

jQuery(document).ready(function() {
  jQuery('div.demo-show2:eq(0) > div').hide();
  jQuery('div.demo-show2:eq(0) > span').click(function() {
    jQuery(this).next('div').slideToggle('fast')
    .siblings('div:visible').slideUp('fast');
  });
});

//queued showing and hiding
jQuery(document).ready(function() {
  jQuery('div.demo-show2:eq(1) > div').hide();  
  jQuery('div.demo-show2:eq(1) > span').click(function() {
    var jQuerynextDiv = jQuery(this).next();
    var jQueryvisibleSiblings = jQuerynextDiv.siblings('div:visible');

    if (jQueryvisibleSiblings.length ) {
      jQueryvisibleSiblings.slideUp('fast', function() {
        jQuerynextDiv.slideToggle('fast');
      });
    } else {
       jQuerynextDiv.slideToggle('fast');
    }
  });
});

