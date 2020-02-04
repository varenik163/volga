<?php get_header(); ?>
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?php if (!is_home() || !is_front_page()) : ?>
                    <div class="breadcrumbs"><?php if(function_exists('bcn_display')) : bcn_display(); endif;?></div>
                <?php endif;?>
                <h1>
                    <?php single_term_title(); ?>
                </h1>
                <section>
                    <p>
                        Друзья, наша компания рада предложить Вам автобусные туры из Самары:
                    </p>
                    <ul>
                        <li>в Казань</li>
                        <li>в Уфу</li>
                        <li>в Ульяновск</li>
                        <li>в Саранск</li>
                        <li>в Екатеринбург</li>
                    </ul>
                    <p>
                        А также экскурсии по г.Самаре и Самарской области.
                        Будем рады сотрудничеству.
                    </p>
                    <p>
                        Ждем Ваших заявок по тел. <a href="tel:8 (846) 248-28-65">8 (846) 248-28-65</a>,
                        e-mail: <a href="mailto:info@volga-kruis.ru">info@volga-kruis.ru</a>
                    </p>
                </section>
                <?php if (have_posts()) : ?>
                    <div class="cat_posts">
                        <?php while (have_posts()) : the_post(); ?>
                            <div class="col-lg-12 col-md-12 col-xs-12">
                                <div class="post_thumb">
                                    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('medium');?></a>
                                </div>
                                <h2 class="post_title">
                                    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <div>
                                    <?php echo kama_excerpt();?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="clearfix"></div>
                    <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
                <?php endif; ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>
