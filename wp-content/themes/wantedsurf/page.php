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
        <section class="all-header">
            <div class="page__title"> <h2><?php the_title()?></h2> </div>
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