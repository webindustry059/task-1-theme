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
    <div class="row">
        <h2 class="h2"><?php echo esc_html__('Our Posts','task_1_td'); ?></h2>
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

        <div class="col-md-4 col-6">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="entry-meta">
                <p>Published on: <?php echo get_the_date(); ?></p>
            </div>
               <div class="entry-content">
                <?php
                // Limit the_content() to 100 characters
                $content = apply_filters('the_content', get_the_content());
                echo mb_substr(wp_strip_all_tags($content), 0, 100) . '...';
                ?>
            </div>
        </article>
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
