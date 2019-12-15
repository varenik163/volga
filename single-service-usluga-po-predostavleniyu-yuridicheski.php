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
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php
                    $fields = get_field('service-custom-after-header-block');
                    ?>
                    <div>
                        <h2><?=$fields['service-custom-after-header-block-title']?></h2>
                    </div>
                    <div class="leagal-placement">
                        <p><strong><?=$fields['service-custom-after-header-block-under-title-text']?></strong></p>
                        <ol>
                            <?php foreach ($fields['service-custom-after-header-block-list'] as $field): ?>
                                <li>
                                    <?=$field['service-custom-after-header-block-list-item']?>
                                </li>
                            <?php endforeach;
                            ?>
                        </ol>
                        <div class="leagal-placement-desc">
                            <strong><?=$fields['service-custom-after-header-block-under-list-text']?></strong>
                        </div>
                    </div>
                </div>
            </div>
            <div id="about" class="services-about">
                <div class="row about-items">
                    <?php $fields = get_field('service-custom-advantages');?>
                    <div class="col-lg-12">
                        <h2><?=$fields['service-custom-advantages-title']?></h2>
                    </div>
                    <?php
                    foreach ($fields['service-custom-advantages-list'] as $field): ?>
                        <div class="col-lg-4 col-md-12 col-xs-12">
                            <div class="about-items-item">
                                <img src="<?php echo $field['service-custom-advantages-list-item-icon']?>" />
                                <strong><?php echo $field['service-custom-advantages-list-item-title']?></strong>
                                <p><?php echo $field['service-custom-advantages-list-item-desc']?></p>
                            </div>
                        </div>
                    <?php endforeach;
                    ?>
                </div>
            </div>
            <div class="about-comments">
                <div class="row">
                    <?php $fields = get_field('service-custom-tariff');?>
                    <div class="col-lg-12">
                    <h2><?=$fields['service-custom-tariff-title']?></h2>
                    </div>
                    <?php
                    foreach ($fields['service-custom-tariff-list'] as $field): ?>
                        <div class="col-lg-4">
                            <div class="tariff slider-item">
                                <h3><?php echo $field['service-custom-tariff-list-item-title']?></h3>
                                <strong class="tariff-price"><?php echo $field['service-custom-tariff-list-item-price']?></strong>
                                <div class="tariff-content"><?php echo $field['service-custom-tariff-list-item-desc']?></div>
                                <a href="#service-custom-order" class="recall-order">Заказать</a>
                            </div>
                        </div>
                    <?php endforeach;
                    ?>
                </div>
            </div>
            <div>
                <div class="row">
                    <?php $fields = get_field('service-custom-work');?>
                    <div class="col-lg-12">
                    <h2><?=$fields['service-custom-work-title']?></h2>
                    </div>
                    <div class="service-custom-work-list">
                        <?php
                        foreach ($fields['service-custom-work-list'] as $field): ?>
                            <div class="col-lg-4 work-item">
                                <img class="service-custom-work-item-icon" src="<?=$field['service-custom-work-item-icon']?>" />
                                <div class="">
                                    <?=$field['service-custom-work-item']?>
                                </div>
                            </div>
                        <?php endforeach;
                        ?>
                    </div>
                </div>
            </div>
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
