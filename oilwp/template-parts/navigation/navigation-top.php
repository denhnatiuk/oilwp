        <?php 
        // $defauls = array(
        //       'Главная' => '/',
        //       'О магазине' => '/about.php',
        //       'Каталог товаров' => '/catalogue.php',
        //       'Доставка и оплата' => '/delivery.php',
        //       'Новости' => '/news.php',
        //       'Гарантии' => '/warranty.php',
        //       'Отзывы' => '/feedback.php',
        //       'Контакты' => '/contacts.php',
        //       ); 
        ?>
        <nav class="menu col-lg-9 col-md-12">

  
<?php wp_nav_menu(

array (
  'menu' => 'top', //the name of the menu you are trying to output
  'container' =>'ul', //set to UL or DIV, or 'false' for no wrapper
  'container_class' => 'menu-list',//the class that is applied to the container
  'container_id'    => '',//the id that is applied to the container
  'before' => '', //what the a tags themselves are wrapped in
  'after' => '', //what the a tags themselves are wrapped in
  'link_before' => '', //what the words within the link are wrapped in
  'link_after' => '', //what the words within the link are wrapped in
  'items_wrap' => '<ul id="%1$s" class="menu-list">%3$s</ul>', //what the LI elements are wrapped in - "%3$s" is the LI list itself. To wrap the LI list in a div, you would use "<div class="YOURCLASS">%3$s</div>"
  'depth' => 0, ) ); 

?>
        </nav>
          