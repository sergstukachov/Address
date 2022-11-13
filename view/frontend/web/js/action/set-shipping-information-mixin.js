define([
    'jquery',
    'mage/utils/wrapper',
    'Magento_Checkout/js/model/quote'
], function ($, wrapper,quote) {
    'use strict';

    return function (setShippingInformationAction) {
        return wrapper.wrap(setShippingInformationAction, function (originalAction, messageContainer) {

            var shippingAddress = quote.shippingAddress();

            if (shippingAddress['extension_attributes'] === undefined) {
                shippingAddress['extension_attributes'] = {};
            }

            if (shippingAddress.customAttributes != undefined) {
                $.each(shippingAddress.customAttributes , function( key, value ) {
                    console.log('hello');
                    if($.isPlainObject(value)){
                        value = value['value'];
                    }

                    shippingAddress['customAttributes']['home_business'] = value;
                    shippingAddress['extension_attributes']['home_business'] = value;

                });
            }

            return originalAction(messageContainer);
        });
    };
});

// /*jshint browser:true jquery:true*/
// /*global alert*/
// define([
//     'jquery',
//     'mage/utils/wrapper',
//     'Magento_Checkout/js/model/quote'
// ], function ($, wrapper, quote) {
//     'use strict';
//
//     return function (setShippingInformationAction) {
//
//         return wrapper.wrap(setShippingInformationAction, function (originalAction) {
//             var shippingAddress = quote.shippingAddress();
//             if (shippingAddress['extension_attributes'] === undefined) {
//                 shippingAddress['extension_attributes'] = {};
//             }
//
//             var attribute = shippingAddress.customAttributes.find(
//                 function (element) {
//                     return element.attribute_code === 'home_business';
//                 }
//             );
//
//             shippingAddress['extension_attributes']['home_business'] = attribute.value;
//             // pass execution to original action ('Magento_Checkout/js/action/set-shipping-information')
//             return originalAction();
//         });
//     };
// });
