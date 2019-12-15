<?php

$reviews = get_posts( array(
    'numberposts' => 10,
    'category'    => 0,
    'orderby'     => 'date',
    'order'       => 'DESC',
    'include'     => array(),
    'exclude'     => array(),
    'meta_key'    => '',
    'meta_value'  =>'',
    'post_type'   => 'review',
    'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
) );
?>
<div class="row">
    <div class="col-lg-12">
        <div class="campaign-slider">
            <?php foreach ($reviews as $review): ?>
                <div>
                    <div class="slider-item">
                        <div class="comment-text"><?php
                            $max = 250;
                            echo mb_substr($review->post_content,0, $max);
                            if(mb_strlen($review->post_content) > $max) echo '...'
                            ?></div>
                        <div class="comment-divider"></div>
                        <div class="comment-desc"><?php echo $review->post_title; ?></div>
                        <!--<a class="review-preview-link" data-review="<?/*=$review->ID*/?>">
                            <span class="icon green-mountains-icon"></span>
                            Оригинал отзыва
                        </a>-->
                    </div>
                </div>
            <?php endforeach;
            ?>
        </div>
    </div>
</div>
