<!--single-post-project-on-archive-->

<div class="card mt-2 mb-2 ml-1 mr-1">
    <div class="featured_image w-100">
        <img src="<?php echo esc_url(the_post_thumbnail_url(get_the_ID())); ?>" class="img-fluid" alt="">
    </div>
    <div class="card-title text-center">
        <?php the_title('<h2 class="h2">', '</h2>'); ?>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr>
                    <th><?php echo esc_html__('Date (Start-End)', 'task-1-theme'); ?></th>
                    <td><?php echo esc_html(get_post_meta(get_the_ID(), 'start_date', true)); ?> -
                <?php echo esc_html(get_post_meta(get_the_ID(), 'end_date', true)); ?></td>
                </tr>
                <tr>
                    <th><?php echo esc_html__('Project URL:', 'task-1-theme'); ?></th>
                    <td>
                          <a href="<?php echo esc_url(get_post_meta(get_the_ID(), 'project_url', true)); ?>">
                            <?php echo esc_html(get_post_meta(get_the_ID(), 'project_url', true)); ?>
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="text-center">
            <a href="<?php the_permalink(); ?>"
           class="btn btn-info mt-2"><?php echo esc_html__('View Project', 'task-1-theme'); ?></a>
        </div>

           </div>
</div>
