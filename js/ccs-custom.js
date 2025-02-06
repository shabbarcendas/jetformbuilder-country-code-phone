// Custom JS for initializing the country code selector
jQuery(document).ready(function($) {
    var input = document.querySelector(".jet-form-builder__field.text-field[type=tel]");
    if (input) {
        var iti = window.intlTelInput(input, {
            initialCountry: "auto",
            geoIpLookup: function(callback) {
                $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "us";
                    callback(countryCode);
                });
            },
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
            autoHideDialCode: false,
            separateDialCode: true,
            nationalMode: false
        });
        // Remove the placeholder
        input.removeAttribute('placeholder');

        // Concatenate country code before form submission
        $(input.form).on('submit', function() {
            var fullNumber = iti.getNumber();
            input.value = fullNumber;
        });
    }
});
