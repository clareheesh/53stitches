jQuery(document).ready( function( $ ) {

    var selectors = {
        mobileMenu: '.mobile-menu',
        menuContainer: '.menu-main-menu-container'
    };

    var classes = {
        open: 'menu-main-menu-container--open'
    };

    // Header menu
    $(selectors.mobileMenu).on('click', function(e) {
        e.preventDefault(); 

        $(selectors.menuContainer).toggleClass(classes.open);
    });

    $('.js-match-height').matchHeight();

    $('#generate_and_copy').on('click', function(e) {
        e.preventDefault();

        // Clear the currently selected patterns
        $('#patterns').html('');

        // Grab all of the ticked checkboxes
        var label;
        var value;
        $('.checkboxes input').each(function() {
            if( $(this).is(':checked') ) {
                // Add label
                label = $(this).next('label').text();
                value = $(this).val();

                $('#patterns').append(label);
                $('#patterns').append(value);
            }
        });

        // Add them to the #patterns field
        var copy = $('#copy').text();

        // Copy #copy to the clipboard
        copy.execCommand("copy");
        copy.select();

        return false;
    });

    // Update category
    $('.js-tag-filter').on('change', function() {
        window.location = '/category/' + $(this).val()
    })
});