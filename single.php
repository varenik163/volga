<?php get_header(); ?>
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="single_post">
                            <div class="breadcrumbs"><?php if(function_exists('bcn_display')) : bcn_display(); endif;?></div>
                            <div class="post_title">
                                <h1><?php the_title(); ?></h1>
                            </div>
                            <div class="post_body">
                                <div class="thumbnail-image">
                                    <?php the_post_thumbnail('full', array('class' => 'thumbnail-image'));?>
                                </div>
                                <?php the_content(''); ?>
                                <div class="cabins">
                                    <?php
                                    $cabins = get_field('cabins');
                                    foreach ($cabins as $cabin): ?>
                                        <div class="cabin">
                                            <div class="img-cabin-wrapper">
                                                <img src="<?php echo $cabin['cabin']['cabin_img']; ?>" />
                                            </div>
                                            <div class="desc-cabin-wrapper">
                                                <strong><?php echo $cabin['cabin']['cabin_title']; ?></strong>
                                                <?php echo $cabin['cabin']['cabin_desc']; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
