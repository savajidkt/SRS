var globalIndex = "";
var FrmQuestionFinalSubmitPreference = function () {

    var FrmQuestionFinalSubmitValidation = function () {
        var FrmQuestionFinalSubmitPreferenceForm = $('#questionfinal_submit');
        var error4 = $('.error-message', FrmQuestionFinalSubmitPreferenceForm);
        var success4 = $('.error-message', FrmQuestionFinalSubmitPreferenceForm);

        FrmQuestionFinalSubmitPreferenceForm.validate({
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
            FrmQuestionFinalSubmitValidation();
        }
    };
}();

$(document).ready(function () {
    FrmQuestionFinalSubmitPreference.init();
});


function checkRadioValidation() {
    var isValidR = true;
    jQuery('.parant').each(function (index) {       
        var result = isChecked($(this).attr('data-id'));
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