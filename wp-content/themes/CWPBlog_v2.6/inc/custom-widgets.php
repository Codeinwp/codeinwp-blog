<?php

/**
 *  Newsletter Widget
 */
function newsletter_widget () {
    register_widget( 'newsletter_widget' );
}

class newsletter_widget extends WP_Widget {

    function newsletter_widget() {
        $widget_ops = array( 'classname' => 'widget_newsletter', 'description' => __('This widget display newsletter form.', 'ti') );

        $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'newsletter_widget' );

        $this->WP_Widget( 'newsletter_widget', __('Newsletter', 'ti'), $widget_ops, $control_ops );
    }

    function widget( $args, $instance ) {
        extract( $args );

        echo $before_widget; ?>

        <form action="http://codeinwp.us3.list-manage.com/subscribe/post?u=bf06b9a7223d1c8f65272caf7&amp;id=bd98fdaf54" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate cf" target="_blank" novalidate>
            <input type="email" value="" name="EMAIL" class="emailinput animated flipInY" id="mce-EMAIL" placeholder="Your e-mail address" required>
            <div style="position: absolute; left: -5000px;"><input type="text" name="b_bf06b9a7223d1c8f65272caf7_bd98fdaf54" value="">
            </div>
            <input type="submit" name="subscribe" id="mc-embedded-subscribe" class="subscribe animated flipInY" value="Subscribe">
        </form>

        <?php echo $after_widget;
    }

    //Update the widget

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        return $instance;
    }


    function form( $instance ) {

        $instance = wp_parse_args( (array) $instance, $defaults ); ?>

        <br />

    <?php
    }
}
add_action( 'widgets_init', 'newsletter_widget' );

?>