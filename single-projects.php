<!-- single post page for post type projects-->
<?php get_header(); ?>
<main id="main-content">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();

            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="row justify-content-center mt-2">
                    <div class="col-md-11">
                        <div class="card">
                            <div class="card-title">
                                <h1 class="h1 text-center mt-2 mb-2">
                                    <?php the_title(); ?>
                                </h1>
                            </div>
                            <div class="card-body">
                                <div class="projects_content d-flex">
                                    <div class="projects_featured_image">
                                        <img src="<?php echo esc_url(the_post_thumbnail_url(get_the_ID())); ?>" class="img-fluid" alt="">
                                    </div>
                                    <div class="description_content">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tbody>
                                            <tr>
                                                <th><?php echo esc_html__('Start Date:', 'task-1-theme'); ?></th>
                                                <td><?php echo get_post_meta(get_the_ID(), 'start_date', true); ?></td>
                                            </tr>
                                            <tr>
                                                <th><?php echo esc_html__('End Date:', 'task-1-theme'); ?></th>
                                                <td><?php echo get_post_meta(get_the_ID(), 'end_date', true); ?></td>
                                            </tr>
                                            <tr>
                                                <th><?php echo esc_html__('Project Url:', 'task-1-theme'); ?></th>
                                                <?php $project_url = get_post_meta(get_the_ID(), 'project_url', true); ?>
                                                <td>
                                                    <a href="<?php echo esc_url($project_url); ?>"><?php echo esc_url($project_url); ?></a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="task-description">
                                        <strong><?php echo esc_html__('Description:', 'task-1-theme'); ?></strong>
                                        <p><?php the_content(); ?></p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        <?php
        endwhile;
    else :
        echo '<p>No content found.</p>';
    endif;
    ?>
</main>


<?php get_footer(); ?>
