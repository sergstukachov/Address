<?php

namespace SV\Address\Plugin\Magento\Quote\Model;

class ShippingAddressManagement
{
    protected $logger;

    public function __construct(
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->logger = $logger;
    }

    public function beforeAssign(
        \Magento\Quote\Model\ShippingAddressManagement $subject,
                                                       $cartId,
        \Magento\Quote\Api\Data\AddressInterface $address
    ) {

        $extAttributes = $address->getExtensionAttributes();
        if (!empty($extAttributes)) {

            try {
                $address->setHomeBusiness($extAttributes->getHomeBusiness());
            } catch (\Exception $e) {
                $this->logger->critical($e->getMessage());
            }

        }

    }
}
