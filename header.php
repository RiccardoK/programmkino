<!DOCTYPE html>
<html lang="<?php bloginfo('language');?>">
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php wp_title('');?> <?php bloginfo('name');?></title>



    <?php wp_enqueue_script('jquery');?>
    <?php wp_enqueue_script('comment-reply'); ?>
    <?php wp_head();?>
</head>

<body <?php body_class();?>>

<div class="container">  <!-- Container beginnt; ended in footer -->

<header class="site-header">
  <!-- //  Logobereich oben //  -->
    <a class="logo" href="<?php echo home_url('/');?>">
        <?php bloginfo('name');?> – <?php bloginfo('description');?>
    </a>


    <?php get_search_form();?>


    <nav class="site-nav">
         <?php

          $args = array(
              'theme_location' => 'nav_main',
              'depth' => 2,
              'container' => ''
          );

          wp_nav_menu($args);?>
      </nav>
</header>
