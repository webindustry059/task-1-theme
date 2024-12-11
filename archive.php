<?php
/* Template Name: Archive */
get_header(); ?>
<main>
    <h1 class="h1 text-center">  <?php echo esc_html__('Archive page', 'task-1-theme'); ?></h1>
    <?php
    if (have_posts()) :
        ?>

        <div class="row">

            <!-- the loop -->
            <?php

            while (have_posts()) : the_post();
                ?>
                <div class="col-md-4 col-6 text-center p-3">
                    <?php get_template_part('templates/single-post-content'); ?>
                </div>
            <?php endwhile; ?>
        </div>
        <!-- end of the loop -->


        <?php wp_reset_postdata(); ?>

    <?php else : ?>
        <p><?php echo esc_html__('Sorry, no content is available', 'task-1-theme'); ?></p>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
