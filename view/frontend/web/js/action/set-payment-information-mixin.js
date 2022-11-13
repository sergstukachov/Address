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
