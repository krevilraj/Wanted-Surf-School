<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Damatta
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <link rel="icon" sizes="16x16" href="<?php bloginfo('template_url'); ?>/images/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url'); ?>/images/favicon-32x32.png">
    <link  rel="apple-touch-icon" type="image/png" sizes="180x180" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon.png">

  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="profile" href="https://gmpg.org/xfn/11"/>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- ========================= Topbar Language  Section Open  =============================== -->
<div class="topbar">
  <div class="container">
    <ul>
      <li>
        <a href="#">PT</a>
      </li>
      <li>
        <a href="#">EN</a>
      </li>
    </ul>
  </div>
</div>

<!-- ========================= Header Logo Nav Section  Open  =============================== -->
<header class="logoNav">
  <div class="container">
    <div class="header">

      <?php if (has_custom_logo()): ?>
        <?php the_custom_logo(); ?>
      <?php else: ?>
        <p class="site-title"><?php bloginfo('title'); ?></p>
        <span><?php bloginfo('description'); ?></span>
      <?php endif; ?>


      <nav class="navbar" id="navbar">
        <div class="logoNav-close" id="closeNav"><i class="fas fa-times"></i></div>
<!--        <ul class="nav-links">-->
<!--          <li><a href="index.html">Home</a></li>-->
<!--          <li><a href="programas.html">programas</a></li>-->
<!--          <li><a href="sobre-nos.html">sobre nós</a></li>-->
<!--          <li><a href="equipa.html">equipa & praias</a></li>-->
<!--          <li><a href="as-nossas-praias.html">nature house</a></li>-->
<!--          <li><a href="contactos.html">contactos</a></li>-->
<!--        </ul>-->

        <?php
        wp_nav_menu(array(
          'theme_location' => 'wantedsurf_main_menu',
          'container' => false,
          'menu_class' => '',
          'fallback_cb' => '__return_false',
          'items_wrap' => '<ul id="%1$s" class="nav-links %2$s">%3$s</ul>',
          'depth' => 2,
          'before' => '',
          'walker' => new Nav_Walker_Nav_Menu()
        ));
        ?>
      </nav>
      <div class="myaccountCart">
        <div class="myaccount"><img src="<?php bloginfo('template_url'); ?>/images/myaccount.svg" alt="My Account"></div>
        <div class="cart" onclick="openCart()"><img src="<?php bloginfo('template_url'); ?>/images/cart.svg" alt="Cart">

        </div>


        <div class="burgureMenu" id="burgurMenu"><i class="fas fa-bars"></i></div>
      </div>

      <!--  Cart-Items -->
      <div class="cart-items-container" id="cart-detail">
        <div class="cart-item">
          <div class="cart-item__img"><a href="#"><img src="images/cart-item.png" alt=""></a></div>
          <div class="cart-item__content">
            <h3><a href="#"> Cart Items 01</a></h3>
            <div class="cart-item__price"><span>5</span> x <span>$ 4.25</span></div>
          </div>
          <div class="cart-item__remove">
            <span class="far fa-trash-alt"></span>
          </div>
        </div>
        <div class="cart-item">
          <div class="cart-item__img"><a href="#"><img src="images/cart-item.png" alt=""></a></div>
          <div class="cart-item__content">
            <h3><a href="#"> Cart Items 01</a></h3>
            <div class="cart-item__price"><span>5</span> x <span>$ 4.25</span></div>
          </div>
          <div class="cart-item__remove">
            <span class="far fa-trash-alt"></span>
          </div>
        </div>
        <div class="cart-item">
          <div class="cart-item__img"><a href="#"><img src="images/cart-item.png" alt=""></a></div>
          <div class="cart-item__content">
            <h3><a href="#"> Cart Items 01</a></h3>
            <div class="cart-item__price"><span>5</span> x <span>$ 4.25</span></div>
          </div>
          <div class="cart-item__remove">
            <span class="far fa-trash-alt"></span>
          </div>
        </div>
        <div class="cart-items__total">
          <div class="cart-items__title">
            Total
          </div>
          <div class="cart-items__price">
            $14.22
          </div>
        </div>
        <div class="cart-items__btn">
          <div class="cart-view__cart"><a href="#"> View CArt </a></div>
          <div class="cart-view__checkout"><a href="#"> Checkout </a></div>
        </div>
      </div>
    </div>
  </div>
</header>



