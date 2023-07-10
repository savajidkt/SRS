var FrmContactPreference = function() {

    var FrmContactValidation = function() {
        var FrmContactPreferenceForm = $('#contacte');
        var error4 = $('.error-message', FrmContactPreferenceForm);
        var success4 = $('.error-message', FrmContactPreferenceForm);

        FrmContactPreferenceForm.validate({
            errorElement: 'span',
            errorClass: 'help-block help-block-error',
            focusInvalid: false,
            ignore: "",
            rules: {
                first_name: {
                    required: true
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

                error.insertAfter(element);

            },
            submitHandler: function(form) {
                // alert('jjj');
                form.submit();
            }
        });
    }

    return {
        //main function to initiate the module
        init: function() {
            FrmContactValidation();
            jQuery.validator.addMethod("emailExt", function(value, element, param) {
                return value.match(/^[a-zA-Z0-9_\.%\+\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,}$/);
            }, 'Please enter a valid email address.');
        }
    };
}();
$(document).ready(function() {
    FrmContactPreference.init();
});