<?php get_header(); ?>
    <script>
        jQuery(".top_bar_page").css({ 'background': 'transparent' });
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
                    $fields = get_field('service-custom-bookers-after-header-block');
                    ?>
                    <div>
                        <h2 class="service-custom-bookers-after-header-block__title">
                            <?=$fields['service-custom-bookers-after-header-block-title']?>
                        </h2>
                    </div>
                    <div class="service-custom-bookers-after-header-block">
                        <div>
                            <?php foreach ($fields['service-custom-bookers-after-header-block-items'] as $field): ?>
                                <div class="col-lg-6">
                                    <div class="service-custom-bookers-after-header-block__item">
                                        <img src="<?=$field['service-custom-bookers-after-header-block-item-icon']?>" />
                                        <div class="service-custom-bookers-after-header-block__item-right">
                                            <strong class="service-custom-bookers-after-header-block__item-title">
                                                <?=$field['service-custom-bookers-after-header-block-item-title']?>
                                            </strong>
                                            <div>
                                                <?=$field['service-custom-bookers-after-header-block-item-text']?>
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
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php
                    $fields = get_field('service-custom-bookers-pluses');
                    ?>
                    <h2><?=$fields['service-custom-bookers-pluses-title']?></h2>
                </div>
                <div class="service-custom-bookers-after-header-block">
                    <div>
                        <?php foreach ($fields['service-custom-bookers-pluses-items'] as $field): ?>
                            <div class="col-lg-4">
                                <div class="service-custom-bookers-pluses__item">
                                    <img class="service-custom-bookers-pluses__item-icon" src="<?=$field['service-custom-bookers-pluses-item-icon']?>" />
                                    <strong class="service-custom-bookers-pluses__item-title">
                                        <?=$field['service-custom-bookers-pluses-item-title']?>
                                    </strong>
                                    <div class="service-custom-bookers-pluses__item-text">
                                        <?=$field['service-custom-bookers-pluses-item-text']?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;
                        ?>
                    </div>
                </div>
            </div>
            <!--  pricing-->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php
                    $fields = get_field('service-custom-bookers-pricing');
                    $pricing_includdes = $fields['service-custom-bookers-pricing-doing-items'];
                    ?>
                    <h2><?=$fields['service-custom-bookers-pricing-title']?></h2>
                    <div class="service-custom-bookers-pricing_subtitle" >
                        <h3><?=$fields['service-custom-bookers-pricing-doing-title']?></h3>
                    </div>
                    <div class="service-custom-bookers-pricing">
                        <div class="col-lg-6 col-md-12 col-xs-12">
                            <ul>
                                <?php foreach (array_slice($pricing_includdes, 4) as $field): ?>
                                    <li>
                                        <div class="service-custom-bookers-pricing__doing-item">
                                            <?=$field['service-custom-bookers-pricing-doing-item']?>
                                        </div>
                                    </li>
                                <?php endforeach;
                                ?>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-12 col-xs-12">
                            <ul>
                                <?php foreach (array_slice($pricing_includdes, 5, count($pricing_includdes) - 1) as $field): ?>
                                    <li>
                                        <div class="service-custom-bookers-pricing__doing-item">
                                            <?=$field['service-custom-bookers-pricing-doing-item']?>
                                        </div>
                                    </li>
                                <?php endforeach;
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-comments">
                <div class="row">
                    <?php
                    foreach ($fields['service-custom-bookers-pricing-tariffs'] as $field): ?>
                        <div class="col-lg-3">
                            <div class="tariff slider-item">
                                <h4 class="service-custom-bookers-pricing-tariff-title">
                                    <?php echo $field['service-custom-bookers-pricing-tariff-title']?>
                                </h4>
                                <strong class="tariff-price">
                                    <?php echo $field['service-custom-tariff-list-item-price']?>
                                </strong>
                                <div class="tariff-content service-custom-bookers-pricing__tariff-desc">
                                    <?php echo $field['service-custom-bookers-pricing-tariff-desc']?>
                                </div>
                                <a href="#service-custom-order" class="recall-order">Заказать</a>
                            </div>
                        </div>
                    <?php endforeach;
                    ?>
                    <div class="col-lg-12 service-custom-bookers-pricing__text-after">
                        <h3 class="">
                            <?=$fields['service-custom-bookers-pricing-text-after']?>
                        </h3>
                        <a
                            href="#service-custom-order"
                            class="recall-order recall-order-blue service-custom-bookers-pricing__order-button"
                        >
                            Получить специальные цены
                        </a>
                    </div>
                </div>
            </div>
            <!--  privacy-->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php
                    $fields = get_field('service-custom-bookers-privacy');
                    ?>
                    <h2><?=$fields['service-custom-bookers-privacy-title']?></h2>
                    <div class="service-custom-bookers-privacy">

                        <?php foreach ($fields['service-custom-bookers-privacy-items'] as $field): ?>
                            <div class="service-custom-bookers-privacy__item">
                                <img
                                    class="service-custom-bookers-privacy__item-icon"
                                    src="<?=$field['service-custom-bookers-privacy-item-icon']?>"
                                />
                                <?=$field['service-custom-bookers-privacy-item-text']?>
                            </div>
                        <?php endforeach;
                        ?>
                    </div>
                </div>
            </div>
            <!--  legal department-->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php
                    $fields = get_field('service-custom-bookers-legal-dep');
                    ?>
                    <h2><?=$fields['service-custom-bookers-legal-dep-title']?></h2>
                </div>
            </div>
            <div class="service-custom-bookers-legal-dep">
                    <?php $i = 1; foreach ($fields['service-custom-bookers-legal-dep-items'] as $field):
                        if(($i % 2) !== 0): ?><div class="row"><?php endif;
                        ?>

                        <div class="col-lg-6 service-custom-bookers-legal-dep__item">
                            <img
                                class="service-custom-bookers-legal-dep-item-icon"
                                src="<?=$field['service-custom-bookers-legal-dep-item-icon']?>" />
                            <div class="service-custom-bookers-legal-dep__inner-right">
                                <strong class="service-custom-bookers-legal-dep__item-title">
                                    <?=$field['service-custom-bookers-legal-dep-item-title']?>
                                </strong>
                                <div>
                                    <?=$field['service-custom-bookers-legal-dep-item-desc']?>
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
                                    class="btn btn-primary"
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
