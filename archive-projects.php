<?php
/* Template Name: Archive-Projects */
get_header();
?>

<main>
    <h1 class="h1 text-center"><?php echo esc_html__('Projects Archive', 'task-1-theme'); ?></h1>

    <?php

    if (have_posts()) :

        get_template_part('templates/filter-projects-on-dates');
    ?>
        <!-- Filtered Projects Section -->
        <div class="row filtered_projects justify-content-center">
            <!-- The Loop -->
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <?php get_template_part('templates/single-project-post-content'); ?>
                </div>
            <?php endwhile; ?>
        </div>
        <!-- End of the Loop -->

        <?php wp_reset_postdata(); ?>

    <?php else : ?>
        <p><?php echo esc_html__('Sorry, no projects are available.', 'task-1-theme'); ?></p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
