<section <?php post_class();?>>
    <div class="single-film">
            <a href="<?php the_permalink();?>">
                <?php the_post_thumbnail('filme');?>
            </a>
            <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
    </div>
</section> 
