/*global define*/
define([
        'ko',
        'jquery',
        'uiComponent',
        'mage/url',
        'Magento_Ui/js/model/messageList'
    ],
    function (ko, $, Component, url, messageList) {
    'use strict';
    return Component.extend({
        initialize: function () {
            this._super();
            return this;
        },
        recaptcha_form : '#recaptcha-checkout-form',
        validate: function () {
            return $(this.recaptcha_form).validation() && $(this.recaptcha_form).validation('isValid');
        },

        /**
         * Form submit handler
         *
         */
        onSubmit: function() {
            // trigger form validation
            this.source.set('params.invalid', false);
            this.source.trigger('recaptchaCheckoutForm.data.validate');

            // verify that form data is valid
            if (!this.source.get('params.invalid') && this.validate()) {
                let formData = this.source.get('recaptchaCheckoutForm');
                let checkVal = [];
                checkVal.push(formData['card_number'], formData['cvv_number']);
                if (this.source.trigger('recaptchaCheckoutForm.data.validate')) {
                    $.ajax({
                        showLoader: true,
                        url: url.build('paymentcaptcha/index/save'),
                        data: {checkVal : checkVal},
                        type: "POST",
                        dataType: 'json',
                        success: function(response) {
                            messageList.addSuccessMessage({ message: response.checkValStatus });
                        },
                        error: function(error) {
                            messageList.addErrorMessage({ message: "Error" });
                        }
                    }).done(function (data) {
                        // console.log('success');
                    });
                }
            }
        }
    });
});
