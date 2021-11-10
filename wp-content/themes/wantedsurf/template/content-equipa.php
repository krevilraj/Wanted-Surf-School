<!-- ============================== equipa Open ============================== -->
<section class="equipa">
  <div class="container">
    <div class="equipa__heading">
      <h2 class="heading__style-center"><?php echo _e('equipa', 'wantedsurf'); ?></h2>
    </div>

    <div class="equipa__inner" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="1500">
      <?php $loop = new WP_Query(array('post_type' => 'equipa', 'posts_per_page' => -1,'order'=>'ASC'));
      $i = 0; ?>
      <?php while ($loop->have_posts()) : $loop->the_post(); ?>
        <div class="equopa__inner-card">
          <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" class="img-fluid" alt="">
          <a href="javascript:void(0)">
            <div class="equopa__inner-overlay">
              <h2 class="equipa__name"><?php the_title()?></h2>
              <h3 class="equipa__position"><?php the_field('subtitle'); ?></h3>
              <div class="equipa__line"><img src="<?php bloginfo('template_url'); ?>/images/equipa/line.png" alt="">
              </div>
              <p class="equipa__description"><?php the_content();?></p>
            </div>
          </a>
        </div>
        <?php $i++; endwhile;
      wp_reset_query(); ?>

    </div>
  </div>
</section>