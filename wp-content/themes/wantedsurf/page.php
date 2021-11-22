<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lojaizidoro
 */

get_header();
?>


      <?php
      // If there are any posts
      if (have_posts()):

        // Load posts loop
        while (have_posts()): the_post();
          ?>

          <style>
              .all-header{
                  box-shadow: inset 0 0 0 2000px rgb(42 39 41 / 30%);
                  background-repeat:no-repeat;
                  background-size:cover;
                  background-position:center;
                  background-image:url(<?php

					if(is_cart()){
						echo get_theme_mod('wantedsurf_cart_image');
					}elseif(is_account_page()){
						echo get_theme_mod('wantedsurf_account_image');
					}elseif(is_checkout()){
						echo get_theme_mod('wantedsurf_checkout_image');
					}
					?>

          </style>
        <section class="all-header">
            <div class="page__title"> <h2 class="heading__style__center-white"><?php the_title()?></h2> </div>
        </section>
          <div class="content-area">
          <main class=" default-page1">
          <div class="container">
            <div class="row">
              <article class="col">

                <div><?php the_content(); ?></div>
              </article>
            </div>
          </div>
          </main>
          </div>
        <?php
        endwhile;
      else:
        ?>
        <p>Nothing to display.</p>
      <?php endif; ?>




<?php get_footer(); ?>