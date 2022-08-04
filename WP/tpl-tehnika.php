<? /* Template Name: Техника */ ?>

<?php get_header(); ?>
<main class="content">
  <div class="equipment" id="equipment">
    <div class="container">
      <h1 class="equipment__header"><?php get_field('h1_header') ? the_field('h1_header') : the_title(); ?></h1>
      <div class="equipment__subheader subheader"><? the_field('ip_equipment_subheader'); ?></div>
      <div class="equipment__text"><? the_field('ip_equipment_text'); ?></div>
      <div class="equipment-items">
        <?php echo do_shortcode('[pods name="tehnika" template="equipment" limit="-1" orderby="post_date ASC"]'); ?>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>
