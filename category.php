<!--category template-->
<?php
get_header(); ?>
<main>
    <h1 class="h1 text-center">  <?php echo esc_html__(single_cat_title(),'task_1_td'); ?></h1>
    <?php
    if (have_posts()) :
        ?>

        <div class="row">

            <!-- the loop -->
            <?php

        while (have_posts()) : the_post();
                ?>
                <div class="col-md-4 col-6">
                    <div class="card">
                        <div class="card-title text-center">
                               <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <!-- end of the loop -->


        <?php wp_reset_postdata(); ?>

    <?php else : ?>
        <p><?php echo esc_html__('Sorry, no posts are available to this category','task_1_td');  ?></p>
    <?php endif; ?>
</main>
<?php get_footer(); ?>