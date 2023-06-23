/*=========================================================================================
    File Name: form-repeater.js
    Description: form repeater page specific js
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy HTML Admin Template
    Version: 1.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function() {
    'use strict';

    if (myCount == 1) {
        $('.text-nowrap').hide();
    }

    // form repeater jquery
    $('.invoice-repeater, .repeater-default, .course-repeater').repeater({
        show: function() {
            $(this).slideDown();
            // Feather Icons
            // if (feather) {
            //   feather.replace({ width: 14, height: 14 });
            // }
            myCount = myCount + 1;
            if (myCount > 1) {
                $('.text-nowrap').show();
            }
        },
        hide: function(deleteElement) {
            myCount = myCount - 1;

            if (myCount == 1) {
                $('.text-nowrap').hide();
            }
            //if (confirm('Are you sure you want to delete this element?')) {
            $(this).slideUp(deleteElement);
            //}
        }
    });
});