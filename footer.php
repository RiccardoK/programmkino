</div>
<footer class="site-footer">
    <div class="container">
    <nav class="nav-social">
        <?php

        $args = array(
            'theme_location' => 'nav_social',
            'depth' => 1,
            'container' => ''
        );

        wp_nav_menu($args);?>
    </nav>

    <nav class="nav-secondary">
        <?php

        $args = array(
            'theme_location' => 'nav_secondary',
            'depth' => 1,
            'container' => ''
        );

        wp_nav_menu($args);?>
    </nav>
    </div>
</footer>

<script>

  jQuery(document).ready(function() {
 		jQuery('html').addClass('js');

		 var navToggle = ['<div id="toggle-nav">Menu</div>'].join("");
		 jQuery(".site-header").prepend(navToggle)
  });

  jQuery(function() {
	  var pull 		= jQuery('#toggle-nav');
		  menu 		= jQuery('.site-nav');
		  menuHeight	= menu.height();

	  jQuery(pull).on('click', function(e) {
		  e.preventDefault();
		  menu.slideToggle();
	  });

	  jQuery(window).resize(function(){
		  var w = jQuery(window).width();
		  if(w > 710 && menu.is(':hidden')) {
			  menu.removeAttr('style');
		  }
	  });
  });

</script>

<?php wp_footer();?>


<!--  Funktion für Slider-->
<!--#####################-->
<script>

jQuery(document).ready(function(){
  jQuery('.container-filme').slick({
   infinite: true,
   slidesToShow: 3,
   slidesToScroll: 1,
    responsive: [
    {
      breakpoint: 500,
      settings: "unslick"
    }
  ]

  });
});

</script>


<!--  Funktion für Lightbox pic Beitrag-->
<!--#####################-->
<script>


jQuery(function( $ ){

  /* erzeugen von Selector für Links welche auf .jpg etc enden & hinzufügen Attribut "data-lightbox" */
 jQuery('a[href*=".jpg"], a[href*=".jpeg"], a[href*=".png"], a[href*=".gif"]').attr('data-lightbox','roadtrip');
});

</script>


</body>
</html>
