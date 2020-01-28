<?php

/*
 * Template Name: Home
 */

get_header();

?>
<section id="home" class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 home-h2">
                <h2>Мы предлагаем</h2>
            </div>
            <div class="col-lg-12 col-md-12 col-xs-12">
                <?php include('templates/services.php'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 centerated">
                <h2>Речные круизы</h2>
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
            <div class="col-lg-12">
                <div class="recall-order-wrapper centerated">
                    <a class="recall-order recall-order-blue" data-toggle="modal" data-target="#modalOrder">Заказать обратный звонок</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
