<?php

/*
Template Name: Home Page
*/
get_header();
?>

<!-- ========================= slider Section  Open  =============================== -->

<section class="hero">
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <!--        <div class="carousel-indicators">-->
    <!--            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"-->
    <!--                    aria-current="true" aria-label="Slide 1"></button>-->
    <!--            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"-->
    <!--                    aria-label="Slide 2"></button>-->
    <!--            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"-->
    <!--                    aria-label="Slide 3"></button>-->
  </div>
  <div class="carousel-inner">
    <?php $loop = new WP_Query(array('post_type' => 'slider', 'posts_per_page' => -1));
    $i = 0; ?>
    <?php while ($loop->have_posts()) : $loop->the_post(); ?>
      <div class="carousel-item <?php if ($i == 0) echo 'active'; ?>">
        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="">
        <div class="carousel-caption ">
          <h3><?php the_title() ?></h3>
          <h1> <?php the_field('subtitle'); ?></h1>
          <?php the_content(); ?>
          <div class="hero_btn">
            <?php $link =  get_field('link'); ?>
            <a href="<?php echo $link['url']?>"><?php echo $link['title']?></a>
          </div>
        </div>
      </div>
      <?php $i++; endwhile;
    wp_reset_query(); ?>
  </div>
  </div>


  <div class="hero-social">
    <?php
    $facebook_link = get_theme_mod('dc_fb');
    $instagram_link = get_theme_mod('dc_instagram');
    $linkedin_link = get_theme_mod('dc_linkedin');
    $youtube_link = get_theme_mod('dc_youtube');
    ?>
    <?php if ($facebook_link): ?>
      <div class="hero-social__fb"><span id="c_fb"></span><a href="<?php echo $facebook_link; ?>"><i
              class="fab fa-facebook-f"></i></a>
      </div>
    <?php endif; ?>

    <?php if ($instagram_link): ?>
      <div class="hero-social__instgram"><a href="<?php echo $instagram_link; ?>"><i
              class="fab fa-instagram"></i></a></div>
    <?php endif; ?>


  </div>
</section>


<!--================= sticky whatsapp icon Open =================== -->
<section class="whatsapp">
  <div class="container">
    <a href="#"> <img src="<?php bloginfo('template_url'); ?>/images/whatsapp.png" alt=""> </a>
  </div>
</section>
<!--================= Programas SEction Open =================== -->

<section class="programas">
  <div class="container">
    <div class="programas__heading">
      <h2>programas</h2>
    </div>

    <?php echo do_shortcode('[products limit="3 " columns="3" category=19]'); ?>
<!--    <div class="row">-->
<!--      <div class="col-md-4">-->
<!--        <div class="programas__item" data-aos="fade-up" data-aos-duration="3000">-->
<!--          <img src="--><?php //bloginfo('template_url'); ?><!--/images/programas/aulas.png" class="img-fluid"-->
<!--               alt="wanted surf school">-->
<!--          <div class="programas__content">-->
<!--            <h2>aulas individuais</h2>-->
<!--            <p>2h - 60€</p>-->
<!--            <a href="#" class="dc-btn"> marcar</a>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!---->
<!--      <div class="col-md-4">-->
<!--        <div class="programas__item" data-aos="fade-up" data-aos-duration="3000">-->
<!--          <img src="--><?php //bloginfo('template_url'); ?><!--/images/programas/clinicas.png" class="img-fluid"-->
<!--               alt="wanted surf school">-->
<!--          <div class="programas__content">-->
<!--            <h2>clínicas de surf </h2>-->
<!--            <p> 175€ semana </p>-->
<!--            <a href="#" class="dc-btn"> marcar</a>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--      <div class="col-md-4">-->
<!--        <div class="programas__item" data-aos="fade-up" data-aos-duration="3000">-->
<!--          <img src="--><?php //bloginfo('template_url'); ?><!--/images/programas/aulas-de.png" class="img-fluid"-->
<!--               alt="wanted surf school">-->
<!--          <div class="programas__content">-->
<!--            <h2>aulas de grupo</h2>-->
<!--            <p>desde 35€</p>-->
<!--            <a href="#" class="dc-btn"> marcar</a>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
  </div>
</section>




<?php get_template_part('template/content','picabout'); ?>
<?php get_template_part('template/content','nossas'); ?>
<?php get_template_part('template/content','equipa'); ?>


<?php get_footer() ?>
