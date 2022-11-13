define([
    'jquery',
    'mage/utils/wrapper',
    'SV_Address/js/action/custom-assigner'
], function ($, wrapper, ordercommentAssigner) {
    'use strict';

    return function (placeOrderAction) {

        return wrapper.wrap(placeOrderAction, function (originalAction, paymentData, messageContainer) {
            ordercommentAssigner(paymentData);

            return originalAction(paymentData, messageContainer);
        });
    };
});

// /**
//  * Copyright © Magento, Inc. All rights reserved.
//  * See COPYING.txt for license details.
//  */
//
// define([
//     'jquery',
//     'mage/utils/wrapper',
//     'Magento_Checkout/js/model/quote'
// ], function ($, wrapper, quote) {
//     'use strict';
//
//     return function (setB) {
//
//         /** Override default place order action and add agreement_ids to request */
//         return wrapper.wrap(setB, function (setPaymentInformation, messageContainer, paymentData) {
//             var data = paymentData;
//
//             return setPaymentInformation(messageContainer, paymentData, false);
//         });
//     };
// });
