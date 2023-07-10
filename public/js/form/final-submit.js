var globalIndex = "";
var FrmFinalSubmitPreference = function () {

    var FrmFinalSubmitValidation = function () {
        var FrmFinalSubmitPreferenceForm = $('#final_submit');
        var error4 = $('.error-message', FrmFinalSubmitPreferenceForm);
        var success4 = $('.error-message', FrmFinalSubmitPreferenceForm);

        FrmFinalSubmitPreferenceForm.validate({
            errorElement: 'span',
            errorClass: 'help-block help-block-error',
            focusInvalid: false,
            ignore: "",
            rules: {
                // 'answer[1]':{ required:true }
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

                error.insertAfter(element);

            },
            submitHandler: function (form) {
                if (!checkRadioValidation()) {
                    alert('Please Answer Question: ' + globalIndex);
                    return false;
                }
                form.submit();

            }
        });
    }


    return {
        //main function to initiate the module
        init: function () {
            FrmFinalSubmitValidation();
        }
    };
}();

$(document).ready(function () {
    FrmFinalSubmitPreference.init();
});


function checkRadioValidation() {
    var isValidR = true;
    jQuery('.parant').each(function (index) {
        var result = isChecked((index + 1));
        if (!result) {
            globalIndex = (index + 1);
            isValidR = false;
            return isValidR;
        }
    });
    return isValidR;
}

function isChecked(index) {
    if (typeof $("input[name='answer[" + index + "]']:checked").val() === "undefined") {
        return false;
    } else {
        return true;
    }
}