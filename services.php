<?php

/*
 * Template Name: Services
 */

get_header();

?>
<div id="other" class="content">
    <div class="container">
        <div class="row post_content">
            <div class="col-lg-12">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="">
                        <div class="post_title">
                            <h1>
                                <?php the_title(); ?>
                            </h1>
                        </div>
                        <div class="post_body">
                            <?php the_content(''); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div id="about" class="services-about">
            <div class="row about-items">
                <?php
                $home_id = (int) get_option( 'page_on_front' );
                $fields = get_field('header_about_items', $home_id);
                foreach ($fields as $field): ?>
                    <div class="col-lg-4">
                        <div class="about-items-item">
                            <img src="<?php echo $field['header_about_items_item']['header_about_items_item_icon']?>" />
                            <strong><?php echo $field['header_about_items_item']['header_about_items_item_text']?></strong>
                            <p><?php echo $field['header_about_items_item']['header_about_items_item_desc']?></p>
                        </div>
                    </div>
                <?php endforeach;
                ?>
            </div>
        </div>
    </div>
    <div class="complex_support">
        <div class="container" >
            <div class="row">
                <?php
                $fields = get_field('home_complex_support', $home_id);
                ?><div class="col-lg-12">
                    <h2><?php echo $fields['home_complex_support_title'] ?></h2>
                </div>
                <?php include('templates/services.php'); // Услуги ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div id="campaign-anchor-wrap">
                <div id="campaign-anchor"></div>
            </div>
            <div class="col-lg-12"><h2>Акции и спецпредложения</h2></div>
        </div>
        <div class="row">
            <?php
            $campaigns = get_posts( array(
                'numberposts' => 4,
                'category'    => 0,
                'orderby'     => 'date',
                'order'       => 'DESC',
                'include'     => array(),
                'exclude'     => array(),
                'meta_key'    => '',
                'meta_value'  =>'',
                'post_type'   => 'campaign',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ) );
            ?>
            <div class="col-lg-12 campaign-slider">
                <?php $i = 1; foreach ($campaigns as $campaign): ?>
                    <div class="home-bottom-blocks-right">
                        <img src="<?php bloginfo('template_url');?>/img/<?php if(($i % 2) == 0) echo 'roll_blue.png'; else echo 'roll.png'; ?>" />
                        <h3><?php echo $campaign->post_title; ?></h3>
                        <p><?php echo $campaign->post_content; ?></p>
                        <div class="recall-order-wrapper">
                            <a href="<?=get_permalink($campaign->ID); ?>" class="recall-order <?php if(($i % 2) == 0) echo 'recall-order-blue'; ?>">Подробнее о предложении</a>
                        </div>
                    </div>
                    <?php $i++; endforeach;
                ?>
            </div>
        </div>
        <div class="about-comments gradient">
            <div class="row">
                <div class="col-lg-12"><h2>Отзывы клиентов</h2></div>
            </div>
            <?php include('templates/reviews.php'); // Отзывы ?>
        </div>
        <div class="row image-phrase">
            <div class="col-lg-12">
                <h3><?php echo get_field('image_phrase', 'options');?></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 centerated">
                <a class="recall-order recall-order-blue" data-toggle="modal" data-target="#modalOrder">Заказать обратный звонок</a>
            </div>
        </div>
        <?php foreach ($reviews as $review): ?>
            <div class="review-preview review-<?=$review->ID?>">
                <img src="<?php echo get_field('review_original', $review->ID); ?>" />
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php get_footer(); ?>
