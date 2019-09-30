<?php
/*
Plugin Name: Menu shortcode
Description: Adds shortocode [leonp_menu] for adding a menu to post.
Author: Leon Pahole
*/

if (!class_exists('LeonP_MenuShortcode')) {

    class LeonP_MenuShortcode
    {

        function __construct()
        {
            add_shortcode('leonp_menu', array($this, 'render_menu_shortcode'));
        }

        public function render_menu_shortcode($atts, $content, $tag)
        {

            $attr = shortcode_atts(array(
                'theme_location' => null,
                'menu_id' => null,
                'container_class' => null,
                'menu_class' => null
            ), $atts, $tag);

            return wp_nav_menu(array(
                'theme_location' => $attr['theme_location'],
                'menu_id' => $attr['menu_id'],
                'container_class' => $attr['container_class'],
                'menu_class' => $attr['menu_class'],
                'echo' => false
            ));
        }
    }

    $LeonP_MenuShortcode = new LeonP_MenuShortcode();
}
