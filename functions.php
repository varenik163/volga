<?php
    @define( 'PARENT_DIR', get_template_directory() );
    @define( 'CHILD_DIR', get_stylesheet_directory() );

    @define( 'PARENT_URL', get_template_directory_uri() );
    @define( 'CHILD_URL', get_stylesheet_directory_uri() );

    /* виджеты */
    if ( function_exists('register_sidebar') )
            register_sidebar(array(
                    'name' => 'Сайдбар',
                    'id'    => 'sidebar',
                    'before_widget' => '<div id="%1$s" class="widget sb_widget %2$s">',
                    'after_widget' => '</div>',
                    'before_title' => '<div class="widget_title">',
                    'after_title' => '</div>',
            ));

            register_sidebar(array(
                    'name' => 'Футер 1 виджет',
                    'id'    => 'footer1',
                    'before_widget' => '<div id="%1$s" class="widget ft_widget %2$s">',
                    'after_widget' => '</div>',
                    'before_title' => '<div class="widget_title">',
                    'after_title' => '</div>',
            ));

            register_sidebar(array(
                    'name' => 'Футер 2 виджет',
                    'id'    => 'footer2',
                    'before_widget' => '<div id="%1$s" class="widget ft_widget %2$s">',
                    'after_widget' => '</div>',
                    'before_title' => '<div class="widget_title">',
                    'after_title' => '</div>',
            ));

            register_sidebar(array(
                    'name' => 'Футер 3 виджет',
                    'id'    => 'footer3',
                    'before_widget' => '<div id="%1$s" class="widget ft_widget %2$s">',
                    'after_widget' => '</div>',
                    'before_title' => '<div class="widget_title">',
                    'after_title' => '</div>',
            ));

            register_sidebar(array(
                    'name' => 'Соцсети в шапке',
                    'id'    => 'social',
                    'before_widget' => '<div class="widget">',
                    'after_widget' => '</div>',
                    'before_title' => '<div class="widget_title">',
                    'after_title' => '</div>',
            ));

    /* миниатюры */
    add_theme_support( 'post-thumbnails' );

    /* меню */
    register_nav_menu( 'header', 'Основное меню' );
    register_nav_menu( 'top', 'Верхнее меню' );
    register_nav_menu( 'bottom', 'Нижнее меню' );

    /* замена ссылки "Читать далее" */
    function remove_more_link_scroll( $link ) {

	$link = preg_replace( '|#more-[0-9]+|', '', $link );

        $link = '<div class="more-link">' . $link . ' &rarr;</div>';
	return $link;
    }
    add_filter( 'the_content_more_link', 'remove_more_link_scroll' );

    /**
    * Обрезка текста (excerpt). Шоткоды вырезаются. Минимальное значение maxchar может быть 22.
    * version - 2.0
    *
    * maxchar     - количество символов.
    * text        - какой текст обрезать (по умолчанию берется excerpt поста, если его нету, то content, если есть тег <!--more-->, то maxchar игнорируется и берется все, что до <!--more--> как есть (с HTML)
    * save_format - Сохранять перенос строк или нет. По умолчанию сохраняется. Если в параметр указать определенные теги, то они НЕ будут вырезаться из обрезанного текста (пример: save_format=<strong><a> )
    * echo        - выводить на экран или возвращать (return) для обработки.
    *
    * @param (строка) $args - аргументы в строке.
    *
    * @return HTML
    */
    function kama_excerpt( $args = '' ){
           global $post;

           $default = array( 'maxchar' => 350, 'text' => '', 'save_format' => false, 'more_text' => 'Читать дальше...', 'echo' => true, );

           parse_str( $args, $_args );
           $args = array_merge( $default, $_args );
           extract( $args );

           if( ! $text ){
                   $text = $post->post_excerpt ? $post->post_excerpt : $post->post_content;

                   $text = preg_replace ("~\[/?.*?\]~", '', $text ); // убираем шоткоды, например:[singlepic id=3]

                   // для тега <!--more-->
                   if( ! $post->post_excerpt && strpos( $post->post_content, '<!--more-->') ){
                           preg_match ('~(.*)<!--more-->~s', $text, $match );
                           $text = trim( $match[1] );
                           $text = str_replace("\r", '', $text );
                           $text = preg_replace( "~\n\n+~s", "</p><p>", $text );
                           $text = '<p>'. str_replace( "\n", '<br />', $text ) .' <a href="'. get_permalink( $post->ID ) .'#more-'. $post->ID .'">'. $more_text .'</a></p>';

                           if( $echo ) return $text;

                           return $text;
                   }
                   elseif( ! $post->post_excerpt )
                           $text = strip_tags( $text, $save_format );
           }

           return $text;

           // Обрезаем
           if ( mb_strlen( $text ) > $maxchar ){
                   $text = mb_substr( $text, 0, $maxchar );
                   $text = preg_replace('@(.*)\s[^\s]*$@s', '\\ ...', $text ); // убираем последнее слово, оно 99% неполное
           }

           // Сохраняем переносы строк. Упрощенный аналог wpautop()
           if( $save_format ){
                   $text = str_replace("\r", '', $text );
                   $text = preg_replace("~\n\n+~", "</p><p>", $text );
                   $text = "<p>". str_replace ("\n", "<br />", trim( $text ) ) ."</p>";
           }

           //$out = preg_replace('@\*[a-z0-9-_]{0,15}\*@', '', $out); // удалить *some_name-1* - фильтр сммайлов

           if( $echo ) return print $text;

           return $text;
    }

    add_shortcode( 'attention', 'attention_func' );
    function attention_func( $atts, $content="") {
            extract( shortcode_atts( array(
              'type' => 'green',
            ), $atts ) );
            switch($type){
                    case 'green': $class='attention green'; $image='<span><i class="fa"></i></span>'; break;
                    case 'yellow': $class='attention orange'; $image='<span><i class="fa"></i></span>'; break;
                    case 'red': $class='attention red'; $image='<span><i class="fa"></i></span> '; break;
                    default: $class='attention green'; $image='<span><i class="fa"></i></span>'; break;
            }

            return '<div class="'.$class.'">'.$image.'<div class="att_text">'.$content.'</div></div>';
    }

    add_shortcode( 'wpfmb', 'wpfmb_func' );
    function wpfmb_func( $atts, $content="") {
            extract( shortcode_atts( array(
              'type' => 'info',
            ), $atts ) );
            switch($type){
                    case 'info': $class='info2'; break;
                    default: $class='info2'; break;
            }

            return '<div class="'.$class.'">' . $content . '</div>';
    }

    function mytheme_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        extract($args, EXTR_SKIP);

        if ('div' == $args['style']) {
            $tag = 'div';
            $add_below = 'comment';
        } else {
            $tag = 'li';
            $add_below = 'div-comment';
        }
        ?>
        <<?php echo $tag ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
        <?php if ('div' != $args['style']) : ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
            <?php endif; ?>
            <div class="comment-author vcard">
                <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, $args['avatar_size']); ?>
                <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()); ?>
            </div>
            <?php if ($comment->comment_approved == '0') : ?>
                <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.'); ?></em>
                <br />
            <?php endif; ?>

            <div class="comment-meta commentmetadata">
                <span>
                    <?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()); ?>
                </span>
                <?php edit_comment_link(__('(Edit)'), '  ', '');
                ?>
            </div>

            <?php comment_text(); ?>

            <div class="reply">
                <?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
            </div>
            <?php if ('div' != $args['style']) : ?>
            </div>
        <?php endif;
    }


// тизеры
function rek_teaser() {
    $code = '<!--noindex--><div class="rek_teasers">';
    $rows = get_field('teaser', 'option');
    if ($rows[0]['img'] != '') :
        foreach ($rows as $row):
            $code .= '<div class="teaser">';
                $code .= '<a target="_blank" href="' . $row['url'] . '" title="' . $row['text'] . '">';
                    $code .= '<img src="' . $row['img']['url'] . '" alt="' . $row['text'] . '" />';
                    $code .= '<span class="teaser_text">' . $row['text'] . '</span>';
                    $code .= '<span class="teaser_more">Читать далее >></span>';
                $code .= '</a>';
            $code .= '</div>';
        endforeach;
        $code .= '</div><!--/noindex-->';
    else:
        $code = '';
    endif;
    return $code;
}
add_shortcode("rek_teaser", "rek_teaser");

// тизеры сайдбарный блок
class teaser_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'teaser_widget', 'Сайдбарный тизер',
            array( 'description' => 'Вывод виджета с тизерами', 'classname' => 'teaser-widget widget_text')
        );
    }
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
        $fix = $instance[ 'fix' ];
        $detect = new Mobile_Detect;
        if ($fix == 'on' && (!$detect->isMobile() || !$detect->isTablet())) : echo '<div class="fseo_fixed_widget fseo_fixed_sb_banner_widget">'; endif;
        echo $args['before_widget'];
        if ( ! empty( $title ) ) :
            echo $args['before_title'] . $title . $args['after_title'];
        endif;
        ?>
            <!--noindex--><div class="sb_teasers">
            <?php $rows = get_field('sb_teaser', 'option'); foreach ($rows as $row): ?>
                <div class="teaser">
                    <a target="_blank" href="<?php echo $row['url']; ?>" title="<?php echo $row['text']; ?>">
                        <img src="<?php echo $row['img']['url'];?>" alt="<?php echo $row['text']; ?>" />
                        <span class="teaser_text"><?php echo $row['text']; ?></span>
                        <span class="teaser_more">Читать далее >></span>
                    </a>
                </div>
            <?php endforeach; ?>
            </div><!--/noindex-->
        <?php
        echo $args['after_widget'];
        if ($fix == 'on' && (!$detect->isMobile() || !$detect->isTablet())) : echo '</div>'; endif;
    }

    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        //Defaults
        $instance = wp_parse_args( (array) $instance, array(
                        'title' => ''
        ));
        ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Заголовок:' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $instance['title']; ?>" />
            </p>
            <p>
                <input class="checkbox" type="checkbox" <?php checked($instance['fix'], 'on'); ?> id="<?php echo $this->get_field_id('fix'); ?>" name="<?php echo $this->get_field_name('fix'); ?>" />
                <label for="<?php echo $this->get_field_id('fix'); ?>">Фикс виджет? </label>
            </p>
        <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['fix'] = $new_instance['fix'];
        return $instance;
    }
}
function teaser_load_widget() {
    register_widget( 'teaser_widget' );
}
add_action( 'widgets_init', 'teaser_load_widget' );

function createReviewTaxonomy() {
    $params = array(
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => array(
            'name'              => 'Отзывы',
            'singular_name'     => 'Отзыв',
            'search_items'      => 'Найти Отзывв',
            'all_items'         => 'Все Отзывы',
            'view_item '        => 'Просмотр Отзыва',
            'parent_item'       => 'Родительский Отзыв',
            'parent_item_colon' => 'Родительский Отзыв:',
            'edit_item'         => 'Редактироввавть Отзыв',
            'update_item'       => 'Обновить Отзыв',
            'add_new_item'      => 'Добавитиь новый Отзыв',
            'new_item_name'     => 'Имя Нового Отзыва',
            'menu_name'         => 'Отзывы',
        ),
        'has_archive'                => true,
        'description'           => '', // описание таксономии
        'public'                => true,
        'publicly_queryable'    => null, // равен аргументу public
        'show_in_nav_menus'     => true, // равен аргументу public
        'show_ui'               => true, // равен аргументу public
        'show_in_menu'          => true, // равен аргументу show_ui
        'show_tagcloud'         => true, // равен аргументу show_ui
        'show_in_rest'          => null, // добавить в REST API
        'rest_base'             => null, // $taxonomy
        'hierarchical'          => false,
        //'update_count_callback' => '_update_post_term_count',
        'rewrite'               => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities'          => array(),
        'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
        'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
        '_builtin'              => false,
        'show_in_quick_edit'    => null, // по умолчанию значение show_ui
    );
    register_taxonomy('review', array('post'), $params);

    register_post_type('review', $params);
}

function createCampaignTaxonomy() {
    $params = array(
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => array(
            'name'              => 'Акции',
            'singular_name'     => 'Акция',
            'search_items'      => 'Найти Акцию',
            'all_items'         => 'Все Акции',
            'view_item '        => 'Просмотр Акций',
            'parent_item'       => 'Родительская Акция',
            'parent_item_colon' => 'Родительская Акция:',
            'edit_item'         => 'Редактироввавть Акцию',
            'update_item'       => 'Обновить Акцию',
            'add_new_item'      => 'Добавитиь новую Акцию',
            'new_item_name'     => 'Имя Новой Акции',
            'menu_name'         => 'Акции',
        ),
        'has_archive'                => true,
        'description'           => '', // описание таксономии
        'public'                => true,
        'publicly_queryable'    => null, // равен аргументу public
        'show_in_nav_menus'     => true, // равен аргументу public
        'show_ui'               => true, // равен аргументу public
        'show_in_menu'          => true, // равен аргументу show_ui
        'show_tagcloud'         => true, // равен аргументу show_ui
        'show_in_rest'          => null, // добавить в REST API
        'rest_base'             => null, // $taxonomy
        'hierarchical'          => false,
        //'update_count_callback' => '_update_post_term_count',
        'rewrite'               => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities'          => array(),
        'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
        'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
        '_builtin'              => false,
        'show_in_quick_edit'    => null, // по умолчанию значение show_ui
    );
    register_taxonomy('campaign', array('post'), $params);

    register_post_type('campaign', $params);
}

function createServiceTaxonomy() {
    $params = array(
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => array(
            'name'              => 'Услуги',
            'singular_name'     => 'Услуга',
            'search_items'      => 'Найти Услугу',
            'all_items'         => 'Все Услуги',
            'view_item '        => 'Просмотр Услуги',
            'parent_item'       => 'Родительская Услуга',
            'parent_item_colon' => 'Родительская Услуга:',
            'edit_item'         => 'Редактироввавть Услугу',
            'update_item'       => 'Обновить Услугу',
            'add_new_item'      => 'Добавитиь новую Услугу',
            'new_item_name'     => 'Имя Новой Улсги',
            'menu_name'         => 'Услуги',
        ),
        'description'           => '', // описание таксономии
        'public'                => true,
        'has_archive'                => true,
        'publicly_queryable'    => null, // равен аргументу public
        'show_in_nav_menus'     => true, // равен аргументу public
        'show_ui'               => true, // равен аргументу public
        'show_in_menu'          => true, // равен аргументу show_ui
        'show_tagcloud'         => true, // равен аргументу show_ui
        'show_in_rest'          => null, // добавить в REST API
        'rest_base'             => null, // $taxonomy
        'hierarchical'          => true,
        //'update_count_callback' => '_update_post_term_count',
        'rewrite'               => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities'          => array(),
        'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
        'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
        '_builtin'              => false,
        'show_in_quick_edit'    => null, // по умолчанию значение show_ui
        'taxonomies'            => array( 'service' ),
    );

    $catParams = array(
        'label'                 => '', // определяется параметром $labels->name
        'labels'                => array(
            'name'              => 'Типы услуг',
            'singular_name'     => 'Тип услуги',
            'search_items'      => 'Найти тип услуги',
            'all_items'         => 'Все типы услуг',
            'view_item '        => 'Просмотр типа услуги',
            'parent_item'       => 'Родителький тип услуги',
            'parent_item_colon' => 'Родительская услуга:',
            'edit_item'         => 'Редактироввавть тип услуги',
            'update_item'       => 'Обновить тип услуги',
            'add_new_item'      => 'Добавитиь новый тип услуги',
            'new_item_name'     => 'Имя Нового типа услуги',
            'menu_name'         => 'Типы услуг',
        ),
        'description'           => '', // описание таксономии
        'public'                => true,
        'publicly_queryable'    => null, // равен аргументу public
        'show_in_nav_menus'     => true, // равен аргументу public
        'show_ui'               => true, // равен аргументу public
        'show_in_menu'          => true, // равен аргументу show_ui
        'show_tagcloud'         => true, // равен аргументу show_ui
        'show_in_rest'          => null, // добавить в REST API
        'rest_base'             => null, // $taxonomy
        'hierarchical'          => true,
        //'update_count_callback' => '_update_post_term_count',
        'rewrite'               => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities'          => array(),
        'meta_box_cb'           => null, // callback функция. Отвечает за html код метабокса (с версии 3.8): post_categories_meta_box или post_tags_meta_box. Если указать false, то метабокс будет отключен вообще
        'show_admin_column'     => false, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
        '_builtin'              => false,
        'show_in_quick_edit'    => null, // по умолчанию значение show_ui
    );
    register_taxonomy('service', array('service'), $catParams);

    register_post_type('service', $params);
}

add_action( 'init', 'createReviewTaxonomy' );
add_action( 'init', 'createCampaignTaxonomy' );
add_action( 'init', 'createServiceTaxonomy' );

