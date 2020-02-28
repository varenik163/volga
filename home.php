<?php

/*
 * Template Name: Home
 */

get_header();

?>
<section id="home" class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-xs-12">
                <div class="flex flex-column header_gallery_wrapper">
                    <p class="header_gallery-left_item">
                        <a
                                class="tour-order-button centerated tour-order-button-red flex opacity-hover"
                                data-toggle="modal"
                                data-target="#modalSign"
                        >
                            Подписаться на рассылку выгодных предложений
                        </a>
                    </p>
                    <?php $text = get_field('header_gallery_text_left', 'options'); foreach ($text as $text_field):?>
                        <p class="header_gallery-left_item">
                            – <?=$text_field['header_gallery_text_left_item']?>
                        </p>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-xs-12">
                <div class="header_gallery_wrapper">
                    <div class="campaign-home-slider" id="header_gallery">
                        <?php if(is_front_page()): $imgs = get_field('heafer_gallery', 'options'); foreach ($imgs as $img):?>
                            <div class="header_gallery-item">
                                <img src="<?=$img['img']?>" />
                                <div class="header_gallery-img_desc"><?=$img['img_desc']?></div>
                            </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 centerated">
                <h2>Речные круизы</h2>
            </div>
            <div class="tour-order-button-row">
                <div class="col-lg-12 flex">
                    <a class="tour-order-button flex opacity-hover" data-toggle="modal" data-target="#modalCruise">Оставить заявку на круиз</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <script type="text/javascript" id="Riverlines" src="https://static.riverlines.ru/js/general.remote.js"></script>
                    <?php include('templates/riverlineExample.php'); ?>
                </div>
            </div>
        </div>
        <div class="row motorships">
            <div class="col-lg-12">
                <?php include('templates/motorships.php'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 centerated">
                <h2>Почему обращаются к нам</h2>
            </div>
            <?php
            $fields = get_field('advantages', 'options');
            foreach ($fields as $field): ?>
                <div class="col-lg-5ths col-sm-12 col-md-5ths col-xs-12">
                    <div class="home-complex-support-item">
                        <div class="img-circle-wrapper">
                            <img src="<?php echo $field['advantages_img']; ?>" />
                        </div>
                        <strong class="cat-name"><?php echo $field['advantages_title']; ?></strong>
                        <p class="cat-desc"><?php echo $field['advantages_text']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="recall-order-wrapper centerated">
                    <a class="recall-order recall-order-blue" data-toggle="modal" data-target="#modalOrder">Заказать обратный звонок</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
