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
    <div class="row">
      <div class="col-md-4">
        <div class="programas__item" data-aos="fade-up" data-aos-duration="3000">
          <img src="<?php bloginfo('template_url'); ?>/images/programas/aulas.png" class="img-fluid"
               alt="wanted surf school">
          <div class="programas__content">
            <h2>aulas individuais</h2>
            <p>2h - 60€</p>
            <a href="#" class="dc-btn"> marcar</a>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="programas__item" data-aos="fade-up" data-aos-duration="3000">
          <img src="<?php bloginfo('template_url'); ?>/images/programas/clinicas.png" class="img-fluid"
               alt="wanted surf school">
          <div class="programas__content">
            <h2>clínicas de surf </h2>
            <p> 175€ semana </p>
            <a href="#" class="dc-btn"> marcar</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="programas__item" data-aos="fade-up" data-aos-duration="3000">
          <img src="<?php bloginfo('template_url'); ?>/images/programas/aulas-de.png" class="img-fluid"
               alt="wanted surf school">
          <div class="programas__content">
            <h2>aulas de grupo</h2>
            <p>desde 35€</p>
            <a href="#" class="dc-btn"> marcar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--================= A nossa onda  Section Open =================== -->

<section class="homeAbout">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="homeAbout__left">
          <div class="left__img1 background__img"><img
                src="<?php the_field('image_1'); ?>" alt=""></div>
          <div class="left__img2 background__img"><img
                src="<?php the_field('image_2'); ?>" alt=""></div>
          <div class="left__img3 background__img"><img
                src="<?php the_field('image_3'); ?>" alt=""></div>
          <div class="left__img4 background__img"><img
                src="<?php the_field('image_4'); ?>" alt=""></div>
          <div class="left__img5 background__img"><img
                src="<?php the_field('image_5'); ?>" alt=""></div>
          <div class="left__img6 background__img"><img
                src="<?php the_field('image_6'); ?>" alt=""></div>
          <div class="left__img7 background__img"><img
                src="<?php the_field('image_7'); ?>" alt=""></div>
          <img class="zoom__img" src="<?php the_field('image_5'); ?>" alt="">
          <!--                    <div class="zoom__img"><img class="zoom__img" src="<?php bloginfo('template_url'); ?>/images/clickgallery/5.png" alt=""> </div>-->
        </div>
      </div>
      <div class="col-md-6">
        <div class="homeAbout__right" data-aos="fade-down"
             data-aos-easing="linear"
             data-aos-duration="1500">
          <div class="homeAbout__right-item">
            <h2 class="heading__style-left"><?php the_field('first_title'); ?></h2>
            <p><?php the_field('first_description'); ?></p>
          </div>

          <div class="homeAbout__right-item" data-aos="fade-down"
               data-aos-easing="linear"
               data-aos-duration="1500">
            <h2 class="heading__style-left"><?php the_field('second_title'); ?></h2>
            <p><?php the_field('second_description'); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ====================================== as  nossas praias section Open ================================= -->
<!--<section class="homeNossas">-->
<!--  <div class="container">-->
<!--    <div class="row align-items-center">-->
<!--      <div class="col-md-5">-->
<!--        <div class="homeNossas__left" data-aos="fade-down"-->
<!--             data-aos-easing="linear"-->
<!--             data-aos-duration="1500">-->
<!--          <h2 class="heading__style-left">--><?php //the_field('title2',60); ?><!--</h2>-->
<!--          <p>--><?php //the_field('description2',60); ?><!--</p>-->
<!--        </div>-->
<!--      </div>-->
<!--      <div class="col-md-7">-->
<!--        <div class="homeNossas__right">-->
<!--          <div id="carouselExampleCaptions12" class="carousel slide" data-bs-ride="carousel">-->
<!---->
<!--            <div class="carousel-inner">-->
<!--              --><?php //if (get_field('slider',60)): $i=0; ?>
<!--                --><?php //while (the_repeater_field('slider',60)) : the_row(); ?>
<!--                  <div class="carousel-item --><?php //if($i==0) echo 'active';?><!--">-->
<!--                    <img src="--><?php //echo get_sub_field('image'); ?><!--" class="d-block w-100" alt="...">-->
<!--                    <div class="carousel-caption d-none d-md-block">-->
<!--                      <h3>--><?php //echo get_sub_field('title'); ?><!--</h3>-->
<!---->
<!--                    </div>-->
<!--                  </div>-->
<!---->
<!--                  --><?php // $i++; endwhile; ?>
<!--              --><?php //endif; ?>
<!---->
<!---->
<!--            </div>-->
<!--            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions12"-->
<!--                    data-bs-slide="prev">-->
<!--              <span class=" fas fa-long-arrow-alt-left" aria-hidden="true"></span>-->
<!--              <span class="visually-hidden">Previous</span>-->
<!--            </button>-->
<!--            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions12"-->
<!--                    data-bs-slide="next">-->
<!--              <span class="fas fa-long-arrow-alt-right" aria-hidden="true"></span>-->
<!--              <span class="visually-hidden">Next</span>-->
<!--            </button>-->
<!---->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</section>-->

<?php
get_template_part('template/content','nossas');
?>
<?php
get_template_part('template/content','equipa');
?>


<?php get_footer() ?>
