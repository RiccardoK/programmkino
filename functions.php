<?php



    // Post Type »Filme«


    function wpv_cpt_filme() {

    	$labels = array(

    		'menu_name'             => 'Filme',
    		'name_admin_bar'        => 'Filme',
    		'all_items'             => 'Alle Filme',
    		'add_new_item'          => '',
    		'add_new'               => 'Neuen Film hinzufügen',

    	);
    	$args = array(
    		'label'                 => '',
    		'labels'                => $labels,
    		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', 'custom-fields', ),
        'taxonomies'	         	=> array('genres','sprachen'),
    		'hierarchical'          => false,
    		'public'                => true,
    		'show_ui'               => true,
    		'show_in_menu'          => true,
    		'menu_position'         => 20,
    		'menu_icon'             => 'dashicons-format-video',
    		'show_in_admin_bar'     => true,
    		'show_in_nav_menus'     => true,
    		'can_export'            => true,
    		'has_archive'           => true,
    		'exclude_from_search'   => false,
    		'publicly_queryable'    => true,
    		'capability_type'       => 'page',
    	);
    	register_post_type( 'filme', $args );

    }
    add_action( 'init', 'wpv_cpt_filme', 0 );




// Register Custom Taxonomy  GENRE
      function wpv_ct_genre() {

      	$labels = array(
      		'menu_name'                  => 'Genre',

      	);
      	$args = array(
      		'labels'                     => $labels,
      		'hierarchical'               => true,
      		'public'                     => true,
      		'show_ui'                    => true,
      		'show_admin_column'          => true,
      		'show_in_nav_menus'          => true,
      		'show_tagcloud'              => true,
      	);
      	register_taxonomy( 'genre', array( 'filme' ), $args );

      }
      add_action( 'init', 'wpv_ct_genre', 0 );



      // Register Custom Taxonomy  Sprachen
            function wpv_ct_sprachen() {

            	$labels = array(
            		'menu_name'                  => 'Sprachen',

            	);
            	$args = array(
            		'labels'                     => $labels,
            		'hierarchical'               => true,
            		'public'                     => true,
            		'show_ui'                    => true,
            		'show_admin_column'          => true,
            		'show_in_nav_menus'          => true,
            		'show_tagcloud'              => true,
            	);
            	register_taxonomy( 'sprachen', array( 'filme' ), $args );

            }
            add_action( 'init', 'wpv_ct_sprachen', 0 );



      // Custom Headers
      //#####################


      $defaults = array(
        //Weite aus Css entnehmen (1100)
        	'width'                  => 1100,
        	'height'                 => 200,
        	'flex-height'            => true,
        	'flex-width'             => true,

        );
        add_theme_support( 'custom-header', $defaults );



      // Custom backgrounds
      //#####################
      //Festlegen der Standartfarbe des themes
      $defaults = array(
      	'default-color'          => '#122F00',
      	'default-image'          => '',
);


  add_theme_support( 'custom-background', $defaults );




    // Beitragsbilder
    //#####################


    add_theme_support( 'post-thumbnails' );
    add_image_size( 'filme', 210, 294 );




    // Navi

    add_action( 'after_setup_theme', 'wpv_register_nav' );

    function wpv_register_nav() {
      register_nav_menu('nav_main','Navigation links am Desktop');
      register_nav_menu('nav_social','Navigation links im Footer am Desktop');
      register_nav_menu('nav_secondary','Navigation rechts im Footer am Desktop');
    }


    // Beitragsformate

     add_theme_support( 'post-formats', array( 'video', 'gallery' ) );


    // Sidebars / Widgets

    add_action( 'widgets_init', 'wpv_register_sidebar' );

    function wpv_register_sidebar() {
        register_sidebar(
            array(
                'name' => 'Sidebar 1',
                'id' => 'sidebar-1',
                'description' => 'Rechts vom Inhalt, bzw. unter dem Inhalt',
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h5 class="widgettitle">',
                'after_title'   => '</h5>',
                )
            );
    }


    // Kommentare

    function wpv_comments( $comment, $args, $depth ) { $GLOBALS['comment'] = $comment; ?>

    <li class="single-comment">
     <?php echo get_avatar( $comment, $size='90' ); ?>
     <p><?php echo get_comment_author_link(); ?></p>
     <p><?php echo get_comment_date("d.m.Y"); ?>, <?php echo get_comment_time(); ?> Uhr</p>
     <?php comment_text(); ?>

    <div class="reply">
            <?php comment_reply_link(array_merge($args, array ('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>

    <?php }




    // Styles and Scripts

        add_action( 'wp_enqueue_scripts', 'wpv_register_styles' );

        function wpv_register_styles() {

            wp_register_style( 'normalize', get_template_directory_uri() . '/css/normalize.css' );
            wp_enqueue_style( 'normalize' );

            wp_register_style( 'style', get_stylesheet_uri());
            wp_enqueue_style( 'style' );

            wp_register_style( 'slick', get_template_directory_uri() . '/css/slick.css' );
            wp_enqueue_style( 'slick' );

            wp_register_style( 'lightbox', get_template_directory_uri() . '/css/lightbox.css' );
            wp_enqueue_style( 'lightbox' );
        }


        function wpv_register_scripts() {
         wp_register_script('slick', get_template_directory_uri() . '/js/slick.js', '', null, true);
         wp_enqueue_script('slick');

         wp_register_script('lightbox', get_template_directory_uri() . '/js/lightbox.js', '', null, true);
         wp_enqueue_script('lightbox');
         }

        add_action('wp_enqueue_scripts', 'wpv_register_scripts');


        // HTML5

   $args = array(
       'search-form',
       'comment-form',
       'comment-list',
       'gallery',
       'caption'
   );
   add_theme_support( 'html5', $args );



//Festlegen der "Content width"!!
//#####################################

    if ( ! isset( $content_width ) ) {
    	$content_width = 507;
    }

    //Add Shortcode Simple !!
    //#####################################
    // Add Shortcode
    function wpv_shortcode1( $atts ) {

          // Attributes
          extract( shortcode_atts(
              array(
                  'htmltag' => 'h3',
              ), $atts )
          );

          return '<' . $htmltag . '>In diesem Film kostet Popcorn nur 2 Euro!</' . $htmltag . '>';
      }
      add_shortcode( 'popcorn', 'wpv_shortcode1' );



            //Add  "umschliessender Shortcode" !!
            //#####################################
            // Add Shortcode
            //Info über "umschliessenden SC" :   = null
            function wpv_shortcode2( $atts, $content = null ) {
               // rendern von <div> mit Klasse "Infobox"; überschrift H3
               //Inhalt ist der umschlossene Satz im Backend
                return '<div class="infobox"><h3>Info:</h3>'.$content.'</div>';
            }

            add_shortcode( 'infobox', 'wpv_shortcode2' );



            // Customizer
            require_once(get_template_directory() . '/customizer.php');



            // Custom TinyMCE

            // Callback function to insert 'styleselect' into the $buttons array
            function my_mce_buttons_2( $buttons ) {
                array_unshift( $buttons, 'styleselect' );
                return $buttons;
            }
            // Register our callback to the appropriate filter
            add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );


?>
