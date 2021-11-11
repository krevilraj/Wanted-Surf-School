<?php

/*
Template Name: Sobre Nos
*/
get_header();
?>

<!-- ============================== Header Page Section  Open ============================== -->
<section class="pageHeader-about" style="background-image:url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>)">
  <div class="pageHeader__heading">
    <h2 class="heading__style__center-white">
      <?php the_title()?>
    </h2>
  </div>
</section>


<?php get_template_part('template/content','picabout'); ?>

<!--================= Programas SEction Open =================== -->

<section class="programas programas__pages">
  <div class="container">
    <div class="programas__heading">
      <h2>programas</h2>
    </div>
<!--    <div class="row">-->
<!--      <div class="col-md-4">-->
<!--        <div class="programas__item" data-aos="fade-up" data-aos-duration="3000">-->
<!--          <img src="images/programas/aulas.png" class="img-fluid" alt="wanted surf school">-->
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
<!--          <img src="images/programas/clinicas.png" class="img-fluid" alt="wanted surf school">-->
<!--          <div class="programas__content">-->
<!--            <h2>clínicas de surf </h2>-->
<!--            <p> 175€ semana </p>-->
<!--            <a href="#" class="dc-btn"> marcar</a>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--      <div class="col-md-4">-->
<!--        <div class="programas__item" data-aos="fade-up" data-aos-duration="3000">-->
<!--          <img src="images/programas/aulas-de.png" class="img-fluid" alt="wanted surf school">-->
<!--          <div class="programas__content">-->
<!--            <h2>aulas de grupo</h2>-->
<!--            <p>desde 35€</p>-->
<!--            <a href="#" class="dc-btn"> marcar</a>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
    <?php echo do_shortcode('[products limit="4" columns="4" category=19]'); ?>

  </div>
</section>




<?php get_footer() ?>
