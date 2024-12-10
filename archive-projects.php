<?php
/* Template Name: Archive-Projects */
get_header();
?>

<main>
    <h1 class="h1 text-center"><?php echo esc_html__('Projects Archive', 'task_1_td'); ?></h1>

    <?php

    if (have_posts()) :

        get_template_part('templates/filter-projects-on-dates');
    ?>
        <!-- Filtered Projects Section -->
        <div class="row filtered_projects">
            <!-- The Loop -->
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-md-4 col-6">
                    <?php get_template_part('templates/single-project-post-content'); ?>
                </div>
            <?php endwhile; ?>
        </div>
        <!-- End of the Loop -->

        <?php wp_reset_postdata(); ?>

    <?php else : ?>
        <p><?php echo esc_html__('Sorry, no projects are available.', 'task_1_td'); ?></p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
