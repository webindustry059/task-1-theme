<!--single-post-content-->
    <div class="card">
        <div class="card-body">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="post_featured_image w-100">
                    <img src="<?php the_post_thumbnail_url(get_the_ID()); ?>" class="img-fluid" alt="">
                </div>
                <h2 class="h2"><a href="<?php the_permalink(); ?>" class="text-dark"><?php the_title(); ?></a></h2>
                <div class="entry-meta">
                    <p>Published on: <?php echo get_the_date(); ?></p>
                </div>
                <div class="entry-content">
                    <?php
                    // Limit the_content() to 100 characters
                    $content = apply_filters('the_content', get_the_content());
                    echo mb_substr(wp_strip_all_tags($content), 0, 50) . '...';
                    ?>
                </div>
                <a href="<?php the_permalink(); ?>"
                   class="btn btn-info"><?php echo esc_html__('View Post', 'task-1-theme'); ?></a>
            </article>
        </div>
    </div>
