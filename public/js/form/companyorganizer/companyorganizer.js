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
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                email: {
                    required: true
                }
                // email: {
                //     minlength: 5,
                // },
                // email_confirm: {
                //     minlength: 5,
                //     equalTo: "#email"
                // }
            },
            highlight: function(element) {

                // add a class "has_error" to the element 
                $(element).addClass('has_error');
            },
            unhighlight: function(element) {

                // remove the class "has_error" from the element 
                $(element).removeClass('has_error');
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "course_category_id") {
                    error.insertAfter("#course_category_id");
                } else if (element.attr("name") == "password") {
                    error.insertAfter(".password-error");
                } else {
                    error.insertAfter(element);
                }
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