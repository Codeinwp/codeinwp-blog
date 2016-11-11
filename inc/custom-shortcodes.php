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
            'button2_text'  => 'Buy Now',
            'button1_link'  => '',
            'button2_link'  => '',
            'rel'           => 'nofollow'
        ), $atts )
    );

    if ( $title ) {
        $title_html = '<h2 class="presentation-content-title">'. $title .'</h2>';
    }

    if ( $image ) {
        $image_html = '<div class="presentation-image"><img src="'. $image .'" alt="'. $title .'" title="'. $title .'" /></div>';
    }

    if ( $content ) {
        $content_html = '<div class="presentation-entry">'. $content .'</div>';
    }

    if ( $button1_link ) {
        $button1_link_html = '<a href="'. $button1_link .'" title="'. $title .'" target="_blank" rel="'. $rel .'" class="presentation-button-one">'. __( 'Live Demo', 'cwp' ) .'</a>';
    }

    if ( $button1_link == NULL ) {
        $button2_link_class = 'presentation-button-two-align-left';
    }

    if ( $button2_link ) {
        $button2_link_html = '<a href="'. $button2_link .'" title="'. $title .'" target="_blank" rel="'. $rel .'" class="presentation-button-two '. $button2_link_class .'">'. $button2_text .'</a>';
    }

    if ( $rating ) {
        $rating_html = '<div class="presentation-rating"><div class="presentation-rating-active" style="width: '. $rating .'"></div></div>';
    }

    if ( $price ) {
        $price_html = '<div class="presentation-price">'. __( 'Price:', 'cwp' ) .' <span>'. $price .'</span></div>';
    }

    if ( $price == NULL ) {
        $presentation_class = 'presentation-left-full';
    }

    return '
    <div class="presentation-shortcode cf">
    	'. $image_html .'
    	<div class="presentation-content">
    		'. $title_html .'
    		<div class="presentation-content-meta cf">
                '. $rating_html .'
    		</div>
    		<div class="presentation-entry">
    			'. $content_html .'
    		</div>
            <div class="presentation-left '. $presentation_class .'">
                '. $button1_link_html .'
                '. $button2_link_html .'
            </div>
            '. $price_html .'
    	</div>
    </div>';

}
add_shortcode( 'presentation', 'presentation_shortcode' );

?>