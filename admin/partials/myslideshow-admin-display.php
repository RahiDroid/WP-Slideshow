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
                    <span>v1.0.3</span>
                </div>

                <span><i><?php esc_html_e( 'Recommended image dimensions', 'myslideshow' ); ?>: 1000 X 560</i></span>
                
                <div id="images-container">
                    <div id="add-image" class="image disable-sort-item">
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
                    <span><i><b><?php esc_html_e( 'Tip', 'myslideshow' ); ?>: </b>
                        <?php esc_html_e( 'You can drag images to change their order in the slide show!', 'myslideshow' ); ?></i></span>
                    <button id="btn-save" class="button-primary"> <?php _e( 'Save Changes' ); ?></button>
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
        $html .= '<h5> No images found. You can add images in \'Slideshow Settings\' menu in the admin panel. </h5>';
        return $html;
    }

    $image_urls = explode( ";", $slides_options[ 'image_urls' ] );
    $html .= '<div class="mss-slides-container">';
    $html .= '<img class="static-bg" src="'. plugins_url( 'assets/images/default-bg.png' , dirname( __FILE__ ) ) . '"/>';

    for ( $i = 0; $i < $number_of_images; $i++ ) {
        $html .= '<img class="slide" src="'. $image_urls[ $i ] . '"/>';
    }

    // arrows
    $html .= '<div class="arrow left"><img src="' . plugins_url( 'assets/images/arrow-left.png', dirname( __FILE__ ) ) . '"/></div>';
    $html .= '<div class="arrow right"><img src="' . plugins_url( 'assets/images/arrow-right.png', dirname( __FILE__ ) ) . '"/></div>';
    
    // indicators
    $html .= '<ul class="indicators">';
    
    for ( $i = 0; $i < $number_of_images; $i++ ) {
        $html .= '<li></li>';
    }
    $html .= '</ul>';

    $html .= '</div>';

    return $html;
}
?>
