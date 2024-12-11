<?php
/* Template Name: Blog */
get_header(); ?>
<main>
    <h1 class="h1 text-center mt-3 mb-3"> <?php echo esc_html__('Our Blog','task-1-theme'); ?></h1>
    <div class="row mt-2 mb-2 ">
        <div class="col-12">
            <?php the_content(); ?>
        </div>
    </div>
    <?php
      $the_query = new WP_Query(array('post_type' => 'projects', 'post_status' => 'publish'));
    if ($the_query->have_posts()) : ?>

        <div class="row">
            <h2 class="h2"><?php echo esc_html__('Our Projects','task-1-theme'); ?></h2>
            <!-- the loop -->
            <?php
            while ($the_query->have_posts()) :
                $the_query->the_post();
                ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <?php get_template_part('templates/single-project-post-content'); ?>
                </div>
            <?php endwhile; ?>
        </div>
        <!-- end of the loop -->

        <!-- pagination here -->

        <?php wp_reset_postdata(); ?>

    <?php else : ?>
        <p><?php esc_html_e('Sorry, no projects are available.','task-1-theme'); ?></p>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
