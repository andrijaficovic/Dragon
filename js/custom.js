jQuery(document).ready(function($) {
    $('.read-more-btn').click(function () {
        var blockDescription = $(this).closest('.block-description');
        var descriptionBody = blockDescription.find('.description-body');

        // Toggle visibility of the body text with slide-down effect
        descriptionBody.slideDown();

        // Hide the "Read more" button
        $(this).hide();
    });
});

