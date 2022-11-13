define([
    'jquery',
    'mage/utils/wrapper',
    'Magento_Checkout/js/model/quote'
], function ($, wrapper,quote) {
    'use strict';

    return function (setShippingInformationAction) {
        return wrapper.wrap(setShippingInformationAction, function (originalAction, messageContainer) {

            if (messageContainer.custom_attributes != undefined) {
                $.each(messageContainer.custom_attributes , function( key, value ) {
                    //@ TODO Need debug this place. Attribute_Code
                    messageContainer['custom_attributes'][key] = value;//{'attribute_code':key,'value':value};  jQuery('[name="home_business"]').val();

                    // messageContainer['extension_attributes']['home_business'] = value;

                    // shippingAddress['customAttributes']['home_business'] = value;
                   // messageContainer['extension_attributes']['home_business'] = value;
                });
            }

            return originalAction(messageContainer);
        });
    };
});
