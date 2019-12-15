<div class="search-block">
    <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/" class="searchform">
        <input type="text" class="search_input" value="<?php the_search_query(); ?>" placeholder="Поиск на портале" name="s" id="s" />
        <button type="submit" class="search_btn" id="searchsubmit" value="">Найти</button>
        <!--<span class="icon icon-arrow-up"></span>-->
    </form>
    <span class="icon icon-search" ></span>
    <span class="icon icon-arrow-up" ></span>
</div>
