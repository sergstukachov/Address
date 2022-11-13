var config = {
    config: {
        mixins: {
            // 'Magento_Checkout/js/action/set-billing-address': {
            //     'SV_Address/js/action/set-billing-address-mixin': true
            // },
            'Magento_Checkout/js/action/set-shipping-information': {
                'SV_Address/js/action/set-shipping-information-mixin': true
            },
            'Magento_Checkout/js/action/create-shipping-address': {
                'SV_Address/js/action/create-shipping-address-mixin': true
            }
            // 'Magento_Checkout/js/action/place-order': {
            //     'SV_Address/js/action/for-billig-place-order-mixin': true
            // },
            // 'Magento_Checkout/js/action/create-billing-address': {
            //     'SV_Address/js/action/set-billing-address-mixin': true
            // },
           //  'Magento_Checkout/js/action/set-payment-information': {
           //      'SV_Address/js/action/set-payment-information-mixin': true
           // }
        }
    }
};
//Magento_Checkout/js/action/place-order or Magento_Checkout/js/action/set-payment-information
