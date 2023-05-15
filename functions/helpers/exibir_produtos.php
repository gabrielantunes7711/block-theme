<?php
function get_products_posts($page_id){
    //Produtos
    $wp_query = array(
        'post_type' => 'page',
        'orderby' => 'title',
        'order' => 'ASC',
        'post_parent' => $page_id,
        'posts_per_page' => -1,
    );

    $child_pages = get_posts($wp_query);

    return $child_pages;
}

function show_products_nav($page_id){
    $child_pageslink = get_products_posts($page_id);
    echo "<nav><ul class='side-product-list'>";
    foreach ($child_pageslink as $child_pagelink) :
        $title = $child_pagelink->post_title;
        $link = get_permalink($child_pagelink->ID);
        echo '<li><a href="'.$link.'" title="'.$title.'">'.$title.'</a></li>';
    endforeach;
    echo "</ul></nav>";
}