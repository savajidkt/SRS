var FrmTemplateManagerPreference = function () {

    var FrmTemplateManagerValidation = function () {
        var FrmTemplateManagerPreferenceForm = $('#templatemanager');
        var error4 = $('.error-message', FrmTemplateManagerPreferenceForm);
        var success4 = $('.error-message', FrmTemplateManagerPreferenceForm);

        FrmTemplateManagerPreferenceForm.validate({
            errorElement: 'span',
            errorClass: 'help-block help-block-error',
            focusInvalid: false,
            ignore: "",
            rules: {
                name: {
                    required: true,
                },
                template: {
                    required: true
                },

            },
            highlight: function (element) {

                // add a class "has_error" to the element 
                $(element).addClass('has_error');
            },
            unhighlight: function (element) {

                // remove the class "has_error" from the element 
                $(element).removeClass('has_error');
            },
            errorPlacement: function (error, element) {
                if (element.attr("name") == "template") {
                    error.insertAfter("#cke_email-compose-editor");
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
            FrmTemplateManagerValidation();
        }
    };
}();
$(document).ready(function () {
    FrmTemplateManagerPreference.init();
});