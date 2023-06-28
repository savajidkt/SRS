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


    // form repeater jquery
    $('.attendees-repeater').repeater({
        show: function() {
            $(this).slideDown();

        },
        hide: function(deleteElement) {

            $(this).slideUp(deleteElement);

        }
    });
});