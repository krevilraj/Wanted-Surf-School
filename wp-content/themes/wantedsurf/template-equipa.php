<?php

/*
Template Name: Equipa
*/
get_header();
?>
<!-- ============================== Header Page Section  Open ============================== -->
<section class="pageHeader-equipa"
         style="background-image:url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>)">
  <div class="pageHeader__heading">
    <h2 class="heading__style__center-white">
      <?php the_title() ?>
    </h2>
  </div>
</section>

<?php
get_template_part('template/content','equipa');
?>


<?php
get_template_part('template/content','nossas');
?>


<?php get_footer() ?>
