<?php
get_header();
?>

<img class="container-fluid pt-5 " src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width ?>" alt="">


    <div class="container">
        <div class="row pt-5">
            <div class="col-sm-2">
                <?php

                dynamic_sidebar('left-sidebar');

                ?>
            </div>
            <div class="col-sm-8">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <h1><?php the_title(); ?></h1>
                        <div>
                            <?php the_content(); ?>
                        </div>
            </div>
                    <?php endwhile;
                endif; ?>

            <div class="col-sm-2">
                <?php

                dynamic_sidebar('right-sidebar');

                ?>
            </div>
        </div>
    </div>
</main>



<?php get_template_part('banner'); ?>

<?php get_footer();
