<?php
/**
 * Created by IntelliJ IDEA.
 * User: Strauss
 * Date: 2016/07/26
 * Time: 4:50 PM
 */


function func_bi_popup($atts){
    $atts = shortcode_atts( array(
        'title' => 'Order Now',
        'button_class' => '',
        'form_id' => '0000',
        'form_title' => 'Product enquiry',
        'form_subtitle' => 'Need more information about this product?',
        'icon'=>'call',
        'show_icon'=>false,
        'icon_size'=>'medium',
        'round_button'=>'false',
        'show_title'=>'true'
    ), $atts, 'BORN_order' );

    wp_enqueue_style( 'bi-style',plugins_url( '/BI-CF7-popups/assets/css/bi-style.css'));
    wp_enqueue_style('material-icons','https://fonts.googleapis.com/icon?family=Material+Icons');
    wp_register_script( 'bi-script', plugins_url( '../js/bi-script.js', __FILE__ ));
    wp_enqueue_script( 'bi-script' );

    $id = "bi_show_button_${atts['form_id']}";
    $id_popup = "bi_popup_${atts['form_id']}";

    $bi_title = ($atts['show_title'] === 'true')?"${atts['title']}":'';
    $icon = $atts['show_icon']?"<i class='button_icon material-icons'>${atts['icon']}</i>":'';

    $output =  "<a id=\"${id}\" target='${id_popup}' class=\"bi-popup-button ${atts['button_class']}\">${icon}${bi_title}</a>
            <div id=\"${id_popup}\" class=\"bi-page-cover\">
            <div class=\"bi-form-container\">
            <h2>${atts['form_title']}</h2>
            <p>${atts['form_subtitle']}</p>
            <i class=\"bi-close-button\">
                <svg viewBox=\"0 0 24 24\" 
                     preserveAspectRatio=\"xMidYMid meet\" 
                       class=\"style-scope iron-icon\" 
                     style=\"pointer-events: none; display: block; width: 100%; height: 100%;\">
                    <path d=\"M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z\" class=\"style-scope iron-icon\"></path>
                </svg>
            </i>
            <style>
                .wpb_content_element.wpb_raw_html{margin-bottom:0;} 
            </style>";

    $output = $output.do_shortcode("[contact-form-7 id=\"${atts['form_id']}\"]",false).'</div></div></div>';

    return $output;
}