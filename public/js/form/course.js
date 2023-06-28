var IsSubmit = false;
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
                    required: function() {
                        if ($("#course_category_id option[value='0']") && !IsSubmit) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                },
                start_date: {
                    required: function() {
                        if (!IsSubmit) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                },
                end_date: {
                    required: function() {
                        if (!IsSubmit) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                },
                duration: {
                    required: function() {
                        if (!IsSubmit) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                },
                client_id: {
                    required: function() {
                        if (!IsSubmit) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                },
                path: {
                    required: function() {
                        if (!IsSubmit) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                },
                email: {
                    required: function() {
                        if (!IsSubmit) {
                            return true;
                        } else {
                            return false;
                        }
                    },
                    minlength: 5,
                },
                email_confirm: {
                    required: function() {
                        if (!IsSubmit) {
                            return true;
                        } else {
                            return false;
                        }
                    },
                    minlength: 5,
                    equalTo: "#email"
                },
                org_first_name: {
                    required: function() {
                        if (IsSubmit) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                },
                org_last_name: {
                    required: function() {
                        if (IsSubmit) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                },
                org_email: {
                    required: function() {
                        if (IsSubmit) {
                            return true;
                        } else {
                            return false;
                        }
                    },
                    minlength: 5,
                    email: true,
                },


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
                } else if (element.attr("name") == "duration") {
                    error.insertAfter(".duration-error");
                } else if (element.attr("name") == "client_id") {
                    error.insertAfter(".client_id-error");
                } else if (element.attr("name") == "path") {
                    error.insertAfter(".path-error");
                }else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {

                if (!IsSubmit) {
                    IsSubmit = true;
                    $('.step_1').addClass('hide');
                    $('.step_2').removeClass('hide');

                } else {

                    form.submit();
                }
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