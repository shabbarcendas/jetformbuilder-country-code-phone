# JetFormBuilder Country Code

**Version:** 1.0  
**Author:** Herald Diniz

## Description

JetFormBuilder Country Code is a WordPress plugin that enhances the JetFormBuilder form fields by adding a country code selector with flags to the phone input fields. This feature is particularly useful for forms that require international phone numbers.

## Features

- **Country Code Selector:** Adds a country code dropdown to phone input fields, allowing users to select their country code easily.
- **Automatic Country Detection:** Uses the user's IP address to automatically detect and set the initial country code.
- **Custom Styling:** Includes custom CSS to ensure the phone input fields are styled consistently across different themes.
- **Seamless Integration:** Integrates smoothly with JetFormBuilder forms, enhancing the user experience without additional configuration.
- **Form Submission Handling:** Automatically appends the selected country code to the phone number upon form submission.

## Installation

1. Upload the plugin files to the `/wp-content/plugins/jetformbuilder-country-code` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Ensure that your form fields are using the class `jet-form-builder__field text-field` for the phone input fields.

## Usage

Once the plugin is activated, any phone input field with the class `jet-form-builder__field text-field` will automatically have a country code selector. The plugin will handle the initialization and submission of the phone number with the country code.

## Customization

- **CSS Styles:** You can modify the `css/ccs-styles.css` file to customize the appearance of the phone input fields.
- **JavaScript Logic:** The `js/ccs-custom.js` file contains the logic for initializing the country code selector and handling form submissions. Feel free to modify it to suit your needs.

## Dependencies

- [Crocoblock JetForm Builder](https://crocoblock.com/plugins/jetformbuilder/): This plugin is required for JetFormBuilder Country Code to function.
- The text field must have the type `tel` for the country code selector to be applied.
- [intl-tel-input](https://github.com/jackocnr/intl-tel-input): A JavaScript plugin for entering and validating international telephone numbers.

