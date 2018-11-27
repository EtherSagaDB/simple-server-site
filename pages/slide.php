<link rel='stylesheet' type='text/css' href='/includes/slideshow.css' />

<script type="text/javascript">
<!--
function MM_effectHighlight(targetElement, duration, startColor, endColor, restoreColor, toggle)
{
	Spry.Effect.DoHighlight(targetElement, {duration: duration, from: startColor, to: endColor, restoreColor: restoreColor, toggle: toggle});
}
//-->
</script>
<script type="text/javascript">


function slideSwitch() {
    var $active = $('#slideshow IMG.active');

    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');

    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 5000 );
});

</script><center>
<div id="slideshow">
<img src="/img/slide1.png" alt="Slideshow Image 1" class="active" />
<img src="/img/slide2.png" alt="Slideshow Image 2" />
<img src="/img/slide3.png" alt="Slideshow Image 3" />
<img src="/img/slide4.png" alt="Slideshow Image 4" />
<img src="/img/slide5.png" alt="Slideshow Image 5" />
<img src="/img/slide6.png" alt="Slideshow Image 6" />
</div>
</center>



