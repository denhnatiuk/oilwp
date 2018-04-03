<?php
/**
 * The header for Oil Theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Oil
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	  <meta content="" name="keywords">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta content="telephone=no" name="format-detection">
	  <meta name="HandheldFriendly" content="true">
	
	
	  <meta property="og:title" content="<?php echo the_title(); ?>">
	  <meta property="og:title" content="">
	  <meta property="og:url" content="">
	  <meta property="og:description" content="">
	  <meta property="og:image" content="">
	  <meta property="og:image:type" content="image/jpeg">
	  <meta property="og:image:width" content="500">
	  <meta property="og:image:height" content="300">
	  <meta property="twitter:description" content="">
	  <link rel="image_src" href="">
	  <link rel="icon" type="image/x-icon" href="favicon.ico">
	  <script>
	      (function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)
	  </script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'oil' ); ?></a>
<header class="header">
  <div class="header-top">
    <div class="header-top__content container">
      <div class="header-top__row row">
        <div class="col-2 burger-wrapper">
          <div class="burger"></div>
        </div>
        <div class="col-lg-2 offset-lg-9 col-md-3 offset-md-7 col-10 offset-0 col-6 header-top__auth">
          <div class="login auth-link"><a href="#">Вход</a>
          </div>
          <div class="separate auth-link">/</div>
          <div class="register auth-link"><a href="#">Регистрация</a>
          </div>
        </div>
        <div class="col-lg-1 col-md-2 header-top__mail"><a href="mailto:<?php echo get_theme_mod('oils_mail'); ?>"><?php echo get_theme_mod('oils_mail'); ?></a>
        </div>
      </div>
    </div>
  </div>
  <div class="header-center container">
    <div class="header-center__row row">
      <div class="col-lg-3 col-md-4 col-6">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <div class="logo">
          	<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
			    <?php the_custom_logo(); ?>
			<?php else : ?> 
			    Логотип
			<?php endif; ?>
          </div>
        </a>
      </div>
      <div class="col-lg-2 col-md-4 col-6 work-info">
        <div class="work-time"><?php echo get_theme_mod('oils_worktime'); ?></div>
        <div class="work-phone"><a href="tel:<?php echo get_theme_mod('oils_phone'); ?>"><?php echo get_theme_mod('oils_phone'); ?></a>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 callback">
        <div class="button">Заказать звонок</div>
      </div>
      <div class="md-delimiter"></div>
      <div class="col-lg-2 col-md-3 offset-md-3 offset-lg-0 col-3 cart">

       <?php get_template_part( 'template-parts/index', 'cart' ); ?>

    </div>
  </div>
  <div class="header-bottom">
    <div class="header-bottom__content container">
      <div class="header-bottom__row row">
        
         <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
        
        <div class="search col-lg-1 col-md-3 offset-md-3 offset-lg-0">
          <form class="search-form">
            <button>
              <div class="search-icon">
                <img src="<?php echo get_template_directory_uri()?>/static/img/assets/header/search.png">
              </div>
            </button>
            <div class="search-input">

              <input type="text" placeholder="Поиск">
            </div>
          </form>
        </div>
        <div class="pricelist col-lg-2 col-md-3">
          <div class="pricelist-icon">
            <img src="<?php echo get_template_directory_uri()?>/static/img/assets/header/pricelist.png">
          </div>
          <div class="pricelist-link"><a href="#downloadPriceList">Прайс - лист</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
	
	
	
	

