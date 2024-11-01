<?php

if (!function_exists('stdc_calculator_settings_page_html')) {
    function stdc_calculator_settings_page_html()
    {
?>
        <div class="wrap title_back">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>

            <form action="options.php" method="post">
                <?php
                settings_fields('standard-deviation');
                do_settings_sections('standard-deviation');
                submit_button('Save Changes');
                ?>
            </form>
        </div>
    <?php
    }
}
/**
 * Add options page
 */
if (!function_exists('stdc_options_page')) {
    function stdc_options_page()
    {
        // This page will be under "Settings"
        add_menu_page(
            'Standard Deviation Calculator Settings',
            'Standard Deviation Calculator',
            'manage_options',
            'standard-deviation',
            'stdc_calculator_settings_page_html',
            'dashicons-calculator',
            20
        );
    }
    add_action('admin_menu', 'stdc_options_page');
}

if (!function_exists('stdc_settings_init')) {
    function stdc_settings_init()
    {

        register_setting(
            'standard-deviation',
            'stdc_color_option'
        );

        add_settings_section(
            'section_color_id',
            'Background Color',
            'stdc_color_section',
            'standard-deviation'
        );

        add_settings_field(
            'input_color_id',
            'Select color',
            'stdc_color_field',
            'standard-deviation',
            'section_color_id'
        );

        add_settings_field(
            'info_short_code',
            'Short code',
            'stdc_info_shortcode',
            'standard-deviation',
            'section_color_id'
        );
    }
    add_action('admin_init', 'stdc_settings_init');
}


if (!function_exists('stdc_color_section')) {
    function stdc_color_section()
    {
        echo '<p>Change calculator background color</p>';
    }
}

if (!function_exists('stdc_color_field')) {
    function stdc_color_field()
    {
        $stdc_setting = get_option('stdc_color_option');
        // output the field
    ?>
        <input type="color" name="stdc_color_option" value="<?php echo isset($stdc_setting) ? esc_attr($stdc_setting) : ''; ?>">
    <?php
    }
}

if (!function_exists('stdc_info_shortcode')) {
    function stdc_info_shortcode()
    {
    ?>
        <span>[standard-deviation]</span>
<?php
    }
}