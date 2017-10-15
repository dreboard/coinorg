<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script>
<!-- This loads the YouTube IFrame Player API code -->
<script src="http://www.youtube.com/player_api"></script>
<script src="../../js/fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="../../js/fancybox.css"/>
<script type="text/javascript">

// Fires whenever a player has finished loading
function onPlayerReady(event) {
    event.target.playVideo();
}

// Fires when the player's state changes.
function onPlayerStateChange(event) {
    // Go to the next video after the current one is finished playing
    if (event.data === 0) {
        $.fancybox.next();
    }
}

// The API will call this function when the page has finished downloading the JavaScript for the player API
function onYouTubePlayerAPIReady() {
    
    // Initialise the fancyBox after the DOM is loaded
    $(document).ready(function() {
        $(".fancybox")
            .attr('rel', 'gallery')
            .fancybox({
                openEffect  : 'none',
                closeEffect : 'none',
                nextEffect  : 'none',
                prevEffect  : 'none',
                padding     : 0,
                margin      : 50,
                beforeShow  : function() {
                    // Find the iframe ID
                    var id = $.fancybox.inner.find('iframe').attr('id');
                    
                    // Create video player object and add event listeners
                    var player = new YT.Player(id, {
                        events: {
                            'onReady': onPlayerReady,
                            'onStateChange': onPlayerStateChange
                        }
                    });
                }
            });
    });
    
}

</script>
<style type="text/css">
.fancybox-nav {
    width: 60px;       
}

.fancybox-nav span {
    visibility: visible;
}

.fancybox-next {
    right: -60px;
}

.fancybox-prev {
    left: -60px;
}
</style>
</head>

<body>
<p>Using Fancy</p>
<a class="fancybox fancybox.iframe" href="http://www.youtube.com/embed/L9szn1QQfas?enablejsapi=1&wmode=opaque">Video #1</a>

<br />

<a class="fancybox fancybox.iframe" href="http://www.youtube.com/embed/cYplvwBvGA4?enablejsapi=1&wmode=opaque">Video #2</a>
<p>&nbsp;</p>
</body>
</html>