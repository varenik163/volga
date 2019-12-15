<?php get_header(); ?>
    <script>
        jQuery(".top_bar_page").css({ 'background': 'transparent'});
        jQuery(window).scroll(function () {
	        if(jQuery(window).scrollTop() >= 20) jQuery('.top_bar_page').css({
		        'background': '#f5f7f9'
	        });

	        if(jQuery(window).scrollTop() < 20) jQuery('.top_bar_page').css({
		        'background': 'transparent'
	        })
        });
    </script>
    <div class="head_top service-custom-top" id="head_top_block">

        <div class="head_content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h1><?=get_field('service-custom-header-title')?></h1>
                    </div>
                </div>
                <div class="row recall-order-wrapper">
                    <div class="col-lg-12">
                        <a class="recall-order" data-toggle="modal" data-target="#modalOrder">Заказать обратный звонок</a>
                    </div>
                </div>
                <?php //include("templates/animatedArrow.php")?>
            </div>
        </div>
    </div>
    <section id="other" class="service-custom content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php
                    $fields = get_field('service_custom_what_includes_hr');
                    ?>
                    <h2 class="service-custom-after-header-title">
                        <?=$fields['service_custom_what_includes_hr-title']?>
                    </h2>
                    <div class="">
                        <div>
                            <?php foreach ($fields['service_custom_what_includes_hr-items'] as $field): ?>
                                <div class="col-lg-6">
                                    <div class="what_includes-items">
                                        <img src="<?=$field['service_custom_what_includes_hr-item-icon']?>" />
                                        <div class="what_includes-items-text">
                                            <strong class="what_includes_item_title what_includes_hr-text">
                                                <?=$field['service_custom_what_includes_hr-item-title']?>
                                            </strong>
                                            <div class="what_includes_item_text ">
                                                <?=$field['service_custom_what_includes_hr-item-text']?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--  pluses-->
            <div id="about" class="services-about">
                <div class="row about-items">
                    <?php $fields = get_field('service_custom_hr_adv');?>
                    <div class="col-lg-12">
                        <h2><?=$fields['service_custom_hr_adv-title']?></h2>
                    </div>
                    <?php
                    foreach ($fields['service_custom_hr_adv-items'] as $field): ?>
                        <div class="col-lg-4 col-md-12 col-xs-12">
                            <div class="about-items-item service_custom-legal-services-advantages-item">
                                <img
                                    class="service_custom-liquidation-advantages-items-icon"
                                    src="<?php echo $field['service_custom_hr_adv-item-icon']?>"
                                />
                                <strong class="service_custom_hr_adv-item-title"><?php echo $field['service_custom_hr_adv-item-title']?></strong>
                                <p><?php echo $field['service_custom_hr_adv-item-text']?></p>
                            </div>
                        </div>
                    <?php endforeach;
                    ?>
                </div>
            </div>
            <!--tariffs-->
            <div class="about-comments">
                <div class="row">
                    <?php $fields = get_field('service_custom_hr_tariff');?>
                    <div class="col-lg-12">
                        <h2><?=$fields['service_custom_hr_tariff-title']?></h2>
                    </div>
                    <?php
                    foreach ($fields['service_custom_hr_tariff-items'] as $field): ?>
                        <div class="col-lg-4">
                            <div class="tariff slider-item slider-item service_custom_reg_tariffs-item-ip service_custom-legal-services-advantages-tariffs-item">
                                <h3 class="service_custom_hr_tariff-item-title"><?php echo $field['service_custom_hr_tariff-item-title']?></h3>
                                <strong class="tariff-price-small"><?php echo $field['service_custom_hr_tariff-item-price']?></strong>
                                <!--<div class="tariff-content"><?php /*echo $field['service_custom_hr_tariff-item-text']*/?></div>-->
                                <a href="#service-custom-order" class="recall-order">Рассчитать стоимость</a>
                            </div>
                        </div>
                    <?php endforeach;
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php
                    $fields = get_field('service_custom_hr_ur');
                    ?>
                    <h2><?=$fields['service_custom_hr_ur-title']?></h2>
                </div>
            </div>
            <div class="service-custom-bookers-legal-dep">
                <?php $i = 1; foreach ($fields['service_custom_hr_ur-blocks'] as $field):
                    if(($i % 2) !== 0): ?><div class="row"><?php endif;
                    ?>

                    <div class="col-lg-6 service-custom-bookers-legal-dep__item">
                        <img
                                class="service-custom-bookers-legal-dep-item-icon"
                                src="<?=$field['service_custom_hr_ur-block-icon']?>" />
                        <div class="service-custom-bookers-legal-dep__inner-right">
                            <strong class="service-custom-bookers-legal-dep__item-title">
                                <?=$field['service_custom_hr_ur-block-title']?>
                            </strong>
                            <div>
                                <?=$field['service_custom_hr_ur-block-desc']?>
                            </div>
                        </div>
                    </div>

                    <?php
                    if(($i % 2) === 0): ?></div><?php endif;
                    $i++;
                endforeach;
                ?>
            </div>
            <!--  reviews-->
            <div class="about-comments gradient">
                <div class="row">
                    <div class="col-lg-12"><h2>Отзывы клиентов</h2></div>
                </div>
                <?php include('templates/reviews.php'); // Отзывы ?>
                <div id="service-custom-order"></div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h2>Оставьте заявку на бесплатную консультацию</h2>
                    <form name="order_call_page" method="post" id="order_call_page" action="helpers/sendOrderByEmail.php">
                        <input class="form-control" type="text" name="name" placeholder="Имя" id="your_name_page">
                        <input class="form-control" type="text" name="phone" placeholder="*Ваш телефон" id="your_phone_page">
                        <input type="hidden" name="email" value="<?php the_field('email_recall','options'); ?>" id="send_to_page">
                        <input type="hidden" name="id_form" value="order_call" id="id_form_page">
                        <div class="send_btn">
                            <button
                                    type="button"
                                    name="send" id="send_page"
                                    class="btn btn-primary btn-yellow"
                                    onclick="return submit_form_page(this)"
                                    style="margin-top: 20px;"
                            >
                                Отправить
                            </button>
                        </div>
                    </form>
                    <div class="thanks_page"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h2>Контакты</h2>
                    <?php include('templates/contacts.php'); ?>
                </div>
            </div>
            <?php foreach ($reviews as $review): ?>
                <div class="review-preview review-<?=$review->ID?>">
                    <img src="<?php echo get_field('review_original', $review->ID); ?>" />
                </div>
            <?php endforeach; ?>
        </div>
    </section>
<?php get_footer(); ?>
