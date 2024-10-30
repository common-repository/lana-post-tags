/**
 * Lana Post Tags
 * click and hide "Choose from most used"
 */
jQuery(window).load(function () {
    jQuery('body.wp-admin').find('#tagsdiv-post_tag').find('#link-post_tag').trigger("click").hide();
});