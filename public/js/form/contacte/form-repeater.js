/*=========================================================================================
    File Name: form-repeater.js
    Description: form repeater page specific js
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy HTML Admin Template
    Version: 1.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
    'use strict';
    if (myCount == 1) {
        $('.text-nowrap').hide();
    }

    // form repeater jquery
    $('.contacte-repeater').repeater({
        show: function () {
            $(this).slideDown();
            var id = 1;
         //   $('#my_contact_data_' + id + ' .select2-container').remove();
            $('#my_contact_data_' + id + ' .my-select2').select2();
        //    $('#my_contact_data_' + id + ' .select2-container').css('width', '100%');

            myCount = myCount + 1;
            if (myCount > 1) {
                $('.text-nowrap').show();
            }

        },
        hide: function (deleteElement) {
            myCount = myCount - 1;

            if (myCount == 1) {
                $('.text-nowrap').hide();
            }
            $(this).slideUp(deleteElement);

        }
    });
});