<?php
/*
* Plugin Name:  Standard Deviation Calculator
* Description:  A WordPress plugin to calculate standard deviation.
* Author:       Enzipe
* Author URI:   https://www.enzipe.com/
* Version:      1.0.0
* License:      GPL v2 or later
* License URI:  https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain:  standard-deviation-calculator
*/
if (!defined('ABSPATH')) {
    echo ('Activate plugin first');
    exit;
}

class STDC_DaviationCalculator
{

    public function __construct()
    {

        add_action('wp_enqueue_scripts', array($this, 'stdc_load_assets'));

        add_action('wp_enqueue_style', array($this, 'stdc_load_assets'));

        add_shortcode('standard-deviation', array($this, 'stdc_load_shortcode'));
    }

    public function stdc_load_assets()
    {

        wp_enqueue_style(
            'standard-deviation',
            plugin_dir_url(__FILE__) . 'assets/css/standard-daviation-calculator.css',
            array(),
            1,
            'all'
        );

        $stdc_cal_color = get_option('stdc_color_option');
        $stdc_custom_cal_css = "
                .dynamic-box-color {
                    background-color: {$stdc_cal_color} !important;
                }";

        wp_add_inline_style('standard-deviation', $stdc_custom_cal_css);

        wp_enqueue_script(
            'standard-deviation',
            plugin_dir_url(__FILE__) . 'assets/js/standard-daviation-calculator.js',
            array('jquery'),
            //version
            1,
            'all'
        );
    }

    public function stdc_load_shortcode()
    {
        require plugin_dir_path(__FILE__) . 'inc/main-form.php';
    }
}

new STDC_DaviationCalculator;
require plugin_dir_path(__FILE__) . 'inc/admin-setting.php';