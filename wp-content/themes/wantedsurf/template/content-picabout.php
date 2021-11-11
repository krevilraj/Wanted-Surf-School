<!--================= A nossa onda  Section Open =================== -->
<section class="homeAbout">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="homeAbout__left">
          <div class="left__img1 background__img"><img
              src="<?php the_field('image_1',60); ?>" alt=""></div>
          <div class="left__img2 background__img"><img
              src="<?php the_field('image_2',60); ?>" alt=""></div>
          <div class="left__img3 background__img"><img
              src="<?php the_field('image_3',60); ?>" alt=""></div>
          <div class="left__img4 background__img"><img
              src="<?php the_field('image_4',60); ?>" alt=""></div>
          <div class="left__img5 background__img"><img
              src="<?php the_field('image_5',60); ?>" alt=""></div>
          <div class="left__img6 background__img"><img
              src="<?php the_field('image_6',60); ?>" alt=""></div>
          <div class="left__img7 background__img"><img
              src="<?php the_field('image_7',60); ?>" alt=""></div>
          <img class="zoom__img" src="<?php the_field('image_5',60); ?>" alt="">
          <!--                    <div class="zoom__img"><img class="zoom__img" src="<?php bloginfo('template_url'); ?>/images/clickgallery/5.png" alt=""> </div>-->
        </div>
      </div>
      <div class="col-md-6">
        <div class="homeAbout__right" data-aos="fade-down"
             data-aos-easing="linear"
             data-aos-duration="1500">
          <div class="homeAbout__right-item">
            <h2 class="heading__style-left"><?php the_field('first_title',60); ?></h2>
            <p><?php the_field('first_description',60); ?></p>
          </div>

          <div class="homeAbout__right-item" data-aos="fade-down"
               data-aos-easing="linear"
               data-aos-duration="1500">
            <h2 class="heading__style-left"><?php the_field('second_title',60); ?></h2>
            <p><?php the_field('second_description',60); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>