<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Oil
 */

?>
<footer class="footer">
  <div class="footer-content container">
    <div class="footer-row row">
      <div class="col-lg-3 col-md-6 offset-md-3 offset-lg-0 footer-logo">
        <a href="/">
          <div class="logo">Логотип</div>
        </a>
        <div class="footer-logo__info">Интернет магазин автомобильных запчастей и автохимии</div>
        <div class="footer-logo__age"> <a href="gradaz.com" style="text-decoration:none;color:white">GRADAZ</a> &copy; 2017 год.</div>
      </div>
      <div class="col-lg-2 col-md-4 footer-menu">
        <div class="footer-menu__name">Информация</div>
        <ul class="footer-menu__list">
          <li><a href="#">О магазине</a>
          </li>
          <li><a href="#">Доставка и оплата</a>
          </li>
          <li><a href="#">Гарантии</a>
          </li>
          <li><a href="#">Отзывы</a>
          </li>
        </ul>
      </div>
      <div class="col-lg-2 col-md-4 footer-menu">
        <div class="footer-menu__name">Каталог</div>
        <ul class="footer-menu__list">
          <li><a href="#">Автомасла</a>
          </li>
          <li><a href="#">Автохимия</a>
          </li>
          <li><a href="#">Автозапчасти</a>
          </li>
          <li><a href="#">Товары со скдикой</a>
          </li>
        </ul>
      </div>
      <div class="col-lg-2 col-md-4 footer-menu">
        <div class="footer-menu__name">Дополнительно</div>
        <ul class="footer-menu__list">
          <li><a href="#">Статьи</a>
          </li>
          <li><a href="#">Оптовикам</a>
          </li>
          <li><a href="#">Прайс-лист</a>
          </li>
          <li><a href="#">Отзывы</a>
          </li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-12 footer-info">
        <div class="footer-info__number"><a href="tel:<?php echo get_theme_mod('oils_phone'); ?>"><?php echo get_theme_mod('oils_phone'); ?></a>
        </div>
        <div class="footer-info__address"><?php echo get_theme_mod('oils_address'); ?></div>
        <div class="footer-info__mail"><a href="mailto:<?php echo get_theme_mod('oils_mail'); ?>"><?php echo get_theme_mod('oils_mail'); ?></a>
        </div>
        <div class="footer-info__socials">
          <div class="footer-info__social">
            <a href="#">
            <img src="<?php echo get_template_directory_uri()?>/static/img/assets/footer/instagram.png">
            </a>
          </div>
          <div class="footer-info__social">
            <a href="#">
            <img src="<?php echo get_template_directory_uri()?>/static/img/assets/footer/vk.png">
            </a>
          </div>
          <div class="footer-info__social">
            <a href="#">
            <img src="<?php echo get_template_directory_uri()?>/static/img/assets/footer/fb.png">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="footer-bottom__link container"><a href="#">Политика конфиденциальности</a>
    </div>
  </div>
</footer>
</section>
<?php wp_footer(); ?>
</body>
</html>

