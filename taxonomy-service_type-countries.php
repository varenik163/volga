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
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <?php
                        $countries = get_posts( array(
                            'numberposts' => 0,
                            'orderby'     => 'date',
                            'order'       => 'ASC',
                            'category_name'    => 'country',
                            'post_type'   => 'post',
                            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                        ) );
                        // var_dump($motorships);
                        foreach ($countries as $country): ?>
                            <div>
                                <a href="<?=get_permalink($country->ID); ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url($country->ID);?>" style="margin: 0 10px 10px 0" />
                                    <strong class="country-item-name"><?php echo $country->post_title; ?></strong>
                                </a>
                            </div>
                        <?php endforeach;
                        ?>
                    </div>
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="tour-order-button-row">
                            <div class="col-lg-12 flex">
                                <a class="tour-order-button flex opacity-hover" data-toggle="modal" data-target="#modalTour">Оставить заявку на тур</a>
                            </div>
                        </div>
                        <script type="text/javascript" src="https://www.tour-box.ru/js/tb/find_styles.js"></script>
                        <script type="text/javascript" src="https://www.tour-box.ru/js/tb/find_inc.js"></script>
<script type="text/javascript" src="https://www.tour-box.ru/js/tb/find_load.js"></script>
<script language="javascript">
    var panel_id = 'find_panel';
    var result_id = 'find_result';
</script>
<div id="find_panel"></div>
<div id="find_result"></div>
                    </div>
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
