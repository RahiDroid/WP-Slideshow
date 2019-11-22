<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       rahicodes.wordpress.com
 * @since      1.0.0
 *
 * @package    Myslideshow
 * @subpackage Myslideshow/admin/partials
 */

/**
 * This function renders the custom settings page for 'slideshow settings'
 * 
 * @since      1.0.1
 */
function mss_render_settings_page() {

    global $slides_options;
    $number_of_images = $slides_options[ 'images_number' ];
    $urls = explode( ";", $slides_options[ 'image_urls' ] );

    if(function_exists( 'wp_enqueue_media' )){
        wp_enqueue_media();
    }else{
        wp_enqueue_style('thickbox');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
    }

    ?>
        <form id="settings_form" method="post" action="options.php">
    <?php
        settings_fields( 'mss-settings-group' );
    ?>
            <div class="settings-wrapper">
                
                <div class="header">
                    <h2>My Slide Show Control Panel</h2>
                    <span>v1.0.1</span>
                </div>
                
                <div class="images-container">
                    <div class="add-image image disable-sort-item">
                        <span class="dashicons dashicons-plus"></span>
                    </div>

                    <?php 
                    // render images from the db
                    for ( $i = 0; $i < $number_of_images; $i++ ) {

                        echo '<div class="image sortable" style="background-image: url(' . $urls[ $i ] . ');">
                            <div class="delete-image">
                                <span class="dashicons dashicons-trash"></span>
                            </div>
                        </div>';

                    }
                    
                    ?>
                </div>

                <div class="footer">
                    <span><i><b>Tip: </b>You can drag images to change their order in the slide show!</i></span>
                    <button id="btn-save" class="button-primary">Save Changes</button>
                </div>

            </div>  
        </form>
    <?php
}

/**
 * Helper function for rendering image slides
 * 
 * @since      1.0.2
 */
function render_mss_shortcode() {

    // get slide show options
    global $slides_options;
    $html = '';
    
    $number_of_images = $slides_options[ 'images_number' ];

    // check if there are any images added in the slideshow or not
    if ( $number_of_images == 0 ) {
        $html .= '<h5> No images found. You can add images from \'Slideshow Settings\' menu in the admin panel. </h5>';
        return $html;
    }

    $image_urls = explode( ";", $slides_options[ 'image_urls' ] );
    $html .= '<div id="slides-container">';

    for ( $i = 0; $i < $number_of_images; $i++ ) {
        $html .= '<img class="slide" src="'. $image_urls[ $i ] . '"/>';
    }

    $html .= '</div>';

    return $html;
}
?>
