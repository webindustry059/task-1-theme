<?php
/* Template Name: Blog */
get_header(); ?>
<main>
    <h1 class="h1 text-center mt-3 mb-3"> Our Blog</h1>
    <div class="row mt-2 mb-2 ">
        <div class="col-12">
            <?php the_content(); ?>
        </div>
    </div>
    <?php
      $the_query = new WP_Query(array('post_type' => 'projects', 'post_status' => 'publish'));
    if ($the_query->have_posts()) : ?>

        <div class="row">
            <h2 class="h2"><?php echo esc_html__('Our Projects','task_1_td'); ?></h2>
            <!-- the loop -->
            <?php
            while ($the_query->have_posts()) :
                $the_query->the_post();
                ?>
                <div class="col-md-3 col-6">
                    <div class="card">
                        <div class="card-title text-center">
                            <?php the_title('<h2>', '</h2>'); ?>
                        </div>
                        <div class="card-body">
                            <div class="task-dates">
                                <strong>Date (From -To)</strong>
                                <p><?php echo get_post_meta(get_the_ID(), 'start_date', true); ?>
                                    - <?php echo get_post_meta(get_the_ID(), 'end_date', true); ?></p>
                            </div>
                            <div class="task-url">
                                <strong>URL</strong>
                                <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'project_url', true)); ?>"><?php echo get_post_meta(get_the_ID(), 'project_url', true); ?></a>
                            </div>
                            <a href="<?php the_permalink();?>" class="btn btn-info"> View Project</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <!-- end of the loop -->

        <!-- pagination here -->

        <?php wp_reset_postdata(); ?>

    <?php else : ?>
        <p><?php esc_html_e('Sorry, no projects are available.'); ?></p>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
