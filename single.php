<!--general single post page-->
<?php get_header(); ?>


<div id="main-content">
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
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <img src="<?php the_post_thumbnail_url(); ?>" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <?php the_content(); ?>
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
</div>


<?php get_footer(); ?>
