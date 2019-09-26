<?php
global $theme_spg;

function show_filter_items($terms) {

    $html = '';
        foreach( $terms as $term ) {

            if ( sizeof($term->children) > 0 ) {
                $html.= '
                    <h6>' . esc_html($term->name);

                $html.= show_filter_items($term->children);

                $html.= '</h6>';
            } else {
                $html.= '<a class="dropdown-item" href="#" data-filter="' . esc_attr($term->name) . '">' . esc_html($term->name) . ' </a>';
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
    <div class="col col-md-auto dropdown project-card-filter">
        <button class="btn btn-primary dropdown-toggle dropdown-toggle-split" type="button" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="project-card-filter__title"> Choose project area or technology </span>
            <svg class="icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.4444 8.41358C14.7776 8.2281 15.1875 8.46907 15.1875 8.85048V15.1495C15.1875 15.5309 14.7776 15.7719 14.4444 15.5864L8.78505 12.4369C8.44258 12.2463 8.44258 11.7537 8.78505 11.5631L14.4444 8.41358Z" fill="#212529"></path>
            </svg>

        </button>

        <div class="dropdown-menu project-card-filter__menu" aria-labelledby="dropdownMenuOffset" x-placement="bottom-start">
            <div class="dropdown-content" data-isotope-filters data-isotope-id="projects">
                <a class="dropdown-item dropdown-item-all" href="#" class="nav-link active" data-filter="&ast;"><h6 class="p-0"><?php esc_html_e( 'Choole All', 'uptime' ); ?></h6></a>
                <div class="dropdown-divider"></div>
                <?php echo show_filter_items($terms); ?>
            </div>
        </div>

    </div>
</div>
