<?php
/* Template Name: Home page Template */
get_header(); ?>
<main>
    <h1 class="h1"><?php the_title(); ?></h1>

    <div class="row mt-2 mb-2">
        <div class="col-12">
        <?php the_content(); ?>
        </div>
    </div>
    <div class="row justify-content-center">
        <h2 class="h2"><?php echo esc_html__('Our Posts','task-1-theme'); ?></h2>
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
