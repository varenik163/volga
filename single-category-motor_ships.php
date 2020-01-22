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
                                <div class="thumbnail-image">
                                    <?php the_post_thumbnail('full', array('class' => 'thumbnail-image'));?>
                                </div>
                                <div>
                                    <?php the_content(''); ?>
                                    <?php $cabins = get_field('cabins'); var_dump($cabin); foreach ($cabins as $cabin): ?>?>
                                    <div class="home-complex-support-item">
                                        <div class="img-cabin-wrapper">
                                            <img src="<?php echo $cabin['cabin_img'];?>" />
                                        </div>
                                        <strong class="cat-name"><?php echo $cat['cabin_title']; ?></strong>
                                        <p class="cat-desc"><?php echo $cat['cabin_title']; ?></p>
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
