<?php
  $symbols = [' ', '(', ')', '-'];
  $phone_fixed = str_replace($symbols, '', get_field('phone', 2));
?>

<footer class="footer">
      <div class="footer__top">
        <div class="container">
          <div class="footer__top-inner flex">
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
            <div class="social">
              <a class="social__item fab fa-instagram" href="<?php the_field('instagram', 2); ?>"></a>
              <a class="social__item fab fa-whatsapp" href="<?php the_field('whatsapp', 2); ?>"></a>
            </div>
            <div class="contacts"><a class="contacts__phone" href="tel:<?php echo $phone_fixed; ?>"><?php the_field('phone', 2); ?></a>
              <p class="contacts__whours"><?php the_field('whours_footer', 2); ?></p>
            </div><a class="callback btn btn_yellow" href="<?php the_field('callback_link', 2); ?>"><span><?php the_field('callback_text', 2); ?></span></a>
          </div>
        </div>
      </div>
      <div class="footer__bottom">
        <div class="container">
          <div class="footer__bottom-inner flex jcsb"> 
            <div class="copyright">© <?php the_field('copyright', 2); ?></div><a class="footer__link" href="<?php the_field('privacy_link', 2); ?>">Политика конфиденциальности</a>
            <div class="developer"><?php the_field('developer', 2); ?></div>
          </div>
        </div>
      </div>
    </footer>
    <div class="modal mfp-hide" id="callback">
      <div class="modal__header">Заказать звонок</div>
      <form class="order-form flex jcsb" id="callback-form">
        <input type="hidden" name="act" value="callback">
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
        <button class="order-form__button btn btn_yellow" type="submit"><span>Отправить заявку</span></button>
        <label class="order-form__label order-form__label-privacy">
          <input type="checkbox" required>Принимаю условия обработки моих данных в соответствии с <a href="<?php the_field('privacy_link', 2); ?>">политикой обработки данных</a>
        </label>
      </form>
    </div>
    <div class="modal modal_equipment mfp-hide" id="order_equipment">
      <div class="modal__header">Заказ спецтехники</div>
      <form class="order-form flex jcsb" id="order_equipment-form">
        <input type="hidden" name="equipment">
        <input type="hidden" name="act" value="equipment">
        <label class="order-form__label order-form__label-name">
          <div class="order-form__label-text">Ваше имя</div>
          <input class="order-form__input" type="text" name="name" placeholder="Имя">
        </label>
        <label class="order-form__label order-form__label-phone">
          <div class="order-form__label-text">Ваш номер телефона</div>
          <input class="order-form__input" type="text" name="phone" placeholder="+7 (___) ___-__-__" required>
        </label>
        <label class="order-form__label order-form__label-address">
          <div class="order-form__label-text">Укажите адрес объекта</div>
          <input class="order-form__input" type="text" name="address" placeholder="Напишите здесь адрес объекта">
        </label>
        <label class="order-form__label order-form__label-date">
          <div class="order-form__label-text">Дата</div>
          <input class="order-form__input" type="text" name="date" placeholder="Укажите дату">
        </label>
        <label class="order-form__label order-form__label-time">
          <div class="order-form__label-text">Время аренды</div>
          <input class="order-form__input" type="text" name="time" placeholder="Укажите кол-во часов">
        </label>
        <label class="order-form__label order-form__label-comment">
          <div class="order-form__label-text">Комментарии к заявке</div>
          <textarea class="order-form__textarea" name="comment" placeholder="Тут вы можете указать индивидуальные особенность вашего объекта или задать вопросы"></textarea>
        </label>
        <button class="order-form__button btn btn_yellow" type="submit"><span>Отправить заявку</span></button>
        <label class="order-form__label order-form__label-privacy">
          <input type="checkbox" required>Принимаю условия обработки моих данных в соответствии с <a href="<?php the_field('privacy_link', 2); ?>">политикой обработки данных</a>
        </label>
      </form>
    </div>
    <div class="fas fa-arrow-up a-drop" id="top"></div>
    <?php wp_footer(); ?>
  </body>
</html>
