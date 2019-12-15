<?php get_header(); ?>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="single_post">
                            <div class="breadcrumbs"><?php if(function_exists('bcn_display')) : bcn_display(); endif;?></div>
                            <div class="post_title">
                                <h1><?php the_title(); ?></h1>
                            </div>
                            <div class="post_body">
                                <?php the_post_thumbnail('medium', array('class' => 'alignleft'));?>
                                <?php the_content(''); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
