<?php ?>

<div class="row main-info-block">
    <div class="col-lg-6 col-md-6 col-xs-12">
        <div class="main-info">
            <h2>Мы работаем для Вас!</h2>
            <strong>Центральный офис</strong>
            <p><?php echo get_field('address', 'options'); ?></p>

            <?php include('telephone.php'); ?>
            <?php include('telephone_2.php'); ?>

            <span class="mail">
                        <a href="mailto:<?php echo get_field('email', 'options'); ?>" >
                            <span class="icon icon-mail"></span>
                            <?php echo get_field('email', 'options'); ?>
                        </a>
                    </span>
            <span class="telegram">
                        <a href="tg://resolve?domain=<?php echo get_field('telegram', 'options'); ?>">
                            <span class="icon icon-plain"></span>
                            <?php echo get_field('telegram', 'options'); ?>
                        </a>
                    </span>
            <div class="recall-order-wrapper">
                <a class="recall-order recall-order-blue" data-toggle="modal" data-target="#modalOrder">Заказать обратный звонок</a>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-xs-12">
        <div id="map">
            <script
                type="text/javascript"
                charset="utf-8"
                async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A86b8066e4820811ab4173efd99e39d28b41c997369508f4bdcb1d3fe45f282bc&amp;width=100%&amp;height=537&amp;lang=ru_RU&amp;scroll=false"
            ></script>
        </div>
    </div>
</div>
