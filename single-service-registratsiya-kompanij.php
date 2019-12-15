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
                    $fields = get_field('what_includes');
                    ?>
                    <h2 class="service-custom-after-header-title">
                        <?=$fields['what_includes_title']?>
                    </h2>
                    <div class="">
                        <div>
                            <?php foreach ($fields['what_includes_items'] as $field): ?>
                                <div class="col-lg-4">
                                    <div class="what_includes-items">
                                        <img src="<?=$field['what_includes_item_icon']?>" />
                                        <div class="what_includes-items-text">
                                            <strong class="what_includes_item_title">
                                                <?=$field['what_includes_item_title']?>
                                            </strong>
                                            <div class="what_includes_item_text">
                                                <?=$field['what_includes_item_text']?>
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
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php
                    $fields = get_field('service_custom-what_inc-advantages');
                    ?>
                    <h2><?=$fields['service_custom-what_inc-advantages-title']?></h2>
                </div>
                <div class="service-custom-bookers-after-header-block-advantages">
                    <div>
                        <?php foreach ($fields['service_custom-what_inc-advantages-items'] as $field): ?>
                            <div class="col-lg-4">
                                <div class="service-custom-bookers-pluses__item-advantage">
                                    <img class="service-custom-bookers-pluses__item-icon" src="<?=$field['service_custom-what_inc-advantages_item-icon']?>" />
                                    <strong class="service-custom-bookers-pluses__item-title service_custom-what_inc-advantages_item-title">
                                        <?=$field['service_custom-what_inc-advantages_item-title']?>
                                    </strong>
                                    <div class="service-custom-bookers-pluses__item-text">
                                        <?=$field['service_custom-what_inc-advantages_item-text']?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;
                        ?>
                    </div>
                </div>
            </div>
            <!--tariffs-->
            <div class="about-comments">
                <div class="row">
                    <?php $fields = get_field('service_custom_reg_tariffs');?>
                    <div class="col-lg-12">
                        <h2><?=$fields['service_custom_reg_tariffs-title']?></h2>
                    </div>
                    <?php
                    foreach ($fields['service_custom_reg_tariffs-list'] as $field): ?>
                        <div class="col-lg-4">
                            <div class="tariff slider-item service_custom_reg_tariffs-item">
                                <h3><?php echo $field['service_custom_reg_tariffs-item-title']?></h3>
                                <strong class="tariff-price"><?php echo $field['service_custom_reg_tariffs-item-price']?></strong>
                                <div class="tariff-content"><?php echo $field['service_custom_reg_tariffs-item-text']?></div>
                                <a href="#service-custom-order" class="recall-order">Заказать</a>
                            </div>
                        </div>
                    <?php endforeach;
                    ?>
                    <div class="col-lg-12 service-custom-bookers-pricing__text-after">
                        <h3 class="">
                            <?=$fields['service_custom_reg_tariffs-text-after']?>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="about-comments">
                <div class="row">
                    <?php $fields = get_field('service_custom_reg_tariffs_ip');?>
                    <div class="col-lg-12">
                        <h2><?=$fields['service_custom_reg_tariffs-title']?></h2>
                    </div>
                    <?php
                    foreach ($fields['service_custom_reg_tariffs-list'] as $field): ?>
                        <div class="col-lg-4">
                            <div class="tariff slider-item slider-item service_custom_reg_tariffs-item-ip">
                                <h3><?php echo $field['service_custom_reg_tariffs-item-title']?></h3>
                                <strong class="tariff-price"><?php echo $field['service_custom_reg_tariffs-item-price']?></strong>
                                <div class="tariff-content"><?php echo $field['service_custom_reg_tariffs-item-text']?></div>
                                <a href="#service-custom-order" class="recall-order">Заказать</a>
                            </div>
                        </div>
                    <?php endforeach;
                    ?>
                    <div class="col-lg-12 service-custom-bookers-pricing__text-after">
                        <h3 class="">
                            <?=$fields['service_custom_reg_tariffs-text-after']?>
                        </h3>
                    </div>
                </div>
            </div>
            <!--profit-->
            <div class="row">
                <div class="">
                    <?php
                    $fields = get_field('service_custom_reg_profit');
                    ?>
                    <h2 class="service_custom-reg-help-title">
                        <?=$fields['service_custom_reg_profit-title']?>
                    </h2>
                    <div class="service_custom_reg_profit-wrapper">
                        <table class="service_custom_reg_profit">
                            <tbody>
                            <tr>
                                <td></td>
                                <td>В других компаниях</td>
                                <td>У нас</td>
                            </tr>
                            <?php foreach ($fields['service_custom_reg_profit-table-item'] as $field): ?>
                                <tr>
                                    <td><?=$field['service_custom_reg_profit-table-exp']?></td>
                                    <td class="service_custom_reg_profit-table-item-other"><?=$field['service_custom_reg_profit-table-other']?></td>
                                    <td><?=$field['service_custom_reg_profit-table-our']?></td>
                                </tr>
                            <?php endforeach;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-12 service-custom-bookers-pricing__text-after">
                    <h3 class="">
                        <?=$fields['service_custom_reg_profit-after']?>
                    </h3>
                </div>
            </div>
            <!--help-->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php
                    $fields = get_field('service_custom-reg-help');
                    ?>
                    <h2 class="service_custom-reg-help-title">
                        <?=$fields['service_custom-reg-help-title']?>
                    </h2>
                    <div class="">
                        <div>
                            <?php foreach ($fields['service_custom-reg-help-items'] as $field): ?>
                                <div class="col-lg-6 ">
                                    <div class="service_custom-reg-help-item slider-item">
                                        <img src="<?=$field['service_custom-reg-help-item_title_icon']?>" />
                                        <div class="service_custom-reg-help-items-text">
                                            <h4 class="service_custom-reg-help-item_title">
                                                <?=$field['service_custom-reg-help-item_title']?>
                                            </h4>
                                            <smal>
                                                <?=$field['service_custom-reg-help-item_text']?>
                                            </smal>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;
                            ?>
                        </div>
                    </div>
                </div>
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
