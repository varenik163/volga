<?php get_header(); ?>
<section class="content" id="other">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <?php if (!is_home() || !is_front_page()) : ?>
                    <div class="breadcrumbs"><?php if(function_exists('bcn_display')) : bcn_display(); endif;?></div>
                <?php endif;?>
                <div class="post_title">
                    <h1>Отзывы</h1>
                </div>

                <?php if (have_posts()) : ?>
                    <div class="cat_posts about-comments">
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="col-lg-6 col-md-6 col-xs-12">
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
                    Извините, но запрашиваемая Вами информация не найдена<br />
                    Попробуйте перейти на <a href="<?php bloginfo('home'); ?>">главную страницу</a>
                <?php endif; ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
