<?php get_header();
?>


<div id="main-content">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();

            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="card">
                    <div class="card-title">
                        <h1 class="h1 text-center mt-2 mb-2">
                            <?php the_title(); ?>
                        </h1>
                    </div>
                    <div class="card-body">
                        <?php


                        // Get the current post type
                        $post_type = get_post_type();

                        // Check the post type projects
                        if ($post_type === 'projects') {
                            // Handle custom post type "projects"
                            ?>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                    <tr>
                                        <th><?php echo esc_html__('Start Date:', 'task_1_td'); ?></th>
                                        <td><?php echo get_post_meta(get_the_ID(), 'start_date', true); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo esc_html__('End Date:', 'task_1_td'); ?></th>
                                        <td><?php echo get_post_meta(get_the_ID(), 'end_date', true); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo esc_html__('Project Url:', 'task_1_td'); ?></th>
                                        <?php $project_url = get_post_meta(get_the_ID(), 'project_url', true); ?>
                                        <td>
                                            <a href="<?php echo esc_url($project_url); ?>"><?php echo esc_url($project_url); ?></a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                            <div class="task-description">
                                <strong><?php echo esc_html__('Description:', 'task_1_td'); ?></strong>
                                <p><?php the_content(); ?></p>
                            </div>

                            <?php
                        } else {
                            // Default handling for other post types
                            ?>
                            <div><?php the_content(); ?></div>
                            <?php
                        } ?>
                    </div>
                </div>
            </article>
        <?php
        endwhile;
    else :
        echo '<p>No content found.</p>';
    endif;
    ?>
</div>


<?php get_footer(); ?>
