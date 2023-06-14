var FrmCoursePreference = function() {

    var FrmCourseValidation = function() {
        var FrmCoursePreferenceForm = $('#course');
        var error4 = $('.error-message', FrmCoursePreferenceForm);
        var success4 = $('.error-message', FrmCoursePreferenceForm);

        FrmCoursePreferenceForm.validate({
            errorElement: 'span',
            errorClass: 'help-block help-block-error',
            focusInvalid: false,
            ignore: "",
            rules: {
                course_category_id: {
                    required: true
                },
                start_date: {
                    required: true
                },
                end_date: {
                    required: true
                },
                duration: {
                    required: true
                },
                client_id: {
                    required: true
                },
                path: {
                    required: true
                },
                email: {
                    minlength: 5,
                },
                email_confirm: {
                    minlength: 5,
                    equalTo: "#email"
                }


            },
            errorPlacement: function(error, element) {
                // if (element.attr("name") == "price_type") {
                //     error.insertAfter(".price_typeCLS");
                // } 
                error.insertAfter(element);

            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    }


    return {
        //main function to initiate the module
        init: function() {
            FrmCourseValidation();
        }
    };
}();

$(document).ready(function() {
    FrmCoursePreference.init();
});