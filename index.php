<?php get_header(); ?>
<?php //pll_e('Hello'); example to get string language ?>
<main style="margin: 25px;">
<?php
    // TO SHOW THE PAGE CONTENTS
    while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
    <?php the_content(); ?> <!-- Page Content -->
    <?php
    endwhile; //resetting the page loop
    wp_reset_query(); //resetting the page query?>
</main>
<?php get_footer(); ?>