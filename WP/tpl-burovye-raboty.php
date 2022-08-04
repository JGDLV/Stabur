<?php
/*
Template Name: Буровые работы
Template Post Type: post, page, uslugi
*/
?>

<?php get_header(); ?>
  <main class="content">
    <?php
      global $post;
      $post_slug = $post->post_name;
    ?>
    <!-- <div class="portfolio">
      <div class="container">
        <h2 class="service-portfolio__header">Выполненные проекты по изысканиям для строительства</h2>
        <div class="portfolio-items">
          <?php
          // echo do_shortcode('[pods name="proekty" template="portfolio_inner" limit="-1" where="ping.slug=\'{@post_name}\'" orderby="menu_order DESC"]');
          ?>
        </div>
      </div>
    </div> -->
    <div class="order" id="order">
    <div class="container">
      <div class="order__inner flex">
        <div class="order__left">
          <h2 class="order__header"><?php the_field('mp_order_header', 2); ?></h2>
          <form class="order-form flex jcsb" id="order-form">
            <input type="hidden" name="act" value="order">
            <input type="hidden" name="service" value="">
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
