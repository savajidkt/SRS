var FrmClientPreference = function () {

    var FrmClientValidation = function () {
        var FrmClientPreferenceForm = $('#client');
        var error4 = $('.error-message', FrmClientPreferenceForm);
        var success4 = $('.error-message', FrmClientPreferenceForm);

        FrmClientPreferenceForm.validate({
            errorElement: 'span',
            errorClass: 'help-block help-block-error',
            focusInvalid: false,
            ignore: "",
            rules: {
                company_name: {
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
            errorPlacement: function (error, element) {
                if (element.attr("name") == "company_name") {
                    error.insertAfter("#company_name");
                } else if (element.attr("name") == "password") {
                    error.insertAfter(".password-error");
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    }

    return {
        //main function to initiate the module
        init: function () {
            FrmClientValidation();
        }
    };
}();
$(document).ready(function () {
    FrmClientPreference.init();
});
