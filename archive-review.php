<?php get_header(); ?>
<section class="content" id="other">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php if (!is_home() || !is_front_page()) : ?>
                    <div class="breadcrumbs"><?php if(function_exists('bcn_display')) : bcn_display(); endif;?></div>
                <?php endif;?>
                <div class="post_title">
                    <h1>Отзывы</h1>
                </div>
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <?php /*echo do_shortcode('[modula id="314"]'); */?>
                    <?php echo do_shortcode('[metaslider id="423"]'); ?>
                </div>
                <div class="col-lg-12 col-md-12 col-xs-12">
                <h2>Другие отзывы</h2>
                </div>
                <?php if (have_posts()) : ?>
                    <div class="cat_posts about-comments">
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="col-lg-4 col-md-4 col-xs-12">
                                <div class="slider-item">
                                    <div class="comment-text"><?=kama_excerpt(); ?> </div>
                                    <div class="comment-divider"></div>
                                    <div class="comment-desc"><?php the_title(); ?></div>
                                    <a href="<?php the_permalink(); ?>">
                                        <span class="icon green-mountains-icon"></span>
                                        Оригинал отзыва
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="clearfix"></div>
                    <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
                <?php else : ?>
                    Пока нет других отзывов
                <?php endif; ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
