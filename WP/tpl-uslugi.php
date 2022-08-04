<? /* Template Name: Услуги */ ?>

<?php get_header(); ?>
<main class="content">
<div class="services" id="services">
  <div class="container">
    <h1 class="services__header"><?php get_field('h1_header') ? the_field('h1_header') : the_title(); ?></h1>
    <div class="services-items">
      <?php echo do_shortcode('[pods name="uslugi" template="services_inner" limit="-1" orderby="post_date ASC"]'); ?>
    </div>
  </div>
</div>
</main>
<?php get_footer(); ?>
