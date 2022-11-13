// define([
//     'jquery',
//     'mage/utils/wrapper',
//     'Magento_Checkout/js/model/quote'
// ], function ($, wrapper,quote) {
//     'use strict';
//
//     return function (setBillingAddressAction) {
//         return wrapper.wrap(setBillingAddressAction, function (originalAction, messageContainer) {
//
//             var billingAddress = quote.billingAddress();
//
//             if(billingAddress != undefined) {
//
//                 if (billingAddress['extension_attributes'] === undefined) {
//                     billingAddress['extension_attributes'] = {};
//                 }
//                 console.log('b_1');
// console.log(billingAddress.customAttributes);
//                 if (billingAddress.customAttributes != undefined) {
//                     $.each(billingAddress.customAttributes, function (key, value) {
//
//                         if($.isPlainObject(value)){
//                             value = value['value'];
//                         }
//                         console.log('b_2');
//                        // if(key == 'home_business') {
//                             console.log(value);
//                             billingAddress['customAttributes']['home_business'] = value;
//                             billingAddress['extension_attributes']['home_business'] = value;
//                        // billingAddress['home_business'] = value;
//                        // }
//                     });
//                 }
//
//             }
//
//             return originalAction(messageContainer);
//         });
//     };
// });
define([
    'jquery',
    'mage/utils/wrapper',
    'Magento_Checkout/js/model/quote'
], function ($, wrapper,quote) {
    'use strict';

    return function (setBillingAddressAction) {
        return wrapper.wrap(setBillingAddressAction, function (originalAction, messageContainer) {

            var billingAddress = quote.billingAddress();

            if(billingAddress != undefined) {

                if (billingAddress['extension_attributes'] === undefined) {
                    billingAddress['extension_attributes'] = {};
                }

                if (billingAddress.customAttributes != undefined) {
                    $.each(billingAddress.customAttributes, function (key, value) {

                        if($.isPlainObject(value)){
                            value = value['value'];
                        }

                        billingAddress['extension_attributes'] = {'home_business':value};//value;
                    });
                }

            }

            return originalAction(messageContainer);
        });
    };
});
