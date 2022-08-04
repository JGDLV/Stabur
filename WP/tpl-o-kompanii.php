<? /* Template Name: О компании */ ?>

<?php get_header(); ?>
<main class="content">
  <div class="about" id="about">
    <div class="container">
      <h1 class="about__header"><?php get_field('h1_header') ? the_field('h1_header') : the_title(); ?></h1>
      <div class="about__text"><? the_field('ip_about_text'); ?></div>
      <div class="about__inner flex">
        <div class="about__left"><img class="about__image" src="<? the_field('mp_about_image', 2); ?>" alt=""></div>
        <div class="about__right">
          <div class="about__text_2"><? the_field('mp_about_text_2', 2); ?></div>
          <div class="about__right-text"><? the_field('ip_about_text_bottom'); ?></div>
        </div>
      </div>
    </div>
  </div>
  <div class="docs" id="docs">
    <div class="container">
      <div class="docs__inner flex">
        <div class="docs__left">
          <h2 class="docs__header"><? the_field('mp_docs_header', 2); ?></h2>
        </div>
        <div class="docs__right">
          <div class="swiper-container">
            <div class="docs-items swiper-wrapper">
              <?php echo do_shortcode('[pods name="docs" template="docs" limit="-1" orderby="post_date ASC"]'); ?>
            </div>
          </div>
          <div class="docs-buttons">
            <div class="swiper-button-prev docs-button-prev"></div>
            <div class="swiper-button-next docs-button-next"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="benefits" id="benefits">
    <div class="container">
      <div class="benefits-items flex">
      <?php 
      $fields = CFS()->get( 'reasons' );
      if( !empty($fields) ):
      foreach ( $fields as $field ) {
          ?>
            <div class="benefits__item"><?php echo $field['text']; ?></div>
      <?php }; endif;?>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>
