<?php
/* Template Name: Blog */
get_header(); ?>
<main>
    <h1 class="h1 text-center">  <?php echo esc_html__('All Projects','task_1_td'); ?></h1>
    <?php
    $the_query = new WP_Query(array('post_type' => 'projects', 'post_status' => 'publish'));
    if ($the_query->have_posts()) : ?>

            <form action="#" >
        <div class="row mt-2 mb-2 search_project_main_div">
                <div class="col-md-4 col-10">
                    <div class="form-group">
                        <label for="start_date"><?php echo esc_html__('Date (start)','task_1_td'); ?></label>
                        <input type="date" class="form-control" name="start_date">
                    </div>
                </div>
                <div class="col-md-4 col-10">
                    <div class="form-group">
                        <label for="end_date"><?php echo esc_html__('Date (end)','task_1_td'); ?></label>
                        <input type="date" class="form-control" name="end_date">
                    </div>
                </div>
                <div class="col-md-4 col-10 search_project_div">
                    <div class="form-group">
                        <button type="button" class="btn btn-primary search_projects" ><?php echo esc_html__('Search','task_1_td'); ?></button>
                    </div>
                </div>
        </div>
            </form>

        <div class="row filtered_projects">

            <!-- the loop -->
            <?php
            while ($the_query->have_posts()) :
                $the_query->the_post();
                ?>
                <div class="col-md-4 col-6">
                    <div class="card">
                        <div class="card-title text-center">
                            <?php the_title('<h2 class="h2">', '</h2>'); ?>
                        </div>
                        <div class="card-body">
                            <div class="task-dates">
                                <strong><?php echo esc_html__('Date (From - To):','task_1_td'); ?></strong>
                                <p><?php echo get_post_meta(get_the_ID(), 'start_date', true); ?>
                                    - <?php echo get_post_meta(get_the_ID(), 'end_date', true); ?></p>
                            </div>
                            <div class="task-url">
                                <strong><?php echo esc_html__('Project Url:','task_1_td'); ?></strong>
                                <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'project_url', true)); ?>"><?php echo esc_url(get_post_meta(get_the_ID(), 'project_url', true)); ?></a>
                            </div>
                            <a href="<?php the_permalink();?>" class="btn btn-info mt-2"> <?php echo esc_html__('View Project','task_1_td'); ?></a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <!-- end of the loop -->

        <!-- pagination here -->

        <?php wp_reset_postdata(); ?>

    <?php else : ?>
        <p><?php echo esc_html__('Sorry, no projects are available','task_1_td');  ?></p>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
