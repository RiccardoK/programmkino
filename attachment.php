<?php get_header();?>

<main class="site-main">

    <article class="site-content">


        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <h1><?php the_title();?></h1>

        <?php if(wp_attachment_is_image()) {?>
        <img src="<?php echo wp_get_attachment_url(); ?>" alt="<?php the_title();?>" >
        <?php } else { ?>

        <a href="<?php echo wp_get_attachment_url(); ?>" target="_blank">Datei öffnen</a>

        <?php } ?>

        <?php the_excerpt();?>
        <?php the_content();?>




        <?php endwhile; else : ?>
            <?php get_template_part('template_parts/content','error');?>
        <?php endif; ?>


    </article>


</main>

<?php get_footer();?>
