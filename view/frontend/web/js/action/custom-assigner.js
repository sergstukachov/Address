define([
    'jquery'
], function ($) {
    'use strict';

    return function (paymentData) {

        if (paymentData['extension_attributes'] === undefined) {
            paymentData['extension_attributes'] = {};
        }

        paymentData['extension_attributes']['home_business'] = jQuery('[name="ordercomment[home_bussiness]"]').val();
    };
});
