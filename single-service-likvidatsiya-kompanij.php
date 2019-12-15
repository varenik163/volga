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
            <!--  after header-->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php
                    $fields = get_field('custom_service-liquidation-after-header');
                    ?>
                    <div>
                        <h2 class="service-custom-bookers-after-header-block__title">
                            <?=$fields['custom_service-liquidation-after-header-title']?>
                        </h2>
                    </div>
                    <div class="service-custom-bookers-after-header-block">
                        <div>
                            <?php foreach ($fields['custom_service-liquidation-after-header-items'] as $field): ?>
                                <div class="col-lg-4">
                                    <div class="custom_service-liquidation-after-header-item">
                                        <div class="ques-sign">?</div>
                                        <div class="custom_service-liquidation-after-header-item-icon-wrapper-zero">
                                            <div class="custom_service-liquidation-after-header-item-icon-wrapper-one">
                                                <div class="custom_service-liquidation-after-header-item-icon-wrapper-two">
                                                    <div class="custom_service-liquidation-after-header-item-icon-wrapper">
                                                        <img
                                                                class="custom_service-liquidation-after-header-item-icon"
                                                                src="<?=$field['custom_service-liquidation-after-header-item-icon']?>"
                                                        />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="custom_service-liquidation-after-header-item-title">
                                            <?=$field['custom_service-liquidation-after-header-item-title']?>
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
                    <?php $fields = get_field('service_custom-liquidation-advantages');?>
                    <div class="col-lg-12">
                        <h2><?=$fields['service_custom-liquidation-advantages-title']?></h2>
                    </div>
                    <?php
                    foreach ($fields['service_custom-liquidation-advantages-items'] as $field): ?>
                        <div class="col-lg-4 col-md-12 col-xs-12">
                            <div class="about-items-item">
                                <img
                                    class="service_custom-liquidation-advantages-items-icon"
                                    src="<?php echo $field['service_custom-liquidation-advantages-items-icon']?>"
                                />
                                <strong><?php echo $field['service_custom-liquidation-advantages-items-title']?></strong>
                                <p><?php echo $field['service_custom-liquidation-advantages-items-text']?></p>
                            </div>
                        </div>
                    <?php endforeach;
                    ?>
                </div>
            </div>
            <div>
                <div class="row">
                    <?php $fields = get_field('service_custom-liquidation-types');?>
                    <div class="col-lg-12">
                        <h2><?=$fields['service_custom-liquidation-types-title']?></h2>
                    </div>
                    <?php
                    foreach ($fields['service_custom-liquidation-types-blocks'] as $field): ?>
                        <div class="col-lg-3 col-md-6 col-xs-12">
                            <div class="service_custom-liquidation-types-block">
                                <strong><?php echo $field['service_custom-liquidation-types-block-title']?></strong>
                                <p class="service_custom-liquidation-types-block-text"><?php echo $field['service_custom-liquidation-types-block-text']?></p>
                                <div class="centerated">
                                    <a
                                        class="recall-order"
                                        href="#service-custom-order"
                                    >
                                        Рассчитать стоимость
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;
                    ?>

                </div>
            </div>
            <div class="row">
                <?php $fields = get_field('service_custom-liquidation-help-form');?>
                <div class="col-lg-12">
                    <h2><?=$fields['service_custom-liquidation-help-form-title']?></h2>
                </div>
                <p class="service_custom-liquidation-help-form-text"><?=$fields['service_custom-liquidation-help-form-text']?></p>
                <div class="col-lg-12">
                    <form name="order_call_page_help" method="post" id="order_call_page_help" action="helpers/sendOrderByEmail.php">
                        <div class="col-lg-6 col-md-6 service_custom-liquidation-help-form-input">
                            <input class="form-control " type="text" name="phone" placeholder="*Ваш телефон" id="your_phone_page_help">
                        </div>
                        <div class="col-lg-6 col-md-6 service_custom-liquidation-help-form-button">
                            <div class="send_btn">
                                <button
                                        type="button"
                                        name="send" id="send_page_help"
                                        class="btn btn-primary"
                                        onclick="return submit_form_page(this)"
                                >
                                    Отправить
                                </button>
                            </div>
                        </div>
                        <input type="hidden" name="email" value="<?php the_field('email_recall','options'); ?>">
                        <input type="hidden" name="id_form" value="order_call_page_help" id="id_form_page_help">
                    </form>
                    <div class="thanks_page_help"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php
                    $fields = get_field('service_custom-liquidation-help-block');
                    ?>
                    <h2><?=$fields['service_custom-liquidation-help-block-title']?></h2>
                </div>
            </div>
            <div class="service-custom-bookers-legal-dep">
                <?php $i = 1; foreach ($fields['service_custom-liquidation-help-block-items'] as $field):
                    if(($i % 2) !== 0 && $i !== 1): ?><div class="service_custom-liquidation-help-block-item-devider"></div><?php endif;
                    if(($i % 2) !== 0): ?><div class="row"><?php endif;
                    ?>

                    <div class="col-lg-6">
                        <div class="service-custom-bookers-legal-dep__item service_custom-liquidation-help-block-item">
                            <img
                                    class="service-custom-bookers-legal-dep-item-icon"
                                    src="<?=$field['service_custom-liquidation-help-block-item-icon']?>" />
                            <div class="service-custom-bookers-legal-dep__inner-right">
                                <strong class="service-custom-bookers-legal-dep__item-title">
                                    <?=$field['service_custom-liquidation-help-block-item-title']?>
                                </strong>
                                <div>
                                    <?=$field['service_custom-liquidation-help-block-item-text']?>
                                </div>
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
