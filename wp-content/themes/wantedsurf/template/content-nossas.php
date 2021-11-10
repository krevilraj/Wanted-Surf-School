<!-- ====================================== as  nossas praias section Open ================================= -->
<section class="homeNossas">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-5">
        <div class="homeNossas__left" data-aos="fade-down"
             data-aos-easing="linear"
             data-aos-duration="1500">
          <h2 class="heading__style-left"><?php the_field('title2',60); ?></h2>
          <p><?php the_field('description2',60); ?></p>
        </div>
      </div>
      <div class="col-md-7">
        <div class="homeNossas__right">
          <div id="carouselExampleCaptions12" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">
              <?php if (get_field('slider',60)): $i=0; ?>
                <?php while (the_repeater_field('slider',60)) :  ?>
                  <div class="carousel-item <?php if($i==0) echo 'active';?>">
                    <img src="<?php echo get_sub_field('image'); ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h3><?php echo get_sub_field('title'); ?></h3>

                    </div>
                  </div>

                  <?php  $i++; endwhile; ?>
              <?php endif; ?>


            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions12"
                    data-bs-slide="prev">
              <span class=" fas fa-long-arrow-alt-left" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions12"
                    data-bs-slide="next">
              <span class="fas fa-long-arrow-alt-right" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
