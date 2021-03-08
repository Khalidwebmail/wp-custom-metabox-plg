<?php

namespace My\Metabox\Page;

class Page_Meta_Box {

    public function __construct() {
        add_action( 'add_meta_boxes', [ $this, 'register_page_meta_box' ] );
    }
    
    /**
     * register_page_meta_box
     * 
     * @return void
     */
    public function register_page_meta_box() {
        add_meta_box( 'page_id', 'My Page Meta Box', 'my_page_function', 'page', 'normal', 'high' );
    }

    public function my_page_function() {

    }
}