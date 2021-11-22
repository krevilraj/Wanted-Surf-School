<?php

/*
Template Name: Programas
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



<?php echo do_shortcode('[products columns="3" category=19]'); ?>


<?php get_footer() ?>
