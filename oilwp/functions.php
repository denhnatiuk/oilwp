<?php

if ( ! function_exists( 'oil_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function oil_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Oil, use a find and replace
		 * to change 'oil' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'oil', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'oil' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'oil_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'oil_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function oil_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'oil_content_width', 640 );
}
add_action( 'after_setup_theme', 'oil_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function oil_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'oil' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'oil' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'oil_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function oil_scripts() {
	wp_enqueue_style( 'oil-style', get_stylesheet_uri() );

	wp_enqueue_script( 'oil-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'oil-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'oil_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/******************************************************************************/ 
/*********************************             ********************************/ 
/******************************************************************************/ 


/*************** Возможность загружать SVG ****************/
function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; // поддержка SVG
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);

/*************** Возможность загружать SVG ****************/



/*************** Скрыть Admin Bar ****************/
show_admin_bar(false);
/*************** Скрыть Admin Bar ****************/






add_action('customize_register', function($customizer){
  $customizer->add_section(
    'oil_section',
    array(
      'title' => 'Настройки темы',
      'description' => 'Настройки темы Oils',
      'priority' => 11,
    )
  );

	// Время работы
	$customizer->add_setting(
	  'oils_worktime',
	  array('default' => 'Звоните с 09.00 до 21.00')
	);
	$customizer->add_control(
	  'oils_worktime',
	  array(
	      'label' => 'Время работы ',
	      'section' => 'oil_section',
	      'type' => 'text',
	  )
	);
	// Конец Время работы
	


	// Телефон
	$customizer->add_setting(
	  'oils_phone',
	  array('default' => '+7 (927) 019 53 72')
	);
	$customizer->add_control(
	  'oils_phone',
	  array(
	      'label' => 'Телефон',
	      'section' => 'oil_section',
	      'type' => 'text',
	  )
	);
	// Конец Телефон

	// Email
	$customizer->add_setting(
	  'oils_mail',
	  array('default' => 'info@yandex.ru')
	);
	$customizer->add_control(
	  'oils_mail',
	  array(
	      'label' => 'Email',
	      'section' => 'oil_section',
	      'type' => 'text',
	  )
	);
	// Конец Email
	


	// Адрес
	$customizer->add_setting(
	  'oils_address',
	  array('default' => 'г. Москва, Зеленый бульвар 2')
	);
	$customizer->add_control(
	  'oils_address',
	  array(
	      'label' => 'Адрес',
	      'section' => 'oil_section',
	      'type' => 'text',
	  )
	);
	// Конец Адрес

});


/********************************************** Конец кастомные поля **************************************/


add_action( 'init', 'oil_custom_new_menu' );
function oil_custom_new_menu() {
  register_nav_menus(
    array(
      'top' => 'Главное меню',
      'products-category-menu' => __( 'Категории товаров' ),
      //'extra-menu' => __( 'Extra Menu' )
    )
  );
}

if ( ! function_exists( 'prefix_theme_setup' ) ) :
function prefix_theme_setup() {

    /*
     * Enable support for Post Thumbnails on posts and pages.
     */
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'news-thumbnail', 600, 600, true );

}
endif;
add_action( 'after_setup_theme', 'prefix_theme_setup' );

// custom excerpts length
// the_excerpt_max_charlength(10);

function the_excerpt_max_charlength( $charlength ){
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '...';
	} else {
		echo $excerpt;
	}
}
// breacrums

function the_breadcrumb() {
    $sep = ' > ';
    if (!is_front_page()) {
	
	// Start the breadcrumb with a link to your homepage
        echo '<div class="breadcrumbs" style="color:#d3ab65;">';
        echo '<a href="';
        echo get_option('home');
        echo '" style="color:black">';
        echo 'Гавная';
        // bloginfo('name');
        echo '</a>' . $sep="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	
	// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category() || is_single() ){
            the_category('title_li=');
        } elseif (is_archive() || is_single()){
            if ( is_day() ) {
                printf( __( '%s', 'text_domain' ), get_the_date() );
            } elseif ( is_month() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
            } elseif ( is_year() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
            } else {
                _e( 'Blog Archives', 'text_domain' );
            }
        }
	
	// If the current page is a single post, show its title with the separator
        if (is_single()) {
            echo $sep;
            the_title();
        }
	
	// If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title();
        }
	
	// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) { 
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }
        echo '</div>';
    }
}
/*
* Credit: http://www.thatweblook.co.uk/blog/tutorials/tutorial-wordpress-breadcrumb-function/
*/

//////////////////////////////////////////////////////////////////////////////////////
// *********************************** Woocommerce Functions ********************// //
//////////////////////////////////////////////////////////////////////////////////////

add_action( 'after_setup_theme', 'woocommerce_support' );
 
function woocommerce_support() {
 
   add_theme_support( 'woocommerce' );
 
}

function woocommerce_template_loop_product_title() {
	echo '<div class="product-title">';
	echo '<h5>' . get_the_title() . '</h5>';
	echo '</div>';
}


function woocommerce_template_loop_product_thumbnail() {
	echo "<div class='product-image'>";
	echo woocommerce_get_product_thumbnail(); 
	echo "</div>";
}


function custom_pre_get_posts_query( $q ) {

    $tax_query = (array) $q->get( 'tax_query' );

    $tax_query[] = array(
           'taxonomy' => 'product_cat',
           'field' => 'slug',
           'terms' => array( 'oils' ), // Don't display products in the clothing category on the shop page.
           'operator' => 'NOT IN'
    );


    $q->set( 'tax_query', $tax_query );

}
add_action( 'woocommerce_product_query', 'custom_pre_get_posts_query' ); 

function ignition_feature_flash() {
 global $post, $product;
 if ( $product->is_featured() ) :
  echo apply_filters( 'woocommerce_featured_flash', '<span class="is-featured">' . __( 'Hot!', 'ignition-theme' ) . '</span>', $post, $product ); 
 endif;
 if ( ! $product->is_in_stock() ) :
  echo apply_filters( 'woocommerce_stock_flash', '<span class="out-of-stock">' . __( 'Sold Out!', 'ignition-theme' ) . '</span>', $post, $product ); 
 endif;
}
add_action( 'woocommerce_before_shop_loop_item_title', 'ignition_feature_flash', 15 );


/**
 * Checks if the current page is a product archive
 * @return boolean
 */
function oil_is_product_archive() {
	if ( storefront_is_woocommerce_activated() ) {
		if ( is_shop() || is_product_taxonomy() || is_product_category() || is_product_tag() ) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

/**
 * Call a shortcode function by tag name.
 *
 * @since  1.4.6
 *
 * @param string $tag     The shortcode whose function to call.
 * @param array  $atts    The attributes to pass to the shortcode function. Optional.
 * @param array  $content The shortcode's content. Default is null (none).
 *
 * @return string|bool False on failure, the result of the shortcode on success.
 */
function oil_do_shortcode( $tag, array $atts = array(), $content = null ) {
	global $shortcode_tags;

	if ( ! isset( $shortcode_tags[ $tag ] ) ) {
		return false;
	}

	return call_user_func( $shortcode_tags[ $tag ], $atts, $content, $tag );
}



// allow shortcode 
if (!function_exists('woocommerce_template_single_excerpt')) {
   function woocommerce_template_single_excerpt( $post ) {
   	   global $post;
       if ($post->post_excerpt) echo '<div itemprop="description">' . do_shortcode(wpautop(wptexturize($post->post_excerpt))) . '</div>';
   }
}

// 

function wpa89819_wc_single_product(){

    $product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );

    if ( $product_cats && ! is_wp_error ( $product_cats ) ){

        $single_cat = array_shift( $product_cats ); ?>

        <h2 itemprop="name" class="product_category_title"><span><?php echo $single_cat->name; ?></span></h2>

<?php }
}
add_action( 'woocommerce_single_product_summary', 'wpa89819_wc_single_product', 2 );

//show attributes after summary in product single view
// add_action('woocommerce_single_product_summary', function() {
// 	//template for this is in oilwp/woocommerce/single-product/product-attributes.php
// 	global $product;
// 	echo $product->list_attributes();
// }, 25);


/*************** Подключение файл стилей ****************/


add_action( 'wp_enqueue_scripts', 'theme_media' );
function theme_media() {
    wp_enqueue_style( 'main', get_template_directory_uri() . '/static/css/main.css' );

	/* Подключение скриптов */

    wp_enqueue_script( 'app', get_template_directory_uri() . '/static/js/main.js', array(), '1.0.0', true );

}

/*************** Подключение файл стилей ****************/


/**
 * WooCommerce Extra Feature
 * --------------------------
 *
 * Change number of related products on product page
 * Set your own value for 'posts_per_page'
 *
 */ 
function woo_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 6;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
  function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 4; // 4 related products
	$args['columns'] = 2; // arranged in 2 columns
	return $args;
}
/*******************************************************************************/ 
// Remove related products from after single product hook
// remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
// // Remove up sells from after single product hook
// remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );

// function oilwp_upsell_related_cross() {
//   if ( is_cart() ) {
//     woocommerce_cross_sell_display();
//   } elseif ( ! ( is_checkout() || is_front_page() || is_shop() || is_product_category() || is_product_tag() ) ) {
//     global $product;
//     $upsells = $product->get_upsells();
//       if ( count( $upsells) > 0 ) {
//         woocommerce_upsell_display( 4,4 );
//       } else {
//         woocommerce_output_related_products();
//       }
//   }
// }
// add_action( 'woocommerce_after_single_product_summary', 'yourthemename_upsell_related_cross',  20 );

// custom checkout fields
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
     unset($fields['order']['order_comments']['billing_company']['']);

     return $fields;
}