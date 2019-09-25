<?php
global $theme_spg;

function show_filter_items($terms) {

    $html = '';
        foreach( $terms as $term ) {

            if ( sizeof($term->children) > 0 ) {
                $html.= '
                    <li class="nav-item">
                        <a title="' . esc_html($term->name) . '" href="#" data-toggle="dropdown-grid" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle nav-link">' . esc_html($term->name) . '</a>                    
                        <div class="dropdown-menu row">
                            <div class="col-auto" data-dropdown-content="">
                                <div class="bg-white rounded border shadow-lg o-hidden">
                                    <ul class="nav mb-3">
                        ';

                $html.= show_filter_items($term->children);

                $html.= '</ul></div></div></div></li>';
            } else {
                $html.= '<li class="nav-item"><a href="#" class="nav-link" data-filter="' . esc_attr($term->name) . '">' . esc_html($term->name) . '</a></li>';
            }

        }


    return $html;

}

// If we're viewing a taxonomy page, Exit
if( is_tax() ){
    return false;
}

if( isset( $wp_query->show_filters ) && !( 'show' == $wp_query->show_filters ) ){
    return false;
}

// Get each Portfolio Category
$terms = $theme_spg->get_taxonomy_hierarchy( 'portfolio_category' );

// Exit if there's no portfolio categories
if( !$terms ){
    return false;
}
?>

<div class="row justify-content-center mb-4">
    <div class="col col-md-auto">
        <ul data-isotope-filters data-isotope-id="projects" class="nav mb-3">

            <li class="nav-item">
                <a href="#" class="nav-link active" data-filter="&ast;"><?php esc_html_e( 'All', 'uptime' ); ?></a>
            </li>

            <?php
                echo show_filter_items($terms);
            ?>

        </ul>
    </div>
</div>
