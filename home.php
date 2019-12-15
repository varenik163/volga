<?php

/*
 * Template Name: Home
 */

get_header();

?>
<section id="home" class="content">
    <div class="complex_support">
        <div class="container">
            <div class="row">
                <?php
                $fields = get_field('home_complex_support');
                ?><div class="col-lg-12 home-h2">
                    <h2><?php echo $fields['home_complex_support_title'] ?></h2>
                </div>
                <?php include('templates/services.php'); // Услуги ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 centerated">
                <a class="recall-order" data-toggle="modal" data-target="#modalOrder">Получить бесплатную консультацию</a>
            </div>
        </div>
        <div class="row guarantees">
            <?php
            $fields = get_field('guarantees');
            ?><div class="col-lg-12 home-h2"><h2>Гарантируем</h2></div><?php
            foreach ($fields as $field): ?>
                <div class="col-lg-4 col-md-4 col-xs-12 guarantees-item">
                    <span class="shield"></span>
                    <span class="guarantees-text"><?php echo $field['guarantees_text']?></span>
                </div>
            <?php endforeach;
            ?>
        </div>
        <div class="row partners gradient">
            <?php
                $fields = get_field('partners');
            ?>
            <div class="col-lg-12 home-h2"><h2>Взаимодействуем</h2></div>
            <div class="col-lg-12 slider-wrapper">
                <div class="slider">
                    <div class="row__inner">
                        <?php foreach ($fields as $field): ?>
                            <div class="tile">
                                <div class="tile__media">
                                    <div class="slider-item partners-img">
                                        <img class="tile__img" src="<?php echo $field['logo']?>" />
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
            <?php
                $fields = get_field('home_bottom_blocks');
                $left = $fields['home_bottom_blocks_left'];
                $right = $fields['home_bottom_blocks_right'];
            ?>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="home-bottom-blocks-left main-info">
                    <h2><?php echo $left['home_bottom_blocks_left_title']; ?></h2>
                    <strong>Центральный офис</strong>
                    <p><?php echo $left['home_bottom_blocks_left_address']; ?></p>

                    <?php include('templates/telephone.php'); ?>
                    <?php include('templates/telephone_2.php'); ?>

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
                <?php
                $campaigns = get_posts( array(
                    'numberposts' => 10,
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
                <div class="campaign-home-slider">
                    <?php $i = 1; foreach ($campaigns as $campaign): ?>
                        <div class="home-bottom-blocks-right">
                            <img src="<?php bloginfo('template_url');?>/img/<?php if(($i % 2) == 0) echo 'roll_blue.png'; else echo 'roll.png'; ?>" />
                            <h2><?php echo $campaign->post_title; ?></h2>
                            <p><?php echo $campaign->post_content; ?></p>
                            <div class="recall-order-wrapper">
                                <a href="<?=get_permalink($campaign->ID); ?>" class="recall-order <?php if(($i % 2) == 0) echo 'recall-order-blue'; ?>">Подробнее о предложении</a>
                            </div>
                        </div>
                        <?php $i++; endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
