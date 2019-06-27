<?php

/* Template Name: Keine Sidebar */

/* Seiteninhalt für Programm */
/* #########################r */



get_header();?>

<main class="site-main">

    <article class="site-content">


        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
           <?php get_template_part('template_parts/content','page');?>
        <?php endwhile; else : ?>
            <?php get_template_part('template_parts/content','error');?>
        <?php endif; ?>





        <!--/* Definieren welcher Post angezeigt wird*/
        /* ###################################### */-->

        <?php

        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

        $args = array(
            'post_type' => 'filme',
            'posts_per_page' => 3,
            'paged' => $paged
        );

        /*
       'meta_query' => array(
           array(
               'key' => 'wpv_film_fsk',
               'value' => '16',
           ),
       ),
       */





        /* Übergeben der Argumente (args)  in Wp Query and dann Loopen der Beiträge  */
        /* ###################################### */

        $loop2 = new WP_Query($args);

        if ( $loop2->have_posts() ) : while ( $loop2->have_posts() ) : $loop2->the_post(); ?>
           <?php get_template_part('template_parts/content', 'filme');?>
        <?php endwhile; else : ?>
            <?php get_template_part('template_parts/content','error');?>
        <?php endif; ?>

        <?php previous_posts_link('« Vorherige Seite', $loop2->max_num_pages);?>
        <?php next_posts_link('Nächste Seite »', $loop2->max_num_pages);?>

        <?php wp_reset_postdata(); ?>


    </article>


</main>

<?php get_footer();?>
