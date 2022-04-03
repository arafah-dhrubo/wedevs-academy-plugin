<?php

namespace WeDevs\Academy\Frontend;

class Shortcode
{
    /**
     * Initialize the functions
     */
    function __constructor(){
        add_shortcode('wedevs-academy', [$this, 'render_shortcode']);
    }

    /**
     * Shortcode handler function
     *
     * @param $atts
     * @param $content
     *
     * @return string
     */
    public function render_shortcode($atts, $content=''){
        return "hello from shortcode";
    }
}