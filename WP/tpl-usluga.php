<?php
/*
Template Name: Услуга
Template Post Type: post, page, uslugi
*/

global $post;
$post_slug = $post->post_name;

?>

<?php get_header(); ?>
  <main class="content">
  <div class="service-intro">
    <div class="container">
      <div class="service-intro__inner">
        <div class="services__item-text-part">
          <?php if(get_field('service_intro_header')): ?>
            <h1><?php the_field('service_intro_header'); ?></h1>
          <?php else: ?>
            <h1><?php the_title(); ?></h1>
          <?php endif; ?>
          <?php the_field('service_intro_text'); ?>
        </div>
        <div class="service-intro__image-part">
          <?php if (get_field('service_intro_image')): ?>
            <img src="<?php the_field('service_intro_image'); ?>" alt="<?php the_title(); ?>" class="service-intro__image">
          <?php else: ?>
            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="service-intro__image">
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <?php if (get_field('service_types_header')): ?>
  <div class="service-types">
    <div class="container">
      <h2 class="service-types__header"><?php the_field('service_types_header'); ?></h2>
      <?php if (get_field('service_types_text')): ?>
        <p class="service-types__text"><?php the_field('service_types_text'); ?></p>
      <?php endif; ?>
      <div class="service-types-items">
        <?php
        $ID = get_the_ID();
          echo do_shortcode('[pods name="uslugi" limit="-1" template="service" where="post_parent='.$ID.'" orderby="post_date ASC"]');
        ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <?php if (get_field('service_scheme_header')): ?>
  <div class="service-scheme">
    <div class="container">
      <h2 class="service-scheme__header"><?php the_field('service_scheme_header'); ?></h2>
      <p class="service-scheme__text"><?php the_field('service_scheme_text_top'); ?></p>
      <div class="service-scheme-items">
        <?php 
        $fields = CFS()->get( 'scheme' );
        if( !empty($fields) ):
        foreach ( $fields as $field ) {
            ?>
              <div class="service-scheme__item">
                <h3><?php echo $field['header']; ?></h3>
                <p><?php echo $field['text2']; ?></p>
              </div>
        <?php }; endif;?>
      </div>
      <?php the_field('service_scheme_text_bottom'); ?>
    </div>
  </div>
  <?php endif; ?>
  <?php if (get_field('service_portfolio_header')): ?>
  <div class="service-portfolio portfolio">
    <div class="container">
      <h2 class="service-portfolio__header"><?php the_field('service_portfolio_header'); ?></h2>
      <p class="service-portfolio__text"><?php the_field('service_portfolio_text'); ?></p>
      <div class="portfolio-items">
        <?php
        echo do_shortcode('[pods name="proekty" template="portfolio_inner" limit="-1" where="ping.slug=\'{@post_name}\'" orderby="menu_order DESC"]');
        ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <?php if (get_field('service_equipment_header')): ?>
  <div class="service-equipment">
    <div class="container">
      <h2 class="service-equipment__header"><?php the_field('service_equipment_header'); ?></h2>
      <p class="service-equipment__text"><?php the_field('service_equipment_text'); ?></p>
      <div class="equipment-items">
        <?php
        echo do_shortcode('[pods name="tehnika" template="equipment" limit="-1" where="ping.slug=\'{@post_name}\'" orderby="menu_order DESC"]');
        ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
    <div class="order" id="order">
    <div class="container">
      <div class="order__inner flex">
        <div class="order__left">
          <h2 class="order__header"><?php the_field('mp_order_header', 2); ?></h2>
          <form class="order-form flex jcsb" id="order-form">
            <input type="hidden" name="act" value="order">
            <input type="hidden" name="service" value="<?php the_title(); ?>">
            <label class="order-form__label order-form__label-address">
              <div class="order-form__label-text">Укажите адрес объекта</div>
              <input class="order-form__input" type="text" name="address" placeholder="Напишите здесь адрес объекта">
            </label>
            <label class="order-form__label order-form__label-name">
              <div class="order-form__label-text">Ваше имя</div>
              <input class="order-form__input" type="text" name="name" placeholder="Имя">
            </label>
            <label class="order-form__label order-form__label-phone">
              <div class="order-form__label-text">Ваш номер телефона</div>
              <input class="order-form__input" type="text" name="phone" placeholder="+7 (___) ___-__-__" required>
            </label>
            <label class="order-form__label order-form__label-comment">
              <div class="order-form__label-text">Комментарии к заявке</div>
              <textarea class="order-form__textarea" name="comment" placeholder="Тут вы можете указать индивидуальные особенность вашего объекта или задать вопросы"></textarea>
            </label>
            <div class="order-form__file-wrap flex jcsb">
              <label class="order-form__label order-form__label-file" data-name="Прикрепите проект постройки">
                <input class="order-form__input order-form__input-file" type="file" name="file">
                <div class="name"></div>
              </label>
              <div class="delete"></div>
              <div class="order-form__file-text">Размер файла — не более 5 мб (doc, pdf, jpg, png, bmp)</div>
            </div>
            <button class="order-form__button btn btn_yellow" type="submit"><span>Отправить заявку</span></button>
            <label class="order-form__label order-form__label-privacy">
              <input type="checkbox" required>Принимаю условия обработки моих данных в соответствии с <a href="<?php the_field('privacy_link', 2); ?>">политикой обработки данных</a>
            </label>
          </form>
        </div>
        <div class="order__right"><img class="order__image" src="<?php the_field('mp_order_image', 2); ?>" alt=""></div>
      </div>
    </div>
  </div>
  </main>
<?php get_footer(); ?>
