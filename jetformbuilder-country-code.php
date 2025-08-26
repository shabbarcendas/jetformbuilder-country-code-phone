<?php
/**
 * Plugin Name: JetFormBuilder Country Code
 * Description: Adds a country code with flag to the phone number input field. It relies on the Crocoblock JetForm Builder plugin and requires the text field to have the 'tel' type.
 * Version: 1.0.0
 * Author: Herald Diniz
 * Author URI: https://github.com/heralddiniz
 */

// Adiciona scripts e estilos necessários
function ccs_enqueue_scripts() {
    wp_enqueue_style('intl-tel-input', plugin_dir_url(__FILE__) . 'css/intlTelInput.css', array(), '1.0', 'all');
    wp_enqueue_style('ccs-styles', plugin_dir_url(__FILE__) . 'css/ccs-styles.css', array(), '1.0', 'all');
    wp_enqueue_script('intl-tel-input', plugin_dir_url(__FILE__) . 'js/intlTelInput.min.js', array('jquery'), '17.0.8', true);
    wp_enqueue_script('ccs-custom-script', plugin_dir_url(__FILE__) . 'js/ccs-custom.js', array('intl-tel-input'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'ccs_enqueue_scripts');

// Adiciona o seletor de código de país ao campo de telefone
function ccs_add_country_code_selector($field) {
    if (strpos($field, 'class="jet-form-builder__field text-field"') !== false) {
        $field .= '<script type="text/javascript">
            jQuery(document).ready(function($) {
                var input = document.querySelector(".jet-form-builder__field.text-field[type=tel]");
                window.intlTelInput(input, {
                    initialCountry: "auto",
                    geoIpLookup: function(callback) {
                        $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                            var countryCode = (resp && resp.country) ? resp.country : "us";
                            callback(countryCode);
                        });
                    },
                    utilsScript: ""
                });
            });
        </script>';
    }
    return $field;
}
add_filter('jet-form-builder/render-field', 'ccs_add_country_code_selector', 10, 1);
