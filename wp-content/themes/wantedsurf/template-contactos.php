<?php

/*
Template Name: Contactos
*/
get_header();
?>
<style>
    .form-check{
        padding-left: 0;
    }
    .wpcf7-list-item{
        margin: 0;
    }
</style>



<!-- ============================== Header Page Section  Open ============================== -->
<section class="pageHeader-contact" style="background-image:url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>)">
  <div class="pageHeader__heading">
  </div>
</section>

<!-- ====================================== as  nossas praias section Open ================================= -->
<section class="contact__form">
  <div class="container">
    <div class="row contact__form-inner">
      <div class="col-md-6">
        <div class="contact__form__left">
          <h2 class="heading__style-left">fale connosco </h2>
          <ul>
            <li><a href="mailto:<?php echo get_theme_mod('dc_email') ?> "> <?php echo get_theme_mod('dc_email') ?></a></li>
            <li><a href="tel:<?php echo get_theme_mod('dc_phone') ?>"><?php echo get_theme_mod('dc_phone') ?></a></li>
            <li><a href="#"> <?php echo get_theme_mod('dc_location') ?></a></li>
          </ul>

          <div class="footer__social">




            <ul>
              <?php
              $facebook_link = get_theme_mod('dc_fb');
              $instagram_link = get_theme_mod('dc_instagram');
              $linkedin_link = get_theme_mod('dc_linkedin');
              $youtube_link = get_theme_mod('dc_youtube');
              ?>
              <?php if ($facebook_link): ?>
                <li><span id="c_fb"></span><a href="<?php echo $facebook_link; ?>"><i class="fab fa-facebook-f"></i></a>
                </li>
              <?php endif; ?>

              <?php if ($instagram_link): ?>
                <li><a href="<?php echo $instagram_link; ?>"><i
                        class="fab fa-instagram"></i></a></li>
              <?php endif; ?>
            </ul>

          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="contact__form-right">
          <?php echo do_shortcode('[contact-form-7 id="5" title="Contact form 1"]'); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer() ?>
