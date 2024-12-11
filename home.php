<?php
/*  Home page */
get_header(); ?>
<main class="text-center">
    <h1 class="h1"><?php echo esc_html__('Home Page','task-1-theme'); ?></h1>

    <div class="row justify-content-center">
        <h3 class="h3"><?php echo esc_html__('Our Posts','task-1-theme'); ?></h3>
  <?php

  $args = array(
    'post_type'      => 'post', // Default post type
    'posts_per_page' => 10,     // Number of posts to fetch
    'order'          => 'DESC', // Order by latest posts
    'orderby'        => 'date', // Sort posts by date
);

$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post();
        ?>
<div class="col-md-4 col-6 text-center p-3">
<?php get_template_part('templates/single-post-content'); ?>
</div>
        <?php
    endwhile;

    // Reset post data after custom query
    wp_reset_postdata();
endif;
?>
    </div>

</main>
<?php get_footer(); ?>

