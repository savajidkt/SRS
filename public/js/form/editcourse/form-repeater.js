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
    var selects = $('body').find('.my-select2');
    $.each(selects, function (i, selectElement) {
        $(selectElement).removeClass('select2-hidden-accessible').next('.select2-container').remove();
        $(selectElement).removeAttr('data-select2-id tabindex aria-hidden');
        initSelect2(selectElement);
    });

    if (myCount == 1) {
        $('.text-nowrap').hide();
    }
    $('.attendees-repeater').repeater({
        show: function () {
            $(this).slideDown();
            $(this).find('.btn-outline-danger').removeAttr('data-delete');
            $(this).find('.attendee_job_title_cls').html('');
            $(this).find('.attendee_job_title_cls').html('Relationship');
            var selects = $('body').find('.my-select2');
            $.each(selects, function (i, selectElement) {
                $(selectElement).removeClass('select2-hidden-accessible').next('.select2-container').remove();
                $(selectElement).removeAttr('data-select2-id tabindex aria-hidden');
                initSelect2(selectElement);
            });
            $(this).find('.my-select2').select2({
                minimumResultsForSearch: Infinity,
                placeholder: 'Select Relationship'
            });
            myCount = myCount + 1;
            if (myCount > 1) {
                $('.text-nowrap').show();
            }
        },
        hide: function (deleteElement) {

            var deleteID = $(this).find('[data-repeater-delete]').attr('data-delete');
            if (deleteID) {

                if (confirm('Are you sure you want to delete this element?')) {
                    
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        beforeSend: function () {
                            // $("#FrmroomType .buttonLoader").removeClass('hide');
                        },
                        complete: function () {
                            // $("#FrmroomType .buttonLoader").addClass('hide');
                        },
                        type: 'POST',
                        url: moduleConfig.deleteAttendee,
                        dataType: 'json',
                        data: {
                            id: $(this).find('[data-repeater-delete]').attr('data-delete'),
                        },
                        success: function (data) {                            
                        }
                    });

                    myCount = myCount - 1;
                    if (myCount == 1) {
                        $('.text-nowrap').hide();
                    }
                    $(this).slideUp(deleteElement);
                }

            } else {
                myCount = myCount - 1;
                if (myCount == 1) {
                    $('.text-nowrap').hide();
                }
                $(this).slideUp(deleteElement);
            }
        }
    });
});

function initSelect2(selectElement) {
    $(selectElement).select2({
        minimumResultsForSearch: Infinity
    });
}