<?php
$motorships = get_posts( array(
    'numberposts' => 0,
    'orderby'     => 'date',
    'order'       => 'ASC',
    'category_name'    => 'motor_ships',
    'post_type'   => 'post',
    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
) );
// var_dump($motorships);
foreach ($motorships as $motorship): ?>
    <div class="col-lg-4">
        <a href="<?=get_permalink($motorship->ID); ?>">
            <div class="home-complex-support-item">
                <div class="">
                    <img src="<?php echo get_the_post_thumbnail_url($motorship->ID);?>" />
                </div>
                <strong class="cat-name"><?php echo $motorship->post_title; ?></strong>
                <p class="cat-desc"><?php echo $motorship->description; ?></p>
            </div>
        </a>
    </div>
<?php endforeach;
?>
