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

?>
