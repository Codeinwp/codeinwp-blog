<?php

/**
 *	Presentation Shortcode
 */
function presentation_shortcode( $atts ) {

    extract( shortcode_atts(
        array(
            'title'         => '',
            'image'         => '',
            'rating'        => '',
            'price'         => '',
            'content'       => '',
            'button1_link'  => '',
            'button2_link'  => ''
        ), $atts )
    );

    if ( $title ) {
        $title_html = '<div class="presentation-content-title">'. $title .'</div>';
    }

    if ( $image ) {
        $image_html = '<div class="presentation-image"><img src="'. $image .'" alt="'. $title .'" title="'. $title .'" /></div>';
    }

    if ( $price ) {
        $price_html = '<div class="presentation-meta-right">'. __( 'Price: ', 'cwp' ) .'<span>'. $price .'</span></div>';
    }

    if ( $content ) {
        $content_html = '<div class="presentation-entry">'. $content .'</div>';
    }

    if ( $button1_link ) {
        $button1_link_html = '<a href="'. $button1_link .'" title="'. $title .'" target="_blank" class="presentation-button-one">'. __( 'Live Demo', 'cwp' ) .'</a>';
    }

    if ( $button2_link ) {
        $button2_link_html = '<a href="'. $button2_link .'" title="'. $title .'" target="_blank" class="presentation-button-two">'. __( 'Buy Now', 'ti' ) .'</a>';
    }

    return '
    <div class="presentation-shortcode cf">
    	'. $image_html .'
    	<div class="presentation-content">
    		'. $title_html .'
    		<div class="presentation-content-meta cf">
                <div class="presentation-rating">
                    <div class="presentation-rating-active" style="width: '. $rating .'">
                    </div>
                </div>
    			'. $price_html .'
    		</div>
    		<div class="presentation-entry">
    			'. $content_html .'
    		</div>
    		'. $button1_link_html .'
    		'. $button2_link_html .'
    	</div>
    </div>';

}
add_shortcode( 'presentation', 'presentation_shortcode' );

?>