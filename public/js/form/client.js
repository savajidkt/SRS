var FrmClientPreference = function() {

    var FrmClientValidation = function() {
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
                address_one: {
                    required: true
                },
                address_tow: {
                    required: true
                },
                town: {
                    required: true
                },
                country: {
                    required: true
                },
                post_code: {
                    required: true
                },
                notes: {
                    required: true
                },
                mobile_number: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                phone_number: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
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
            FrmClientValidation();
        }
    };
}();

$(document).ready(function() {
    FrmClientPreference.init();
});