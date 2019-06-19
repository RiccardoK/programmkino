<?php get_header();?>

<main class="site-main">

    <article class="site-content">

        <h1><?php single_cat_title();?></h1>
        <?php echo category_description();?>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
           <?php get_template_part('template_parts/content', 'filme');?>
        <?php endwhile; else : ?>
            <?php get_template_part('template_parts/content','error');?>
        <?php endif; ?>

        <?php previous_posts_link();?>
        <?php next_posts_link();?>

    </article>

    <?php get_sidebar();?>
</main>

<?php get_footer();?>
