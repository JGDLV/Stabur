<? /* Template Name: Проекты */ ?>

<?php get_header(); ?>
<main class="content">
<div class="portfolio" id="portfolio">
  <div class="container">
    <h1 class="portfolio__header"><?php get_field('h1_header') ? the_field('h1_header') : the_title(); ?></h1>
    <div class="portfolio-items">
      <?php echo do_shortcode('[pods name="proekty" template="portfolio_inner" limit="-1" orderby="post_date ASC"]'); ?>
    </div>
  </div>
</div>
</main>
<?php get_footer(); ?>
