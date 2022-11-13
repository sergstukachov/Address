<?php
namespace SV\Address\Plugin\Checkout;

use Magento\Checkout\Block\Checkout\LayoutProcessor;
use SV\Address\Model\Config\Source\AddressOptions;

class SaveAddressInformation
{
    protected $options;
    public function __construct(
        AddressOptions $type
    ) {
        $this->options = $type;
    }
    public function afterProcess(
        LayoutProcessor $subject,
        array  $jsLayout
    ) {
        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['shipping-address-fieldset']['children']['home_business'] = [
            'component' => 'Magento_Ui/js/form/element/select',
            'config' => [
                'customScope' => 'shippingAddress.custom_attributes',
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/select',
                'options' => $this->options->getAllOptions(),
//                'options' => [
//                    [
//                        'value' => 'Please Select',
//                        'label' => 'Please Select',
//                    ],
//                    [
//                        'value' => 'Home',
//                        'label' => 'Home',
//                    ],
//                    [
//                        'value' => 'Business',
//                        'label' => 'Business',
//                    ]
//                ],
                'id' => 'home_business'
            ],
            'dataScope' => 'shippingAddress.custom_attributes.home_business',
            'label' => 'Home or Business',
            'provider' => 'checkoutProvider',
            'visible' => true,
            'validation' => ['required-entry' => true],
            'sortOrder' => 250,
            'id' => 'home_business'
        ];
        $configuration = $jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']
        ['payment']['children']['payments-list']['children'];
        foreach ($configuration as $paymentGroup => $groupConfig) {
            if (isset($groupConfig['component']) AND $groupConfig['component'] === 'Magento_Checkout/js/view/billing-address') {
                $jsLayout['components']['checkout']['children']['steps']['children']['billing-step']['children']
                ['payment']['children']['payments-list']['children'][$paymentGroup]['children']['form-fields']['children']['home_business'] = [
                    'component' => 'Magento_Ui/js/form/element/select',
                    'config' => [
                        'customScope' => 'billingAddress.custom_attributes',
                        'template' => 'ui/form/field',
                        'elementTmpl' => 'ui/form/element/select',
                        'options' => $this->options->getAllOptions(),
                        'id' => 'home_business'
                    ],
                    'dataScope' => $groupConfig['dataScopePrefix'] . '.custom_attributes.home_business',
                    'label' => 'Home or Business',
                    'provider' => 'checkoutProvider',
                    'visible' => true,
                    'validation' => ['required-entry' => true],
                    'sortOrder' => 250,
                    'id' => 'home_business'
                ];
            }
        }
        return $jsLayout;
    }
}
