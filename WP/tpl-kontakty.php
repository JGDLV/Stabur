<? /* Template Name: Контакты */ ?>

<?php get_header(); ?>
<main class="content">
  <div class="requisites" id="requisites">
    <div class="container">
      <h1 class="requisites__header"><?php get_field('h1_header') ? the_field('h1_header') : the_title(); ?></h1>
      <div class="requisites__text"><? the_field('ip_contacts_text_top'); ?></div>
      <div class="requisites__inner flex">
        <div class="requisites__left"><? the_field('ip_requisites_left'); ?></div>
        <div class="requisites__right"><? the_field('ip_requisites_right'); ?></div>
      </div>
      <div class="requisites__text"><? the_field('ip_contacts_text_bottom'); ?></div>
    </div>
  </div>
  <div class="order" id="order">
    <div class="container">
      <div class="order__inner flex">
        <div class="order__left">
          <h2 class="order__header">Задать вопрос</h2>
          <form class="order-form flex jcsb" id="question-form">
            <input type="hidden" name="act" value="question">
            <label class="order-form__label order-form__label-name">
              <div class="order-form__label-text">Ваше имя</div>
              <input class="order-form__input" type="text" name="name" placeholder="Имя">
            </label>
            <label class="order-form__label order-form__label-phone">
              <div class="order-form__label-text">Ваш номер телефона</div>
              <input class="order-form__input" type="text" name="phone" placeholder="+7 (___) ___-__-__" required>
            </label>
            <label class="order-form__label order-form__label-comment">
              <div class="order-form__label-text">Ваше сообщение</div>
              <textarea class="order-form__textarea" name="comment" placeholder="Напишите любой вопрос и мы вам перезвоним"></textarea>
            </label>
            <button class="order-form__button btn btn_yellow" type="submit"><span>Отправить сообщение</span></button>
            <label class="order-form__label order-form__label-privacy">
              <input type="checkbox" required>Принимаю условия обработки моих данных в соответствии с <a href="<?php the_field('privacy_link', 2); ?>">политикой обработки данных</a>
            </label>
          </form>
        </div>
        <div class="order__right">
          <div class="map"><? the_field('ip_contacts_map'); ?></div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>
