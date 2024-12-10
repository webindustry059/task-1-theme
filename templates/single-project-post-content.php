<!--single-post-project-on-archive-->

<div class="card">
    <div class="card-title text-center">
        <?php the_title('<h2 class="h2">', '</h2>'); ?>
    </div>
    <div class="card-body">
        <div class="task-dates">
            <strong><?php echo esc_html__('Date (From - To):', 'task_1_td'); ?></strong>
            <p>
                <?php echo esc_html(get_post_meta(get_the_ID(), 'start_date', true)); ?> -
                <?php echo esc_html(get_post_meta(get_the_ID(), 'end_date', true)); ?>
            </p>
        </div>
        <div class="task-url">
            <strong><?php echo esc_html__('Project URL:', 'task_1_td'); ?></strong>
            <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'project_url', true)); ?>">
                <?php echo esc_html(get_post_meta(get_the_ID(), 'project_url', true)); ?>
            </a>
        </div>
        <a href="<?php the_permalink(); ?>"
           class="btn btn-info mt-2"><?php echo esc_html__('View Project', 'task_1_td'); ?></a>
    </div>
</div>
