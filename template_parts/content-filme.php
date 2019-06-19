<section <?php post_class();?>>


<?php if(is_page(9)  || is_archive()) { ?>
    <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
<?php } else { ?>
    <h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
<?php } ?>


            <!-- //Ausgabe der Taxonomy in "Single-filme.php" -->
            <p class="post-meta">

              <?php echo get_the_term_list( $post->ID, 'genre', 'Genre: ', ', ' ); ?>
              <?php echo get_the_term_list( $post->ID, 'sprachen', 'Sprache: ', ', ' ); ?>

            </p>
            <?php the_post_thumbnail('medium'); ?>
            <?php the_content('Weiterlesen »');?>

</section>
