<?php

/*
 * Template Name: About
 */

get_header();

?>
<div id="about" class="content">
    <div class="container">
        <div class="row post_content">
            <div class="col-lg-12">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="">
                        <div class="post_title">
                            <h1>
                                <?php the_title(); ?>
                                <span class="site-name">
                                        <span class="site-name-start">
                                            <?php echo substr(get_bloginfo('name'), 0, 4);?>
                                        </span>
                                    <span class="site-name-end">
                                            <?php echo substr(
                                                get_bloginfo('name'),
                                                4,
                                                strlen(get_bloginfo('name'))
                                            );?>
                                        </span>
                                </span>
                            </h1>
                        </div>
                        <div class="post_body">
                            <?php the_content(''); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
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

        <div class="row">
            <div class="col-lg-12">
                <h2>Ценности компании</h2>
            </div>
            <div class="col-lg-12 worth">
                <?php echo get_field('worth', 'options') ?>
            </div>
        </div>

        <div class="row guarantees">
            <?php
                $fields = get_field('guarantees', $home_id);
            ?><div class="col-lg-12"><h2>Гарантируем</h2></div><?php
            foreach ($fields as $field): ?>
                <div class="col-lg-4 col-md-4 col-xs-12 guarantees-item">
                    <span class="shield"></span>
                    <span class="guarantees-text"><?php echo $field['guarantees_text']?></span>
                </div>
            <?php endforeach;
            ?>
        </div>
        <div class="specs">
            <div class="row">
                <div class="col-lg-12"><h2>Наши специалисты</h2></div>
            </div>
            <?php
                $fields = get_field('specs');
            ?>
            <div class="row slider">
                <div class="specs-slider">
                    <?php foreach ($fields as $field): ?>
                        <div class="about-items-item">
                            <div class="img-circle-wrapper">
                                <img src="<?php echo $field['spec']['spec_img'];?>" />
                                <span class="img-filter"></span>
                            </div>
                            <div class="spec-role"><?php echo $field['spec']['spec_role']?></div>
                            <strong><?php
                                $name = explode(' ', $field['spec']['spec_name']);
                                echo $name[0] . ' ' . $name[1]
                                ?>
                                <div><?=$name[2]?></div>
                            </strong>

                            <p><?php echo $field['spec']['spec_desc']?></p>
                        </div>
                    <?php endforeach;
                    ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 centerated ">
                <a class="recall-order" data-toggle="modal" data-target="#modalOrder">Получить бесплатную консультацию</a>
            </div>
        </div>
        <div class="vacancy">
            <div class="row">
                <div class="anchor-wrap">
                    <div id="about-vacancy-anchor"></div>
                </div>
                <div class="col-lg-12"><h2>Наши вакансии</h2></div>
            </div>
            <?php
            $fields = get_field('vacancy', 'options');
            ?>
            <div class="row">
                <div class="col-lg-12 slider-wrapper">
                    <div class="slider">
                        <div class="campaign-slider">
                            <?php foreach ($fields as $field): ?>
                                <div class="vacancy-item-wrapper">
                                    <div class="vacancy-item">
                                        <h3><?php echo $field['vacancy_item']['name']?></h3>
                                        <div class="vacancy-desc"><?php echo $field['vacancy_item']['desc']?></div>
                                        <a class="recall-order recall-order-blue" data-toggle="modal" data-target="#modalResume">
                                            Отправить резюме
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-comments gradient" id="about-reviews">
            <div class="row">
                <div class="col-lg-12">
                    <div id="about-reviews-anchor"></div>
                    <h2>Отзывы клиентов</h2>
                </div>
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
