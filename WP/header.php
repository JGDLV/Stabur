<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php bloginfo('name'); ?></title>
    <meta name="description" content="Главная страница">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <?php wp_head(); ?>
  </head>
  <body <?php if(is_front_page()) { echo ''; } else { echo 'class="inner"'; } ?>>
    <?php
      $symbols = [' ', '(', ')', '-'];
      $phone_fixed = str_replace($symbols, '', get_field('phone', 2));
    ?>
    <header class="header">
      <div class="container">
        <div class="header__inner flex">
          <div class="logo">
            <?php the_custom_logo($blog_id); ?>
            <p class="tagline"><?php the_field('tagline', 2); ?></p>
          </div>
          <div class="menu">
            <?php wp_nav_menu( [
              'theme_location'  => 'top',
              'container'       => false,
              'menu_class'      => 'menu',
              'menu_id'         => 'menu',
              'echo'            => true,
              'items_wrap'      => '<ul class="menu-items flex">%3$s</ul>',
              'depth'           => 0,
            ] ); ?>
          </div>
          <div class="contacts">
            <a class="contacts__phone" href="tel:<?php echo $phone_fixed; ?>"><?php the_field('phone', 2); ?></a>
            <p class="contacts__whours"><?php the_field('whours', 2); ?></p>
          </div><a class="callback btn btn_yellow" href="<?php the_field('callback_link', 2); ?>"><span><?php the_field('callback_text', 2); ?></span></a>
          <div class="menu-toggle"><i class="icon-toggle"><span></span><span></span><span></span></i></div>
        </div>
      </div>
      <?php if (is_front_page()): ?>
        <div class="intro" id="intro">
        <div class="container">
          <h1 class="intro__header"><?php the_field('intro_header'); ?></h1>
          <div class="intro__list"><?php the_field('intro_text'); ?></div>
          <a class="intro__button btn btn_yellow" href="<?php the_field('intro_button_href'); ?>"><span><?php the_field('intro_button_text'); ?></span></a>
          <div class="intro__video">
            <div class="intro__video-inner paused">
              <video src="<?php the_field('intro_video_src'); ?>" poster="<?php the_field('intro_video_poster'); ?>"></video>
            </div>
          </div>
        </div>
      </div>
      <?php endif; ?>
    </header>
