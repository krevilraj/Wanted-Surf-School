<!-- ============================== Footer  Open ============================== -->
<footer class="footer">
  <div class="container">
    <div class="row align-items-center ">
      <div class="col-md-4">
        <div class="footer__logo" data-aos="fade-up"
             data-aos-easing="linear"
             data-aos-duration="1500">
          <a href="<?php echo site_url(); ?>">
            <img src="<?php echo get_theme_mod('second_logo'); ?>"/>
          </a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="footer__nav" data-aos="fade-up"
             data-aos-easing="linear"
             data-aos-duration="1500">
          <!--          <ul>-->
          <!--            <li><a href="index.html"> home </a></li>-->
          <!--            <li><a href="programas.html"> programas </a></li>-->
          <!--            <li><a href="#"> sobre nós </a></li>-->
          <!--            <li><a href="#">equipa </a></li>-->
          <!--            <li><a href="#"> praias </a></li>-->
          <!--            <li><a href="#"> nature house </a></li>-->
          <!--            <li><a href="#"> contactos </a></li>-->
          <!--          </ul>-->

          <?php
          wp_nav_menu(array(
              'menu' => 'Footer Menu',
              'container' => 'ul',
              'container_class' => 'list-unstyled components',
              'menu_class' => '',
              'theme_location' => 'main-menu')
          );
          ?>
        </div>
      </div>
      <div class="col-md-4">
        <div class="footer__address" data-aos="fade-up"
             data-aos-easing="linear"
             data-aos-duration="1500">
          <ul>

            <li><a href="mailto:<?php echo get_theme_mod('dc_email') ?>"><?php echo get_theme_mod('dc_email') ?></a></li>
            <li><a href="tel:<?php echo get_theme_mod('dc_location') ?>"><?php echo get_theme_mod('dc_location') ?></a></li>
            <li><?php echo get_theme_mod('dc_phone') ?></li>
          </ul>
        </div>
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

            <?php if ($linkedin_link): ?>
              <li><a href="<?php echo $linkedin_link; ?>"><i
                      class="fab fa-linkedin"></i></a></li>
            <?php endif; ?>

            <?php if ($youtube_link): ?>
              <li><a href="<?php echo $youtube_link; ?>"><i
                      class="fab fa-youtube"></i></a></li>
            <?php endif; ?>

          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>


<?php wp_footer(); ?>


</body>
</html>
