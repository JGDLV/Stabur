<?php get_header(); ?>
  <main class="content">
    <div class="container">
      <div class="inner-content">
        <h1><?php get_field('h1_header') ? the_field('h1_header') : the_title(); ?></h1>
        <?php if (get_field('subheader')): ?>
          <p class="subheader"><?php the_field('subheader'); ?></p>
        <?php endif; ?>
        <?php echo $text; ?>
        <?php the_post(); the_content(); ?>
      </div>
    </div>
  </main>
<?php get_footer(); ?>
