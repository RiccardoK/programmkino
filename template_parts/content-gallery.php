<section <?php post_class();?>>


<?php if(is_page(13) || is_front_page() || is_archive()) { ?>
    <h2>Bildergalerie: <a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
<?php } else { ?>
    <h1>Bildergalerie: <a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
<?php } ?>

            <p class="post-meta">


                <?php if ( has_post_format( 'video' )) {
                  echo '<strong>Video: </strong>';
                } elseif ( has_post_format( 'gallery' )) {
                  echo '<strong>Bildergalerie: </strong>';
                } ?>


                Veröffentlicht am <?php the_time('d.m.Y');?> von <?php the_author();?>. <br>Kategorie: <?php the_category(', ');?> <?php the_tags();?></p>

            <?php the_post_thumbnail('medium'); ?>    <!-- // Medium resolution (300 x 300 max height 300px)-->
            <?php the_content('Weiterlesen »');?>

</section>
