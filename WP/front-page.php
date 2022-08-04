<?php get_header(); ?>
<main class="content">
  <div class="services" id="services">
    <div class="container">
      <h2 class="services__header"><?php the_field('mp_services_header'); ?></h2>
      <div class="services-buttons">
        <div class="swiper-button-prev services-button-prev"></div>
        <div class="swiper-button-next services-button-next"></div>
      </div>
    </div>
    <div class="swiper-container">
      <div class="services-items swiper-wrapper">
        <?php echo do_shortcode('[pods name="uslugi" template="services" limit="-1" orderby="post_date ASC"]'); ?>
      </div>
    </div>
    <div class="container">
      <div class="swiper-scrollbar services-scrollbar"></div>
    </div>
  </div>
  <div class="equipment" id="equipment">
    <div class="container">
      <h2 class="equipment__header"><?php the_field('mp_equipment_header'); ?></h2>
      <div class="equipment__text"><?php the_field('mp_equipment_text'); ?></div>
    </div>
    <div class="swiper-container">
      <div class="equipment-items swiper-wrapper">
        <?php echo do_shortcode('[pods name="tehnika" template="equipment" limit="-1" orderby="post_date ASC"]'); ?>
      </div>
      <div class="equipment-buttons">
        <div class="swiper-button-prev equipment-button-prev"></div>
        <div class="swiper-button-next equipment-button-next"></div>
      </div>
    </div>
    <div class="swiper-pagination equipment-pagination"></div>
  </div>
  <div class="about" id="about">
    <div class="container">
      <h2 class="about__header"><?php the_field('mp_about_header'); ?></h2>
      <div class="about__text"><?php the_field('mp_about_text'); ?></div>
      <div class="about__inner flex">
        <div class="about__left"><img class="about__image" src="<?php the_field('mp_about_image'); ?>" alt=""></div>
        <div class="about__right">
          <div class="about__text_2"><?php the_field('mp_about_text_2'); ?></div>
          <div class="about-items flex">
            <?php echo do_shortcode('[pods name="benefits" template="benefits" limit="-1" orderby="post_date ASC"]'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="docs" id="docs">
    <div class="container">
      <div class="docs__inner flex">
        <div class="docs__left">
          <h2 class="docs__header"><?php the_field('mp_docs_header'); ?></h2>
          <a class="docs__button btn btn_blue" href="<?php the_field('mp_docs_button_href'); ?>"><span><?php the_field('mp_docs_button_text'); ?></span></a>
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
  <div class="portfolio" id="portfolio">
    <div class="container">
      <h2 class="portfolio__header"><?php the_field('mp_portfolio_header'); ?></h2>
      <div class="portfolio-items flex">
        <?php echo do_shortcode('[pods name="proekty" template="portfolio" limit="6" orderby="post_date ASC"]'); ?>
        <a class="portfolio__button btn btn_grey" href="<?php the_field('mp_portfolio_button_href'); ?>"><span><?php the_field('mp_portfolio_button_text'); ?></span></a>
      </div>
    </div>
  </div>
  <div class="order" id="order">
    <div class="container">
      <div class="order__inner flex">
        <div class="order__left">
          <h2 class="order__header"><?php the_field('mp_order_header'); ?></h2>
          <form class="order-form flex jcsb" id="order-form">
            <input type="hidden" name="act" value="order">
            <label class="order-form__label order-form__label-service">
              <div class="order-form__label-text">Выберите услугу, которая вас интересует</div>
              <div class="order-form__dropdown dropdown">
                <input type="hidden" name="service" value="">
                <div class="order-form__dropdown-current">-</div>
                <ul>
                  <?php echo do_shortcode('[pods name="uslugi" template="services_form" limit="-1" orderby="post_date ASC"]'); ?>
                </ul>
              </div>
            </label>
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
        <div class="order__right"><img class="order__image" src="<?php the_field('mp_order_image'); ?>" alt=""></div>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>
